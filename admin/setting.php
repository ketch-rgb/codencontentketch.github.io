<?php
include "includes/navbar.php";
?>


<div class="main">
    <div class="card-panel">
    <h5 class="center">Settings</h5>
    <?php
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
    <p>Change Password</p>
    <form action="setting.php" method="POST">
    <input type="password" name="password" placeholder="Change Password">
    <input type="password" name="con_password" placeholder="Confirm Password">
    <div class="center">
    <input type="submit" name="update" value="Change Password" class="btn" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>    
    </div>      
    </form>
    </div>
</div>

<?php 
include "includes/footer.php"
?>


<?php
if(isset($_POST['update']))
{
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($conn,$password);
    $password=htmlentities($password);
    $con_password=$_POST['con_password'];
    $con_password=mysqli_real_escape_string($conn,$con_password);
    $con_password=htmlentities($con_password);
    if($con_password===$password)
    {
        $username=$_SESSION['username'];
        $password=password_hash($password, PASSWORD_BCRYPT);
$sql="update user set password='$password' where username='$username'";
$res=mysqli_query($conn, $sql);
if($res)
{
$_SESSION['message']="<div class='chip green white-text'>Password Successfully Changed.</div>";
header("Location: setting.php");
    }
    else
    {
        $_SESSION['message']="<div class='chip red black-text'>Sorry Something went wrong. Please try again.</div>";
        header("Location: setting.php");        
    }
}
else
{
    $_SESSION['message']="<div class='chip red black-text'>Passwords do not match.</div>";
    header("Location: setting.php");
}
}
?>