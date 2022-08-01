<?php
include('db_connect.php');
$uname = mysqli_real_escape_string($conn,$_POST['username']);
$pass = mysqli_real_escape_string($conn,$_POST['password']);
$name = mysqli_real_escape_string($conn,$_POST['name']);

if(mysqli_query($conn,"INSERT INTO admin(name, email, password) VALUES('$name', '$uname', '".password_hash($pass, PASSWORD_DEFAULT)."');")){
    header("Location: ../admin/login.php");
}else{
    echo "INSERT INTO admin(name, email, password) VALUES('$name', '$uname', '".password_hash($pass, PASSWORD_DEFAULT)."');";
    
}


?>  