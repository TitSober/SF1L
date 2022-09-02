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

$files = array("front","leva_profilna","desna_profilna","lower_third","zmagovalna");
$filesThatExist = array();

/* Checking if the file exists and if it does it is pushing it to the array and uploads it to the ftp server. */
for($i = 0; $i < count($files); $i++){
    if(file_exists($_FILES[$files[$i]]['tmp_name'])){
        if($message = upload_files($files[$i])->get_flag()){
            array_push($filesThatExist, $name);

        }
        else{
            header("Location: ../admin/player.php?message=".$message->get_error_code());

        }
    }
    
}

$name = mysqli_real_escape_string($conn,$_POST['ime']);
$lastname = mysqli_real_escape_string($conn,$_POST['priimek']);
$date = mysqli_real_escape_string($conn,$_POST['datum']);
$discord = mysqli_real_escape_string($conn,$_POST['discord']);
$tag = mysqli_real_escape_string($conn,$_POST['tag']);
$steam_code = mysqli_real_escape_string($conn,$_POST['steam-code']);
$number = mysqli_real_escape_string($conn,$_POST['stevilka']);
$team = mysqli_real_escape_string($conn,$_POST['ekipa']);
$eq = mysqli_real_escape_string($conn,$_POST['oprema']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$platform = mysqli_real_escape_string($conn,$_POST['platforma']);
$gear = mysqli_real_escape_string($conn,$_POST['Gearbox']);
$abs = mysqli_real_escape_string($conn,$_POST['ABS']);
$rl = mysqli_real_escape_string($conn,$_POST['Racing']);
$traction = mysqli_real_escape_string($conn,$_POST['Traction']);
$id = mysqli_real_escape_string($conn,$_POST['id']);


$getDBFileNames = "SELECT front_photo fp,right_profile_photo rp,left_profile_photo lp,winner_photo wp,LT_photo ltp WHERE iddriver = $id;";

if($result=mysqli_query($conn,$getDBFileNames)){
    while($row = mysqli_fetch_assoc($result)){
        $sql = "UPDATE driver SET name = $name, lastname = $lastname, discord_username=$discord,platform=$platform,game_tag=$tag,steam_friend_code=$steam_code,driver_status=$status,date_of_birth=$date,equipment=$eq,driver_number=$number,Gearbox=$gear,ABS=$abs,Traction_control=$traction,Racing_line=$rl,front_photo = if(".file_exists($_FILES['front']['tmp_name']).",".$_FILES['front']['name'].",".$row['fp']."),left_profile_photo = if(".file_exists($_FILES['leva_profilna']['tmp_name']).",".$_FILES['leva_profilna']['name'].",".$row['lp']."), right_profile_photo = if(".file_exists($_FILES['desna_profilna']['tmp_name']).",".$_FILES['desna_profilna']['name'].",".$row['rp']."),winner_photo =if(".file_exists($_FILES['zmagovalna']['tmp_name']).",".$_FILES['zmagovalna']['name'].",".$row['wp']."),LT_photo = if(".file_exists($_FILES['lower_third']['tmp_name']).",".$_FILES['lower_third']['name'].",".$row['ltp'].") WHERE iddriver = $id;";
        if($result = mysqli_query($conn, $sql)){
            header("Location: ../admin/player.php?message=success");
        }
        else{header("Location: ../admin/player.php?message=error");}




    } 
}




?>