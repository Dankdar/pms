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
        <div class="container">
            <br><center><div class='container my-2 col-5'><h4>Enter new salesman information below: </h4></div></center><hr>
        <form action='includes/sales.crud.inc.php' method='post' enctype="multipart/form-data">
            <div class="row row-cols-3">
                <div class="col">
                    <label for="email" class="form-label">first name:</label>
                    <input type="text" class="form-control form-control-sm" name="fname" placeholder ="first name here..." required>
                </div>
                <div class="col">
                    <label for="lname" class="form-label">last name:</label>
                    <input type="text" class="form-control form-control-sm" name="lname" placeholder ="last name here..."  required>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control form-control-sm" name="email"  placeholder ="email here..." required>
                </div>
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                    <h6>**password can only be changed by salesman; upon creation by default for all new salesmen is 0000 </h6>
                </div>
            </div>
        </form>
        </div>
<div >
<?php } else { echo "...";}
?>
<br>
<hr>
<div class='container my-2 col-6'>
    <?php
    if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='1'){
        if (isset($_GET['pageno'])){
            $pageno = $_GET['pageno'];}
        else{
            $pageno = 1;}
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM products" ;
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        // show_salesman($conn);
        $sql="SELECT * FROM salesman LIMIT $offset,$no_of_records_per_page";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                echo "<table border='1' class='text-center  table table-striped'><tr bgcolor='lightgrey'><th>Full name</th><th> Email:</th><th colspan='2'> Action:</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr bgcolor='lightgreen'>";
                    echo "<td> " . $row["fname"] ." ". $row["lname"]. " </td>";
                    echo "<td> ".$row["email"]." </td>";
                    echo '<td><a href="includes/sales.crud.inc.php?delete='.$row['id'].'" class="btn btn-danger"> delete</a></td>';
                    echo '<td><a href="update_sales.php?id='.$row['id'].'" class="btn btn-info"> edit</a></td>';
                    echo "</tr>";
                }
            echo "</table>";
        }
        else {
      echo "No salesmen to show.";}
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>