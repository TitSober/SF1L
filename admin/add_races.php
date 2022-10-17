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
    


    <title>Add races</title>
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
<div class="container border bg-light"> 
    <form enctype="multipart/form-data" action="../backend/add_races_db.php" method="post">
    <div class="container">
    <h4 class="text-secondary mt-2">Dodajanje dirk</h4>
        <div class="row mt-3">
            <div class="col"> <label for="name" class="form-label">Ime</label> </div>
            <div class="col"> <input type="text" name ="name" class="form-control"> </div>
        </div>
        <div class="row mt-3">
            <div class="col"> <label for="location" class="form-label">Lokacija</label> </div>
            <div class="col"> <input type="text" name ="location" class="form-control"> </div>
        </div>
        <div class="row mt-3">
            <div class="col"> <label for="time" class="form-label">Čas in datum</label> </div>
            <div class="col"> <input type="datetime-local" name ="time" class="form-control"> </div>
        </div>
        <div class="row mt-3">
            <div class="col"> <label for="laps" class="form-label">Krogi</label> </div>
            <div class="col"> <input type="number" name ="laps" class="form-control"> </div>
        </div>
        <div class="row mt-3">
            <div class="col"> <label for="season" class="form-label">Sezona</label> </div>
            <div class="col"><select name="season" class="form-select"> <?php
                $season_sql = "SELECT * from season;";
                if($result = mysqli_query($conn, $season_sql)){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['idseason']."'>".$row['name']."</option>";
                    }
                }
            
            ?> </select></div>
        </div>
        
        



    </div>
    <div class="container">
    <h5 class="text-secondary">Grafični elementi</h5>
    <hr class="bg-dark border-2 border-top border-dark">
    <div class="row">
      <div class="col">
        <label for="track" class="form-label">Track photo</label>
      </div>
      <div class="col"><input type="file" name="track" class="form-control"></div>
    </div>  
    <div class="row mt-3">
      <div class="col">
        <label for="flag" class="form-label">Flag photo</label>
      </div>
      <div class="col"><input type="file" name="flag" class="form-control"></div>
    </div>    
          <div class="row mt-3 mb-3">
            
            <div class="col"><input type="submit" class="btn btn-primary" value="Submit"></div>
          </div>
    </div>




    </form>
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