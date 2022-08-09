<?php
include('db_connect.php');
$files_names = ['logo','zastava','avto'];
$files_uploaded = TRUE;
for($i = 0; $i < count($files_names);$i++){
    $errors= array();
    $file_name = str_replace(" ", "-",$_FILES[$files_names[$i]]['name']);
    $file_size =$_FILES[$files_names[$i]]['size'];
    $file_tmp =$_FILES[$files_names[$i]]['tmp_name'];
    $file_type=$_FILES[$files_names[$i]]['type'];
    $file_ext=strtolower(end(explode('.',$_FILES[$files_names[$i]]['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 6097152){
        header("Location: ../admin/teams.php?error=".$file_size);
     }
    
    
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"../images/teams/".$files_names[$i]."/".$file_name);
       
    }else{
       print_r($errors);
       $files_uploaded = FALSE;
    }
}

$name = mysqli_real_escape_string($conn,$_POST['ime']);
$motor = mysqli_real_escape_string($conn,$_POST['motor']);
$prim = mysqli_real_escape_string($conn,$_POST['primarna']);
$seco = mysqli_real_escape_string($conn,$_POST['sekundarna']);
$logo = $_FILES['logo']['name'];
$zastava = $_FILES['zastava']['name'];
$avto = $_FILES['avto']['name'];


if($files_uploaded){
    $sql = "INSERT INTO teams(name, logo, car, engine, primary_color, secondary_color, flag) VALUES('$name','$logo','$avto','motor','$prim','$seco','$zastava');";
    if($result = mysqli_query($conn,$sql)){
        header("Location: ../admin/add_teams.php?message=Added a team!");
    }else{
        header("Location: ../admin/add_teams.php?message=Error team not added!");
        //echo $sql;
    }
}




?>