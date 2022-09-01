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
<?php if ($_SESSION['sessrole']=='1'){  $id=$_GET['id']; $result = mysqli_query($conn, "SELECT * FROM salesman WHERE id=$id"); while($res = mysqli_fetch_array($result))
{
	$fname = $res['fname'];
    $lname = $res['lname'];
	$email = $res['email'];
}
} ?>
<?php if ($_SESSION['sessrole']=='1'){ ?>
<div class='container my-2 col-5'>
<div><h3>Enter editable salesman info below: </h3></div><hr>
<br>
    <form action="includes/sales.crud.inc.php" method="post" enctype="multipart/form-data">
    <div class='mb-3'>
        <label for="email" class="form-label">change first name:</label>
        <input type="text" class="form-control form-control-sm" name="fname" value="<?php echo $fname;?>"  placeholder ="first name here..." required>
    </div>
    <div class='mb-3'>
        <label for="lname" class="form-label">change last name:</label>
        <input type="text" class="form-control form-control-sm" name="lname" value="<?php echo $lname;?>" placeholder ="last name here..."  required>
    </div>
    <div class='mb-3'>
        <label for="email" class="form-label">change Email:</label>
        <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $email;?>"  placeholder ="email here..." required>
    </div>
    <div class='mb-3'>
        <h4>**password can only be changed by salesman; upon creation by default for all new salesmen is 0000 </h4>
        <input type="hidden" name="uid" value=<?php echo $id; ?> >
    </div>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
    </form>
</div>
<?php } else { echo "...";}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>