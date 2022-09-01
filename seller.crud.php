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
<body>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" >
            <form class="form-inline" method="POST" action="seller.crud.php">
				<div class="input-group col-md-12">
					<input type="text" class="form-control" placeholder="Search here..." name="keyword" required value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
					<span class="input-group-btn">
						<button class="btn btn-success" name="search"><i class="bi bi-search"></i>  SEARCH</button>
					</span>
				</div>
			</form>
            </div>
        </div>
    </div>
</div><hr>
<br><br>
<div class='container my-2 col-6'>
<?php
if (isset($_SESSION["sessrole"])){
    if (isset($_POST["search"])){
        $key=$_POST["keyword"];
        //search_med($conn,$key);
        $sql= "SELECT p_name,type,price,company,qty FROM products WHERE p_name='$key' OR company='$key'  ";//update statement
        //mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' class='text-center  table table-striped'><tr bgcolor='lightgrey'><th>Product name</th><th>type: </th><th> price:</th><th> company:</th><th> AVAILABILITY:</th></tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr bgcolor='violet'>";
                echo "<td> " . $row["p_name"] . " </td>";
                echo "<td> ".$row["type"]." </td>";
                echo "<td> ".$row["price"]." </td>";
                echo "<td> ".$row["company"]." </td>";
                if ($row["qty"]>"0"){
                    echo "<td><h5><b style='color:green'>IN STOCK: ". $row["qty"] ." units available.</b></h5></td>";
                    }else{echo "<td><h5><b style='color:red'>OUT-OF-STOCK</b></h5></td>";}
                echo "</tr>";
            }
        echo "</table>";
        }
        else {
      echo "<h4 style='color:red'>NO SUCH MEDICINE/COMPANY IN RECORD.</h4>";}
    //
    }
    else{ echo "<br>"; echo "<h5 style='color:orange'>search any medicine or company name...</h5>";}
}
else {
    echo "..." ;
}
?>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
