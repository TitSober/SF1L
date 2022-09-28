<?php
include('db_connect.php');
$ime = mysqli_real_escape_string($conn,$_POST['name']);
$web = mysqli_real_escape_string($conn,$_POST['web']);


$sql = "INSERT INTO sponsors(display_name, website) VALUES('$ime','$web');";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: ../admin/manage_sponsors.php?message=success");
}else{
    header("Location: ../admin/manage_sponsors.php?message=error with sql");
}






?>