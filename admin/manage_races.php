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
    


    <title>Race management</title>
</head>
<body>

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
            <li><a class="dropdown-item" href="manage_seasons.php">Urejanje sezone</a></li>
            
            
          </ul>
        </li>

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           SPONZORJI
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="manage_sponsors.php">Urejanje sponzorjev</a></li>
            
            
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
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle active" href="manage_players.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">DIRKE</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a href="manage_races.php" class="dropdown-item">Urejanje dirk</a></li>
            <li><a class="dropdown-item" href="add_races.php">Dodajanje dirk</a></li>
            
          </ul>
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
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime</th>
                <th scope="col">Lokacija</th>
                <th scope="col">Čas in datum</th>
                <th scope="col">Število krogov</th>
                <th scope="col"> </th>
                <th scope="col">Track photo</th>
                <th scope="col">Flag</th>
                <th scope="col">Sezona</th>
                <th scope="col">Edit</th>
                

            </tr>
        </thead>
        <tbody>
            <?php
            function getSeasonFromRace($id,$conn){
              $sql = "SELECT name from season WHERE idseason = $id;";
              $result = mysqli_query($conn,$sql);
              if($result){
                while($row = mysqli_fetch_assoc($result)){
                  return $row['name'];
                }
              }else{
                return "No season";
              }

            }



            $race_sql = "SELECT * FROM races;";
            if($result = mysqli_query($conn,$race_sql)){
                while($row = mysqli_fetch_assoc($result)){
                    
                    
                        echo "<tr>";
                        echo "<td>".$row['idraces']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['location']."</td>";
                        echo "<td>".$row['date_time']."</td>";
                        echo "<td>".$row['number_laps']."</td>";
                        if($row['sprint_flag']){
                          echo "<td>Sprint Image</td>";

                        }else{
                          echo "<td> </td>";
                        }
                        echo "<td><img class='img-fluid' src='../images/track/".$row['track_photo']."' style='max-width:30%;'></td>";
                        echo "<td><img class='img-fluid' src='../images/flag/".$row['flag']."' style='max-width:20%;'></td>";
                        echo "<td>".getSeasonFromRace($row['season_idseason'],$conn)."</td>";
                        echo "<td><a class='btn btn-primary' href='race.php?id=".$row['idraces']."'>Link</a></td>";
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
            <div class="col">
                <div class="text-center p-4">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="http://titsober.com/">titsober.com</a>
                </div>
            </div>
            <div class="col">
                <div class="text-center p-4">
                    <a href="#">Ikonca</a>
                    <a href="#">Ikonca</a>
                </div>
            </div>
        </div>
    </div>
    
    
</footer>
</body>





<?php

}?>