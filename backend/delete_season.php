<?php
session_start();
include('db_connect.php');
if(isset($_GET['id']) && !empty($_SESSION['id'])){
$sql = "DELETE FROM season WHERE idseason = ".$_GET['id'];
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: ../admin/manage_seasons.php?message=success");
}else{
    header("Location: ../admin/manage_seasons.php?message=error");
}



}else{
    
}
?>