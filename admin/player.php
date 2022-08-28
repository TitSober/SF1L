<?php
session_start();
include '../backend/db_connect.php';
if(!empty($_SESSION['id']) && !empty($_GET['id'])){?>
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
    


    <title>F1 Player</title>
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
<?php

  $sql1 = "SELECT * FROM driver WHERE iddriver = ". mysqli_real_escape_string($conn, $_GET['id']);
  if($result1 = mysqli_query($conn, $sql1)){
    while($row=mysqli_fetch_assoc($result1)){



?>
<div class="container border bg-light pb-2">
    <form enctype="multipart/form-data" action="../backend/update_player.php" method="post">
    <div class="container mb-5 mt-3">
        <div class="row">
            <div class="col"><h3>DODAJ VOZNIKA</h3></div>
        </div>
        <div class="row drivers">
          <input type="hidden" name="id" value="<?echo $_GET['id'];?>">
            <div class="col"><label for="ime" class="col-form-label">Ime</label></div>
            <div class="col me-5"><input type="text" name="ime" class="form-control" value="<?php echo $row['name'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="priimek" class="col-form-label">Priimek</label></div>
            <div class="col me-5"><input type="text" name="priimek" class="form-control" value="<?php echo $row['lastname'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="datum" class="col-form-label">Datum rojstva</label></div>
            <div class="col me-5"><input type="date" name="datum" class="form-control" value="<?php echo $row['date_of_birth'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="discord" class="col-form-label">Discord username</label></div>
            <div class="col me-5"><input type="text" class="form-control" name="discord" value="<?php echo $row['discord_username'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="tag" class="col-form-label">Game tag</label></div>
            <div class="col me-5"><input type="text" class="form-control" name="tag" value="<?php echo $row['game_tag'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="steam-code" class="col-form-label">Steam friend code</label></div>
            <div class="col me-5"><input type="text" class="form-control" name="steam-code" value="<?php echo $row['steam_friend_code'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="stevilka" class="col-form-label">Številka</label></div>
            <div class="col me-5"><input type="number" name="stevilka" class="form-control" value="<?php echo $row['driver_number'];?>"></div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="ekipa" class="col-form-label">Ekipa</label></div>
            <div class="col me-5">
                <!-- Creating a dropdown menu with all the teams from the database. -->
                <select name="ekipa" class="form-control" selected="<?php 
                  $selectTeam = "SELECT name from teams WHERE idteams = ". $row['teams_idteams'].";";
                  if($team = mysqli_query($conn, $selectTeam)){
                    while($prevTeam=mysqli_fetch_assoc($team)){
                      echo $prevTeam['name'];
                    }
                  }else{
                    echo "no teams";
                  }
                ?>"><?php
                    $result = mysqli_query($conn, "SELECT name, idteams from teams");
                    if($result){
                        while($row1 = mysqli_fetch_assoc($result)){
                            echo "<option value=".$row1['idteams'].">".$row1['name']."</option>";
                        }
                    }    
                ?></select>
            </div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="oprema" class="col-form-label">Oprema</label></div>
            <div class="col me-5">
                <select name="oprema" class="form-control" selected = "<?php echo $row['equipment'];?>">
                    <option value="Logitech">Logitech</option>
                    <option value="Thrustmaster">Thrustmaster</option>
                    <option value="Fanatec">Fanatec</option>
                    <option value="Kontroler">Kontroler</option>
                    <option value="Tipkovnica">Tipkovnica</option>
                </select>
            </div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="status" class="col-form-label">Status voznika</label></div>
            <div class="col me-5">
                <select name="status" class="form-control" selected = "<?php echo $row['driver_status'];?>">
                    <option value="stalni">Stalni</option>
                    <option value="rezervni">Rezervni</option>
                </select>
            </div>
        </div>
        <div class="row drivers">
            <div class="col"><label for="platforma" class="col-form-label">Platforma</label></div>
            <div class="col me-5">
                <select name="platforma" class="form-control" selected = "<?php echo $row['platform'];?>">
                    <option value="PlayStation">PlayStation</option>
                    <option value="Steam">Steam</option>
                    <option value="Xbox">Xbox</option>
                    <option value="Origin">Origin</option>
                    <option value="Epic">Epic</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container drivers mb-5">
        <h5 class="text-secondary">Asistence</h5>
        <hr class="bg-dark border-2 border-top border-dark">
        
        <div class="row">
            <div class="col-4"><label class="col-form-label" for="Gearbox">Gearbox</label></div>
            <div class="col-2"><input type="checkbox" name="Gearbox" id="gb" value="1" class="form-check-input" <?php echo ($row['Gearbox']) ? 'checked' : ''; ?>></div>
            <div class="col-4"><label class="col-form-label" for="Traction">Traction control</label></div>
            <div class="col-2"><input type="checkbox" name="Traction" id="tc" value="1" class="form-check-input" <?php echo ($row['Traction_control']) ? 'checked' : ''; ?>></div>
        </div>
        <div class="row">
            <div class="col-4"><label class="col-form-label" for="abs">ABS</label></div>
            <div class="col-2"><input type="checkbox" name="ABS" id="abs" value="1" class="form-check-input"<?php echo ($row['ABS']) ? 'checked' : ''; ?>></div>
            <div class="col-4"><label class="col-form-label" for="rl">Racing Line</label></div>
            <div class="col-2"><input type="checkbox" name="Racing" id="rl" value="1" class="form-check-input"<?php echo ($row['Racing_line']) ? 'checked' : ''; ?>></div>
        </div>
    </div>
    <div class="container drivers">
        <h5 class="text-secondary">Grafični elementi</h5>
        <hr class="bg-dark border-2 border-top border-dark">
        <div class="row">
          <div class="col"><h3>Front</h3></div>
          <div class="col"><?php echo "<img src='../images/front/".$row['front_photo']."' class='img-fluid' style='max-width:30%;'>";?></div>
        </div>
        <div class="row">
          <div class="col"><input type="file" name="front" class="form-control form-control-sm" ></div>
          
        </div>
        <div class="row">
          <div class="col"><h3>Levi profil</h3></div>
          <div class="col"><?php echo "<img src='../images/leva_profilna/".$row['left_profile_photo']."' class='img-fluid' style='max-width:30%;'>";?></div>
        </div>
        <div class="row">
          
          <div class="col"><input type="file" name="leva_profilna" class="form-control form-control-sm" ></div>
        </div>
        <div class="row">
          <div class="col"><h3>Desni profil</h3></div>
          <div class="col"><?php echo "<img src='../images/desna_profilna/".$row['right_profile_photo']."' class='img-fluid' style='max-width:30%;'>";?></div>
        </div>
        <div class="row">
          
          <div class="col"><input type="file" name="desna_profilna" class="form-control form-control-sm" ></div>
        </div>
        <div class="row">
          <div class="col"><h3>Lower third</h3></div>
          <div class="col"><?php echo "<img src='../images/lower_third/".$row['LT_photo']."' class='img-fluid' style='max-width:30%;'>";?></div>
        </div>
        <div class="row">
          
          <div class="col"><input type="file" name="lower_third" class="form-control form-control-sm" ></div>
        </div>
        <div class="row">
          <div class="col"><h3>Zmagovalna</h3></div>
          <div class="col"><?php echo "<img src='../images/zmagovalna/".$row['winner_photo']."' class='img-fluid' style='max-width:30%;'>";?></div>
        </div>
        <div class="row">
          
          <div class="col"><input type="file" name="zmagovalna" class="form-control form-control-sm"></div>
        </div>
        <div class="row">
          <div class="col"><input type="submit" value="Potrdi spremembe" class="btn btn-primary"></div>
        </div>
    </div>




    </form>


</div>
<?php

            }
                  }
?>


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
                    <a href="#" class="text-reset fw-bold"><i class="fab fa-discord"></i>|</a>
                    <a href="#" class="text-reset fw-bold"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    
</footer>
</body>
</html>








<?php
}else{
    header("Location: manage_players.php");

}
?>