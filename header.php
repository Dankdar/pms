<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <title>project01.3</title>
</head>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
<div class='container'>
  <?php
  if(isset($_SESSION["sessid"])){
    if ($_SESSION["sessrole"]!=true){
    echo "<a class='navbar-brand' href='salesman.panel.php'><span class='fw-bold text-warning'><i class='bi bi-house'></i> Home</span></a>";
    echo '<a class="nav-item nav-link fw-bold text-warning" onclick="history.back()"  ><i class="bi bi-x-circle"></i></a>';
  }
    else{
      echo "<a class='navbar-brand' href='panel.php'><span class='fw-bold text-warning'><i class='bi bi-house'></i> Home</span></a>";
      echo '<a class="nav-item nav-link fw-bold text-warning" onclick="history.back()"  ><i class="bi bi-x-circle"></i>back</a>';
    }
    }
    else{
    echo "<a class='navbar-brand' href='index.php'><span class='fw-bold text-warning'><i class='bi bi-house'></i> Home</span></a>";}
  ?>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
    <div class="navbar-nav">
        <?php
        if(isset($_SESSION["sessid"])){
            $vegas=$_SESSION["sessfname"]." ".$_SESSION["sesslname"];
            echo '<li><a class="nav-item nav-link fw-bold text-warning" href="includes/logout.inc.php" ><i class="bi bi-box-arrow-up-left"></i> Log-Out</a></li>';
            echo "<a class='nav-item nav-link fw-bold text-secodary' href='#' tabindex='1' aria-disabled='true'><i class='bi bi-person-check'></i>  $vegas</a>";} 
            else{
            echo "<a class='nav-item nav-link fw-bold text-warning' href='#' ><i class='bi bi-person-x'></i></a>";}
        ?>
    </div>
  </div>
</div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
</body>
</html>