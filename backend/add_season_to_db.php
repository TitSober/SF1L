<?php
include('db_connect.php');
$ime = mysqli_real_escape_string($conn,$_POST['name']);
$sql = "INSERT INTO season(name) VALUES('$ime');";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: ../admin/manage_seasons.php?message=success");
}else{
    header("Location: ../admin/manage_seasons.php?message=error with sql");
    //echo $sql;
}


?>