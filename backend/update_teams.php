<?php
include('db_connect.php');


class ErrorCode{
    public static $flag;
    public static $error_code;

    function __construct($flag, $error_code){
        $this->flag = $flag;
        $this->error_code = $error_code;

    }
    function get_flag(){
        return $this->flag;
    }
    function get_error_code(){
        return $this->error_code;
    }
}

function upload_files($files_names){
    
    $files_uploaded = new ErrorCode(TRUE,"");
    for($i = 0; $i < count($files_names);$i++){
        $errors= array();
        $file_name = str_replace(" ", "-",$_FILES[$files_names[$i]]['name']);
        $file_size =$_FILES[$files_names[$i]]['size'];
        $file_tmp =$_FILES[$files_names[$i]]['tmp_name'];
        $file_type=$_FILES[$files_names[$i]]['type'];
        $file_ext=strtolower(end(explode('.',$_FILES[$files_names[$i]]['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
            return new ErrorCode(FALSE,"Wrong extention. Use JPG JEPG PNG");
        }
        if($file_size > 6097152){
            return new ErrorCode(FALSE,"File size too big");
        }
        
        
        
        if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../images/teams/".$files_names[$i]."/".$file_name);
        
        }else{
        
        return new ErrorCode(FALSE,$errors)
        }
    
    }
    return $files_uploaded;

}







if(!empty($_FILES['logo']) && !empty($_FILES['avto']) && !empty($_FILES['zastava'])){
    $files = array("logo", "zastava","avto");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". $_POST['ime']."', engine = '".$_POST['motor']."', primary_color = '".$_POST['primarna']."', secondary_color = '".$_POST['sekundarna']."', logo = '".$_FILES['logo']['name']."', car = '".$_FILES['avto']['name']."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }

}else if(!empty($_FILES['logo']) && !empty($_FILES['avto'])){
    $files = array("logo","avto");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". $_POST['ime']."', engine = '".$_POST['motor']."', primary_color = '".$_POST['primarna']."', secondary_color = '".$_POST['sekundarna']."', logo = '".$_FILES['logo']['name']."', car = '".$_FILES['avto']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }
}else if(!empty($_FILES['logo']) && !empty($_FILES['zastava'])){
    $files = array("logo","zastava");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". $_POST['ime']."', engine = '".$_POST['motor']."', primary_color = '".$_POST['primarna']."', secondary_color = '".$_POST['sekundarna']."', logo = '".$_FILES['logo']['name']."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }
}else if(!empty($_FILES['avto']) && !empty($_FILES['zastava'])){
    $files = array("zastava","avto");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". $_POST['ime']."', engine = '".$_POST['motor']."', primary_color = '".$_POST['primarna']."', secondary_color = '".$_POST['sekundarna']."', car = '".$_FILES['avto']['name']."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }
}





?>