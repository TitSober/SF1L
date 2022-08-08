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
<div class="container border bg-light">
    <form enctype="multipart/form-data" action="../backend/add_teams_db.php" method="post">
    
    <div class="container">
        <div class="row mt-3">
            
            <div class="col"><h3>DODAJ EKIPO</h3></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="ime" class="col-form-label">Ime ekipe</label></div>
            <div class="col"><input type="text" name="ime" class="form-control"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="motor" class="col-form-label">Motor</label></div>
            <div class="col"><input type="text" name="motor" class="form-control"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="primarna" class="col-form-label">Primarna</label></div>
            <div class="col"><input type="text" name="primarna" class="form-control"></div>
        </div>
        <div class="row drivers mb-5">
            <div class="col"><label for="sekundarna" class="col-form-label">Sekundarna</label></div>
            <div class="col"><input type="text" name="sekundarna" class="form-control"></div>
        </div>
    </div>
    <div class="container">
        <h5 class="text-secondary">Grafični elementi</h5>
            <hr class="bg-dark border-2 border-top border-dark">
        <div class="row drivers">
            <div class="col"><label for="logo" class="col-form-label">Logotip</label></div>
            <div class="col"><input type="file" name="logo" class="form-control"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="zastava" class="col-form-label">Zastava</label></div>
            <div class="col"><input type="file" name="zastava" class="form-control"></div>
        </div>
        <div class="row drivers ">
            <div class="col"><label for="crta" class="col-form-label">Črtica</label></div>
            <div class="col"><input type="file" name="crta" class="form-control"></div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-11"></div>
            <div class="col"><input type="submit" value="Potrdi" class="btn btn-primary"></div>
        </div>
    </div>



    </form>



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