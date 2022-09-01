<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <section>
      <br>
     <?php if(!isset($_SESSION["sessid"])){ ?>
    <h1 class='text-center'>Welcome to Pharmacy/Clinic Management System<h1>
        <h3 class="text-center">LETS SELL SOME MEDICINE!!!</h3>
<hr><br>
<h1 class='text-center'><i class="bi bi-door-open-fill"></i> Login portal</h1> 
    <div class='container my-2 col-3'>
    <form action='includes/login.inc.php' method='post' enctype="multipart/form-data">
    <div class='mb-3'>
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control form-control-sm" name="email" placeholder ="email here..." required>
    </div>
    <div class='mb-3'>
        <label for="pwd" class="form-label">Password</label>
        <input type="password" class="form-control form-control-sm" name="pwd" placeholder ="password here..." required>
    </div><br>
    <div class='mb-3'>
    <label for="role">select role: </label>
    <select name="role" id="role">
        <option value="1">Admin</option>
        <option value="0">Salesman</option>
    </select>
    </div><center>
        <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-box-arrow-right"></i> Login</button></center>
    </form>
    <?php
    if(isset($_GET["error"])){
        if ($_GET["error"]=="emptyLogin"){
        echo "<p style='color:red'> fill in all fields </p>";
    }
    else if ($_GET["error"]=="wrongCredentials"){
        echo "<p style='color:red'> please choose a valid email or password!</p>";
    }
}
}
else{
  echo "<h1 class='text-center'>Welcome to Pharmacy/Clinic Management System<h1>";
  echo "<h3 class='text-center'>LETS SELL SOME MEDICINE!!!</h3>";
}
?>
</div>
</section>
<hr><br>
<center><h6>AUTHORS: </h6></center>
<ol class="list-group list-group-numbered">
  <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Huzaifa Dar</div>
      ROLL-NO: 22-10622
    </div>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">---</div>
      ---
    </div>
  </li>
</ol>
<br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>