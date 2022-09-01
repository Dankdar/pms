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
    <br>
    <div class="container">
        <div class='container my-2 col-5'><h3>Enter date to show sales info below: </h3></div><hr><br>
        <form action="" method='post' enctype="multipart/form-data">
        <div class="row">
            <div class="col-3">
                <label for="date">select date of sale:</label>
                <input type="date" name="date" value="<?php if(isset($_POST['date'])){ echo $_POST['date']; } ?>">
            </div>
            <div class="col-2">
                <button type="submit" name="filter" class="btn btn-warning">filter</button>
            </div>
        </form>
            <div class="col-6">
            <?php
    if (isset($_SESSION["sessrole"]) && $_SESSION["sessrole"]=='1'){
        if(isset($_POST["filter"])){
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
            $f_date = date('Y-m-d 00:00:00', strtotime($_POST['date']));
            $t_date = date('Y-m-d 23:59:59', strtotime($_POST['date']));
            $sql= "SELECT * FROM sales WHERE time BETWEEN '$f_date' AND '$t_date' LIMIT $offset,$no_of_records_per_page ";
            $sql1="SELECT SUM(total) as toss FROM sales WHERE time BETWEEN '$f_date' AND '$t_date' ";
            $res=mysqli_query($conn,$sql1);
            $result = mysqli_query($conn, $sql);
            $row1 = mysqli_fetch_array($res);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1' class='text-center  table table-striped'><tr bgcolor='lightgrey'><th>name: </th><th> qty sold:</th><th> selling price:</th><th> seller id:</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr bgcolor='lightblue'>";
                    echo "<td> " . $row["p_name"]. " </td>";
                    echo "<td> ".$row["qty"]." </td>";
                    echo "<td> ".$row["price"]." </td>";
                    echo "<td> ".$row["s_id"]." </td>";
                    echo "</tr>";}
                echo "</table>";
                echo "<table  border='1' class='text-center table table-striped'><tr bgcolor='lightblue'><th>total sales: </th><th> ".$row1["toss"]. " Pkr </th></tr></table>";
                // echo "<tr bgcolor='lightblue'> <td>".$row1["toss"] ." Pkr </td></tr>";
            }
            else { echo "<h5 style='color:red'>NO RECORDED SALES FOR THIS DATE: choose another date.</h5>"; }
        }
        else{ echo "<h5 style='color:orange'>select date to show sales...</h5>"; }
    }
    else{ echo "...";}
    ?>
            </div>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
</body>
</html>