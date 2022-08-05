<?php
include('db_connect.php');
$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * from admin where email = '$username';";

$result = mysqli_query($conn, $sql);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        if( password_verify($pass, $row['PASSWORD'])){
            session_start();
            $_SESSION['id'] = $row['idadmin'];
            header("Location: ../admin/dashboard_admin.php");
        }else{
            header("Location: ../admin/login.php?error=Wrong email or password");
        }


    }


}else{
    echo $sql;
}






?>