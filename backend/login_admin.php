<?php
include('db_connect.php');
$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * from admin where email = '$username';";

$result = mysqli_query($conn, $sql);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        if( password_verify($pass, $row['password'])){
            session_start();
            $_SESSION['id'] = $row['idadmin'];
            echo "you're in";
        }else{
            echo "wrong";
        }


    }


}else{
    echo $sql;
}






?>