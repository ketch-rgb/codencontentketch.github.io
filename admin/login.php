<?php
include "includes/header.php";
if(!isset($_SESSION['username']))
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
   
</head>
<title>Admin Login Page</title>
<body>
<div class="row" style="margin-top: 50px">
<div class="col l6 offset-l3 m8 offset-m2 s12">
<div class="card-panel center" style="margin-bottom:0px">
<ul class="tabs">
<li class="tab">
<a href="#login" class="blue-text">Login</a>
</li>
<li class="tab">
<a href="#signup" class="blue-text">Sign Up</a>
</li>
</ul>
</div>

</div>
<!----login and sign-up area--->
<!-----Login Section---->
<div class="col l6 offset-l3 m8 offset-m2 s12" id="login">
<div class="card-panel center" style="margin-top:1.5px">
<h5>Login To Continue</h5>
<?php
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
?>
<form action="login_check.php" method="POST">
<div class="input-field">
<input type="text" name="username" id="username" placeholder="User Name">
</div>
<div class="input-field">
<input type="password" name="password" placeholder="Password">
</div>
<input style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%" type="submit" name="login" class="btn" value="Login" >
</form>
</div>
</div>
<!----Sign-Up Section--->
<div class="col l6 offset-l3 m8 offset-m2 s12" id="signup">
<div class="card-panel center" style="margin-top:1.5px">
<h5>Sign-Up Now</h5>
<form action="signup.php" method="POST">
<div class="input-field">
<input type="email" name="email" id="email" placeholder="Enter Email" class="validate">
<label for="email" data-error="Invalid Email Format" data-success="Valid Email"></label>
<div>
<div class="input-field">
<input type="text" name="username" id="username" placeholder="User Name">
</div>
<div class="input-field">
<input type="password" name="password" placeholder="Password">
</form>
</div>
<div>
<input style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%" type="submit" name="signup" class="btn" value="Sign-Up" >
</div>
</div>
</div>

</div>
<?php
include "includes/footer.php";
}
else
{
  header("Location: dashboard.php");
}
?>









