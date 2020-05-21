<?php
include "includes/header.php";
if(isset($_SESSION['username']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/main.css" /> 
    <style>
    footer, header, .main{
        padding-left:300px;   
    }
    @media(max-width:992px)
    {
        footer, header, .main{
        padding-left:10px;   
    }  
    }
    
    </style>
</head>
</body>
<nav style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>
    <div class="nav-wrapper">
        <div class="container">
            <a href="" class="brand-logo center">And Logic</a>
            <a href="" class="button-collapse show-on-large" data-activates="sidenav"><i class="material-icons">menu</i></a>
        </div>
    </div>
</nav>
<ul class="side-nav fixed" id="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="../img/service-vector1.png" alt="" class="responsive-img">
            </div>
            <div>
                <a href=""><img src="../img/contact-us-image.png" alt="" class="circle"></a>
                <span class="name black-text"><?php echo $_SESSION['username'];?></span>
                <span class="email black-text">
                <?php
                $user=$_SESSION['username'];
                $sql="select email from user where username='$user'";
                $res=mysqli_query($conn, $sql);
                $row=mysqli_fetch_assoc($res);
                echo $row['email'];
                ?>
                </span>
            </div>
        </div>
    </li>
    <li>
        <a href="dashboard.php">Dashboard</a>
    </li>
    <li>
        <a href="post.php">Posts</a>
    </li>
    <li>
        <a href="image.php">Images</a>
    </li>
    <li>
        <a href="">Comments</a>
    </li>
    <li>
        <a href="setting.php">Settings</a>
    </li>
    <div class="divider"></div>
    <li><a href="logout.php">Logout</a></li>
</ul>
<?php
}
else
{
    $_SESSION['message']="<div class='chip red black-text'>Login to continue</div>";
    header("Location: ../login.php");
}
?>