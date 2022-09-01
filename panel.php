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
<body class="text-center">
<?php
if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='1'){?>
<br>
<h1>HELLO Admin! <i class="bi bi-emoji-laughing-fill"></i></h1>
<section><br>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Admin priveliges: </h4>
                    </div>
                    <div class="card-body">
                    <div class="row">
    <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
        <img src="asssets\inventory-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-box-seam"></i> Inventory:</h5>
            <hr>
            <p class="card-text">The entire stocked medicine pantry listed.</p>
            <a href="med.crud.php" class="btn btn-primary">Show Inventory</a>
        </div>
    </div>
</div>
    <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
        <img src="asssets\salesman-logo.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-people"></i> Salesmen:</h5>
            <hr>
            <p class="card-text">The full list and information on all salesman and add new if you wish.</p>
            <a href="sales.crud.php" class="btn btn-primary">Show Salesmen</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
        <div class="card" style="width: 18rem;">
        <img src="asssets\search1-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-receipt-cutoff"></i> Sales:</h5>
            <hr>
            <p class="card-text">Look up sales record of all sales on any particular date. </p>
            <a href="sales.php" class="btn btn-primary">Show Sales</a>
        </div>
    </div>
</div>
<div class="col-sm-1">
        <div class="card" style="width: 18rem;">
        <img src="asssets\pf-logo.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><i class="bi bi-pencil"></i> Admin profile:</h5>
            <hr>
            <p class="card-text">Admin profile settings i.e change password or username</p>
            <a href="pfp.php" class="btn btn-success">Edit Profile</a>
        </div>
    </div>
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

</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>

