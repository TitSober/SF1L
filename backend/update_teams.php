<?php
include('db_connect.php');


class ErrorCode{
    public $flag;
    public $error_code;

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
        $file_ext = strtolower(end(explode('.',$_FILES[$files_names[$i]]['name'])));
        
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
        
        return new ErrorCode(FALSE,$errors);
        }
    
    }
    return $files_uploaded;

}



if(file_exists($_FILES['logo']['tmp_name']) && file_exists($_FILES['avto']['tmp_name']) && file_exists($_FILES['zastava']['tmp_name'])){
    $files = array("logo", "zastava","avto");
    $flag = upload_files($files)->get_flag();
    if($flag){
        $sql = "UPDATE teams SET name = '".  mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', logo = '".$_FILES['logo']['name']."', car = '".$_FILES['avto']['name']."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 1";
        echo $flag;
        var_dump($_FILES);

    }

}else if(file_exists($_FILES['logo']['tmp_name']) && file_exists($_FILES['avto']['tmp_name'])){
    $files = array("logo","avto");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '".  mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', logo = '".$_FILES['logo']['name']."', car = '".$_FILES['avto']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 2";
    }

}else if(file_exists($_FILES['logo']['tmp_name']) && file_exists($_FILES['zastava']['tmp_name'])){
    $files = array("logo","zastava");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '".  mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', logo = '".$_FILES['logo']['name']."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 3";
    }

}else if(file_exists($_FILES['avto']['tmp_name']) && file_exists($_FILES['zastava']['tmp_name'])){
    $files = array("zastava","avto");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', car = '".$_FILES['avto']['name']."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 4";
    }

}else if(file_exists($_FILES['avto']['tmp_name'])){
    $files = array("avto");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', car = '".$_FILES['avto']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 5";
    }

}else if(file_exists($_FILES['logo']['tmp_name'])){
    $files = array("logo");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', logo = '".$_FILES['logo']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 6";
    }

}else if(file_exists($_FILES['zastava']['tmp_name'])){
    $files = array("zastava");
    if(upload_files($files)->get_flag()){
        $sql = "UPDATE teams SET name = '". mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."', flag = '".$_FILES['zastava']['name']."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
    
    }else{
        echo "prvi if failed 7";
    }

}else if(!file_exists($_FILES['logo']) && !file_exists($_FILES['avto']) && !file_exists($_FILES['zastava'])){
    $sql = "UPDATE teams SET name = '". mysqli_real_escape_string($conn, $_POST['ime'])."', engine = '". mysqli_real_escape_string($conn, $_POST['motor'])."', primary_color = '". mysqli_real_escape_string($conn, $_POST['primarna'])."', secondary_color = '". mysqli_real_escape_string($conn, $_POST['sekundarna'])."' WHERE idteams = ".$_POST['id'].";";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=True");
        }else{
            header("Location: ../admin/team.php?id=".$_POST['id']."&updated=False");
        }
}
    
?>