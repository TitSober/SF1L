<?php
include('../backend/db_connect.php');
session_start();
if(!empty($_SESSION['id']) && !empty($_GET['id'])){

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
    


    <title>F1 Team edit</title>
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
<div class="container bg-light border">
    <form enctype="multipart/form-data" action="../backend/update_teams.php" method="post">
        <?php
            $sql = "SELECT * FROM teams WHERE idteams=".$_GET['id'].";";
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
        
        ?>
<!--
        <div class="row mb-2">
            <input type="hidden" name="id" value="<?php echo $row['idteams'];?>">
            
            <div class="col-5"></div>
            <div class="col "><input class="form-control text-center" type="text" name="ime" value="<?php echo $row['name'];?>"></div>
            <div class="col-5"></div>
        </div>
        <div class="row mb-2">
            
            <div class="col"><img src="../images/teams/logo/<?php echo $row['logo'];?>" alt="Logo ekipe" class="img-fluid" style="max-width: 50%;"><input type="file" name="logo" class="form-control mt-1"></div>
            <div class="col"><img src="../images/teams/zastava/<?php echo $row['flag'];?>" alt="Logo ekipe" class="img-fluid" style="max-width: 50%;"> <input type="file" name="flag" class="form-control mt-1"></div>
            
        </div>
        <div class="row mb-2">
            <div class="col"><img src="../images/teams/avto/<?php echo $row['car'];?>" alt="Avto" class="img-fluid m-auto" style="max-width: 50%;"><input type="file" class="form-control" name="avto"></div>
            
        </div>
        <div class="row mb-2">
            
            <div class="col-5"></div>
            <div class="col"><input type="text" name="motor" class="form-control text-center" value="<?php echo $row['engine'];?>"></div>
            <div class="col-5"></div>
        </div>
        <div class="row mb-2">
            <div class="col"></div>
            <div class="col"></div>
        </div>-->

        <table class="table">
            <tbody>
                <tr>
                <input type="hidden" name="id" value="<?php echo $row['idteams'];?>">
                </tr>
            </tbody>
        </table>



    </form>
</div>

<?php
    }
        }
?> 

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