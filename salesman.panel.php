<?php
include_once('D:\xampp\htdocs\project_pms\header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="text-center"><br>
<?php
if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='0'){?>
<br>
<h1>HELLO Salesman! <i class="bi bi-emoji-laughing-fill"></i></h1>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Salesman dashboard:</h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
    <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
        <img src="asssets\src-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <br>
            <h5 class="card-title"><i class="bi bi-search"></i> Search inventory:</h5>
            <hr>
            <p class="card-text">Browse medicine and check availability..</p>
            <a href="seller.crud.php" class="btn btn-primary">Search engine</a>
        </div>
    </div>
</div>
<div class="col-sm-4">
        <div class="card" style="width: 18rem;">
        <img src="asssets\sbag-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-bag"></i> Medicine bag:</h5>
            <hr>
            <p class="card-text">sell medicine and generate sales invoice.</p>
            <a href="scart.php" class="btn btn-primary">start selling</a>
        </div>
    </div>
</div> 
<div class="col-sm-4">
        <div class="card" style="width: 18rem;">
        <img src="asssets\pf-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-pencil"></i> salesman profile:</h5>
            <hr>
            <p class="card-text">salesman profile settings such as password and username change.</p>
            <a href="pfp.php" class="btn btn-primary">Show me</a>
        </div>
    </div>
</div>   
</div>
<?php
}
else{
    exit();
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>

