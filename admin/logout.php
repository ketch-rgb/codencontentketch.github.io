<?php
include "includes/header.php";
if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
    $_SESSION['message']="<div class='chip green white-text'>You have been successfully logged out.</div>";
    header("Location: ../login.php");
    header("Location: login.php");
}
else
{
    header("Location: login.php");
}
?>