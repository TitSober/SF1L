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
            <li><a class="dropdown-item" href="add_seasons.php">Dodaj sezone</a></li>
            
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
<div class="container">
  <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ime sponzorja</th>
            <th scope="col">Spletna stran</th>
            <th scope="col">Delete</th>
            <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Dodaj nov sponzor
</button></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * from sponsors;";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row= mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<th scope='row'>".$row['idsponsors']."</th>";
                    echo "<th>".$row['display_name']."</th>";
                    echo "<th>".$row['website']."</th>";
                    echo "<th ><a href='../backend/delete_season.php?id=".$row['idsponsors']."' class='btn btn-primary'>Delete</a></th>";
                    echo "<th> </th>";
                    echo "</tr>";
                }
            }
        
        ?>



    </tbody>



  </table>
</div>


<!-- modal time ;)
-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj sponzor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../backend/add_sponsor_to_db.php" method="post">
      <div class="modal-body">
        
           <label for="name" class="form-label">Ime sponzorja</label>
           <input type="text" class="form-control" name="name"> 
           <label for="web" class="form-label">Spletna stran sponzorja</label>
           <input type="text" class="form-control" name="web"> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zapri</button>
        <button type="submit" class="btn btn-primary">Dodaj sezono v podatkovno bazo</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- end of modal times-->

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