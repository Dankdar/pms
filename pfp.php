<?php
include_once('D:\xampp\htdocs\project_pms\header.php');
require_once('D:\xampp\htdocs\project_pms\includes\functions.inc.php');

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<section>

<br><br><br><h1 class='text-center'>Change your profile information here:</h1><br><hr><br><br>
<div class="container">
  <div class="row">
    <div class="col">
        <form action="" method='post' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for="email" class="form-label">Username/Email</label>
                <input type="email" class="form-control form-control-sm" name="email" placeholder ="new email here..." required>
            </div>
            <div>
                <fieldset disabled>
                    <div class="mb-3">
                        <label for="curem" class="form-label">Your current Username/Email:</label>
                        <input type="text" id="curem" class="form-control form-control-sm" namme="curem" value="<?php echo $_SESSION["sessemail"] ?>" placeholder="Disabled input">
                    </div>
                </fieldset>
            </div>
            <div class='mb-3'>
                <button type="submit" name="submitusername" class="btn btn-success">change username/email</button><br>
            </div>
        </form>
    </div>
    <div class="col">
        <form action="" method='post' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for="pwd" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" name="pwd" placeholder ="new password here..." required>
            </div>
            <div class='mb-3'>
                <label for="pwdrep" class="form-label">Confirm password</label>
                <input type="password" class="form-control form-control-sm" name="pwdrep" placeholder ="confirm password here..." required >
            </div>
            <button type="submit" name="submitpwd" class="btn btn-danger">change password</button><br>
        </form>
    </div>
  </div>

<?php 
if(isset($_SESSION["sessrole"])){
    if(isset($_POST["submitpwd"])){
        $pwd=$_POST["pwd"];
        $pwdrep=$_POST["pwdrep"];
        $role=$_SESSION["sessrole"];
        $hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);;
        if ($pwd===$pwdrep){
            change_pwd($conn,$hashedpwd,$role);

        }
        else{
            header("location: ../project_pms/pfp.php?error=pwdmissmatch");
            exit();
        }
    }
    if(isset($_POST["submitusername"])){
        $email=$_POST["email"];
        $role=$_SESSION["sessrole"];
        $premail=$_SESSION["sessemail"];
        if ($email!==$premail){
            change_username($conn,$email,$role);
        }
        else{
            header("location: ../project_pms/pfp.php?error=emailissame");
            exit();
        }
    }
}
?>
</div>
</div>
</section><br>
<hr>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>