<?php
include('db_connect.php');
$files_names = ['track','flag'];
$files_uploaded  = TRUE;
for($i = 0; $i < count($files_names);$i++){
    $errors= array();
    $file_name = str_replace(" ", "-",$_FILES[$files_names[$i]]['name']);
    $file_size = $_FILES[$files_names[$i]]['size'];
    $file_tmp = $_FILES[$files_names[$i]]['tmp_name'];
    $file_type = $_FILES[$files_names[$i]]['type'];
    $file_ext=strtolower(end(explode('.',$_FILES[$files_names[$i]]['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 6097152){
        header("Location: ../admin/add_players.php?error=".$file_size);
     }
    
    
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"../images/".$files_names[$i]."/".$file_name);
       
    }else{
       print_r($errors);
       $files_uploaded = FALSE;
    }
}
$ime = mysqli_real_escape_string($conn,$_POST['name']);
$location = mysqli_real_escape_string($conn,$_POST['location']);
$time = mysqli_real_escape_string($conn,$_POST['time']);
$laps = mysqli_real_escape_string($conn,$_POST['laps']);
$season = mysqli_real_escape_string($conn,$_POST['season']);
$track = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES[$files_names[0]]['name']));
$flag = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES[$files_names[1]]['name']));
if(isset($_POST['sprint'])){
   $sprint = 1;
}else{
   $sprint = 0;
}
if($files_uploaded){
   $sql = "INSERT INTO races(name,location,date_time,number_laps,season_idseason,sprint_flag,track_photo,flag) VALUES('$ime','$location','$time',$laps,$season,$sprint,'$track','$flag');";
   $result = mysqli_query($conn,$sql);
   if($result){
      header("Location: ../admin/add_races.php?success=1");
   }else{
      header("Location: ../admin/add_races.php?success=0");
      //echo $sql;
   }



}





?>