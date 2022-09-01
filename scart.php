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
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<center>
<div class='container my-2 col-8'>
        <br>
        <center><h4>Medicine pantry:</h4></center><br>
    <?php
    if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='0'){
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

        $sql="SELECT * FROM products WHERE qty>'0' LIMIT $offset,$no_of_records_per_page";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                echo "<table border='1' class='text-center  table table-striped'><tr bgcolor='lightgrey'><th>Product name</th><th>type: </th><th> price:</th><th> company:</th><th> dosage:</th><th> description:</th><th colspan='2'> Action:</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr bgcolor='lightpink'>";
                    echo "<td> " . $row["p_name"] . " </td>";
                    echo "<td> ".$row["type"]." </td>";
                    echo "<td> ".$row["price"]." Pkr </td>";
                    echo "<td> ".$row["company"]." </td>";
                    // echo "<td> ".$row["qty"]." </td>";
                    echo "<td> ".$row["dosage"]." mg</td>";
                    echo "<td> ".$row["description"]." </td>";
                    echo '<td><a href="includes/scart.inc.php?add='.$row['p_name'].'" class="btn btn-success"> <i class="bi bi-cart-plus-fill"></i>  add to cart</a></td>';
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
    <li class="page-item">
      <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
  </center>
  <hr>

  <center>
<div class='container my-2 col-5'>
        <br>
        <center><h4>Fill Medicine bag:</h4></center><br>
    <?php
    if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='0'){
        $sql="SELECT * FROM cart";
        $sql1="SELECT SUM(total) as toss FROM cart";
        $res=mysqli_query($conn,$sql1);
        $result = mysqli_query($conn, $sql);
        $row1 = mysqli_fetch_array($res);
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                echo "<table border='1' class='text-center  table table-striped'><tr bgcolor='lightgrey'><th>Product name</th><th>type: </th><th> price:</th><th> company:</th><th colspan='3'> qty:</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr bgcolor='orange'>";
                    echo "<td> " . $row["p_name"] . " </td>";
                    echo "<td> ".$row["type"]." </td>";
                    echo "<td> ".$row["price"]." Pkr </td>";
                    echo "<td> ".$row["company"]." </td>";
                    echo '<td><a href="includes/scart.inc.php?minus='.$row['p_name'].'" class="btn btn-danger"> <i class="bi bi-dash-circle-fill"></i></a>  '. $row["qty"] .'  <a href="includes/scart.inc.php?add='.$row['p_name'].'" class="btn btn-primary"> <i class="bi bi-plus-circle-fill"></i></a></td>';
                    echo "</tr>";
                }
            echo "</table>";
            echo "<table  border='1' class='text-center table table-striped'><tr bgcolor='lightblue'><th>Your total bill: </th><th> ".$row1["toss"]. " Pkr </th></tr></table>";
            echo '<a href="includes/scart.inc.php?checkout='.$_SESSION['sessid'].'" class="btn btn-success"> <i class="bi bi-cart-plus-fill"></i> checkout</a>';
        }
        else {
      echo "cart empty.";}
    }
    else{
       echo "...";
    }
    ?>
    </div>
  </center>

  

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>