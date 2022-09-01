<?php
include_once('D:\xampp\htdocs\project_pms\header.php');
require_once('D:\xampp\htdocs\project_pms\includes\functions.inc.php');
require_once('D:\xampp\htdocs\project_pms\includes\db.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body> <br><br>
<?php if ($_SESSION['sessrole']=='1'){ $id=$_GET['id']; $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id"); while($res = mysqli_fetch_array($result))
{
    $p_name=$res['p_name'];
    $type=$res['type'];
    $price=$res['price'];
    $company=$res['company'];
    $qty=$res['qty'];
    $dosage=$res['dosage'];
    $description=$res['description'];

}
} ?>
<?php if ($_SESSION['sessrole']=='1'){ ?>
<div class='container my-2 col-5'><h3>Enter editable medicine information below: </h3></div><hr>
<div class="container">
    <form action='includes/med.crud.inc.php' method='post' enctype="multipart/form-data">
  <div class="row row-cols-1 row-cols-lg-3">
    <div class="col">
        <label for="p_name" class="form-label">Medicine name:</label>
        <input type="text" class="form-control form-control-sm" name="p_name" value="<?php echo $p_name;?>" placeholder ="medicine name here..." required>
    </div>
    <div class="col">
        <label for="type" class="form-label">Medicine type:</label>
        <input type="text" class="form-control form-control-sm" name="type" value="<?php echo $type;?>" placeholder ="medicine type here..."  required>
    </div>
    <div class="col">
        <label for="price" class="form-label">PRICE:</label>
        <input type="number" class="form-control form-control-sm" name="price" value="<?php echo $price;?>" placeholder ="price here..." required>
    </div>
    <br>
    <br>
    <div class="col-4 col-lg-3">
        <label for="company" class="form-label">Medicine company:</label>
        <input type="text" class="form-control form-control-sm" name="company" value="<?php echo $company;?>" placeholder ="company name here..." required>
    </div>
    <div class="col-4 col-lg-2">
        <label for="qty" class="form-label"> Quantity:</label>
        <input type="number" class="form-control form-control-sm" name="qty" value="<?php echo $qty;?>" placeholder ="quantity here..."  required>
    </div>
    <div class="col-4 col-lg-2">
        <label for="dosage" class="form-label">dosage:</label>
        <input type="number" class="form-control form-control-sm" name="dosage" value="<?php echo $dosage;?>" placeholder ="dosage here..." required>
    </div>
    <div class="col-4">
        <label for="description" class="form-label"> description:</label>
        <input type="text" class="form-control form-control-sm" name="description" value="<?php echo $description;?>" placeholder ="discription here..." required>
    </div>
    <div class="col-4 col-lg-1">
        <br>
        <input type="hidden" name="uid" value=<?php echo $id; ?> >
        <button type="submit" name="update" class="btn btn-success">Update</button>
    </div>
  </div>
  </form>
</div>
<?php } else { echo "...";}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>