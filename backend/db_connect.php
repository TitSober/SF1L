<?php
$conn = mysqli_connect("localhost", "root", "", "f1_database");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

?>