<?php
include_once('D:\xampp\htdocs\project_pms\header.php');
require_once('D:\xampp\htdocs\project_pms\includes\functions.inc.php');

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
    <?php if (isset($_SESSION["sessrole"]) && $_SESSION['sessrole']=='1'){ ?>
    <div class='container my-5 col-5'><h3>Enter new medicine information below: </h3></div><hr>
    <div class="container">
    <form action='includes/med.crud.inc.php' method='post' enctype="multipart/form-data">
  <div class="row row-cols-1 row-cols-lg-3">
    <div class="col">
        <label for="p_name" class="form-label">Medicine name:</label>
        <input type="text" class="form-control form-control-sm" name="p_name" placeholder ="medicine name here..." required>
    </div>
    <div class="col">
        <label for="type" class="form-label">Medicine type:</label>
        <input type="text" class="form-control form-control-sm" name="type" placeholder ="medicine type here..."  required>
    </div>
    <div class="col">
        <label for="price" class="form-label">PRICE:</label>
        <input type="number" class="form-control form-control-sm" name="price"  placeholder ="price here..." required>
    </div>
    <br>
    <br>
    <div class="col-4 col-lg-3">
        <label for="company" class="form-label">Medicine company:</label>
        <input type="text" class="form-control form-control-sm" name="company" placeholder ="company name here..." required>
    </div>
    <div class="col-4 col-lg-2">
        <label for="qty" class="form-label"> Quantity:</label>
        <input type="number" class="form-control form-control-sm" name="qty" placeholder ="quantity here..."  required>
    </div>
    <div class="col-4 col-lg-2">
        <label for="dosage" class="form-label">dosage:</label>
        <input type="number" class="form-control form-control-sm" name="dosage"  placeholder ="dosage here..." required>
    </div>
    <div class="col-4">
        <label for="description" class="form-label"> description:</label>
        <input type="text" class="form-control form-control-sm" name="description" placeholder ="discription here..." required>
    </div>
    <div class="col-4 col-lg-1">
        <br>
        <button type="submit" name="submit" class="btn btn-warning">Submit</button>
    </div>
  </div>
  </form>
</div>
<hr>
<br>
<?php } else { echo "...";}
?>
<center>
<div class='container my-2 col-8'>
        <br>
        <center><h4>Entire stocked list:</h4></center><br>
    <?php
    if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='1'){
        if (isset($_GET['pageno'])){
            $pageno = $_GET['pageno'];}
        else{
            $pageno = 1;}
        $no_of_records_per_page = 9;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM products" ;
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql="SELECT * FROM products LIMIT $offset,$no_of_records_per_page";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                echo "<table border='1' class='text-center  table table-striped'><tr bgcolor='lightgrey'><th>Product name</th><th>type: </th><th> price:</th><th> company:</th><th> qty:</th><th> dosage:</th><th> description:</th><th colspan='2'> Action:</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr bgcolor='lightpink'>";
                    echo "<td> " . $row["p_name"] . " </td>";
                    echo "<td> ".$row["type"]." </td>";
                    echo "<td> ".$row["price"]." </td>";
                    echo "<td> ".$row["company"]." </td>";
                    echo "<td> ".$row["qty"]." </td>";
                    echo "<td> ".$row["dosage"]." mg</td>";
                    echo "<td> ".$row["description"]." </td>";
                    echo '<td><a href="includes/med.crud.inc.php?delete='.$row['id'].'" class="btn btn-danger"> delete</a></td>';
                    echo '<td><a href="update_med.php?id='.$row['id'].'" class="btn btn-info"> edit</a></td>';
                    echo "</tr>";
                }
            echo "</table>";
        }
        else {
      echo "Nothing to show.";}
    //
    }
    else{
       echo "...";
    }
    ?>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
    <!-- <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">last</a></li> -->
    <li class="page-item">
      <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
  </center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>