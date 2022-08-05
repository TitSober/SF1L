<?php
include('db_connect.php');
$files_names = ['front','zmagovalna','leva_profilna','desna_profilna','lower_third'];
$files_uploaded = TRUE;
for($i = 0; $i < 5;$i++){
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
    if($file_size > 4097152){
        header("Location: ../admin/add_players.php?error=File size too large! Max 4MB!");
     }
    
    
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"../images/".$files_names[$i]."/".$file_name);
       
    }else{
       print_r($errors);
       $files_uploaded = FALSE;
    }
}
$ime = mysqli_real_escape_string($conn,$_POST['ime']);
$priimek = mysqli_real_escape_string($conn,$_POST['priimek']);
$datum = mysqli_real_escape_string($conn,$_POST['datum']);
$discord = mysqli_real_escape_string($conn,$_POST['discord']);
$tag = mysqli_real_escape_string($conn,$_POST['tag']);
$steam = mysqli_real_escape_string($conn,$_POST['steam-code']);
$stevilka = mysqli_real_escape_string($conn,$_POST['stevilka']);
$ekipa = mysqli_real_escape_string($conn,$_POST['ekipa']);
$oprema = mysqli_real_escape_string($conn,$_POST['oprema']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$platforma = mysqli_real_escape_string($conn,$_POST['platforma']);
$gb = mysqli_real_escape_string($conn,$_POST['Gearbox']);
$abs = mysqli_real_escape_string($conn,$_POST['ABS']);
$rl = mysqli_real_escape_string($conn,$_POST['Racing']);
$tr = mysqli_real_escape_string($conn,$_POST['Traction']);
$front = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES['front']['name']));
$zmagovalna = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES['zmagovalna']['name']));
$leva = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES['leva_profilna']['name']));
$desna = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES['desna_profilna']['name']));
$lt = mysqli_real_escape_string($conn,str_replace(" ", "-",$_FILES['lower_third']['name']));

$result = mysqli_query($conn, "INSERT INTO driver(ime, priimek, discord_username, platform, game_tag, steam_friend_code, driver_status, date_of_birth, equipment, driver_number, teams_idteams, front_photo,left_profile_photo, right_profile_photo, winner_photo, LT_photo,Gearbox,ABS, Traction_control, Racing_line) VALUES('$ime', '$priimek','$discord', '$platforma', '$tag', '$steam', '$status', '$datum', '$oprema',$stevilka,$ekipa,'$front', '$leva', '$desna', '$zmagovalna','$lt',$gb, $abs,$tr,$rl);");
if($result){
    header("Location: ../admin/add_players.php");
}else{
    echo("INSERT INTO driver(ime, priimek, discord_username, platform, game_tag, steam_friend_code, driver_status, assists, date_of_birth, equipment, driver_number, teams_idteams, front_photo,left_profile_photo, right_profile_photo, winner_photo, LT_photo) VALUES($ime, $priimek,$discord, $platforma, $tag, $steam, $status, $assist, $datum, $oprema,$stevilka,$ekipa,$front, $leva, $desna, $zmagovalna,$lt);");

}


?>



