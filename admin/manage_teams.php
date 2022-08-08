<?php
include('../backend/db_connect.php');
session_start();
if(!empty($_SESSION['id'])){

?>

<?php
include('../backend/db_connect.php')

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/font.css">
    <script src="../js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/ef06bd2c19.js" crossorigin="anonymous"></script>
    


    <title>F1 Dashboard</title>
</head>
<body>
<!--Navbar start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h1>SF1L</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           SEZONE
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>


        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            KOMISIJSKA SOBA
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active me-3" href="#">KOLEDAR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active me-3" href="#">STATISTIKA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active me-3" href="manage_players.php">UREJANJE TEKMOVALCEV</a>
        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle active" href="manage_players.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            TEKMOVALCI IN EKIPE
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a href="manage_players.php" class="dropdown-item">Urejanje tekmovalcev</a></li>
            <li><a class="dropdown-item" href="add_players.php">Dodajanje tekmovalcev</a></li>
            <li><a class="dropdown-item" href="manage_teams.php">Urejanje ekip</a></li>
            <li><a class="dropdown-item" href="add_teams.php">Dodajanje ekip</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active me-3" href="#">O NAS</a>
        </li>
        <li class="nav-item">
          <a class=" nav-link me-3 active" href="login.php" ><i class="fas fa-user-alt" aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Main body of page other is static -->
<div class="container ">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Ime</th>
        <th scope="col">Logo</th>
        <th scope="col">Motor</th>
        <th scope="col">Primary</th>
        <th scope="col">Secondary</th>
        <th scope="col">Link</th>
        </tr>
    </thead>
    <tbody class="drivers">
        <?php
            $sql = "SELECT * FROM teams;"; 
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td><img src='../images/teams/logo/".$row['logo']."' alt='Logo :)' class='img-fluid' style='max-width: 15%;'></td>";
                    echo "<td>".$row['engine']."</td>";
                    echo "<td style='background-color: #" . $row['primary_color'] . ";'></td>";
                    echo "<td style='background-color: #" . $row['secondary_color'] . ";'></td>";
                    echo "<td><a target='_blank' href='team.php?id=".$row['idteams']."'>Link</a></td>";


                    echo "</tr>";
                }
            }
        
        ?>
    </tbody>
    </table>

</div>




<footer id="footer" class="mt-auto py-3 footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="text-center p-4">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="http://titsober.com/">titsober.com</a>
                </div>
            </div>
            <div class="col-1">
                <div class="text-center p-4">
                    <a href="https://discord.gg/FHAn7FjCca" target="blank" class="text-reset fw-bold"><i class="fab fa-discord"></i></a>
                    
                </div>
            </div>
            <div class="col-1">
            <div class="text-center p-4">
            <a href="https://www.instagram.com/slovenskaf1ligapc/" class="text-reset fw-bold" target="blank"><i class="fab fa-instagram"></i></a>
        </div>
            </div>
        </div>
    </div>
    
    
</footer>
</body>
</html>




<?php

}?>