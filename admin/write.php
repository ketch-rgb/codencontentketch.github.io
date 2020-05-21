<?php
include "includes/navbar.php";
if(isset($_SESSION['username']))
{
?>
<title>Write</title>
<div class="main">
<form action="write_check.php" method="POST" enctype="multipart/form-data">
<div class="card-panel">
<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<h5>Title for post</h5>
<textarea name="title" class="materialize-textarea" placeholder="Title"></textarea>
<h5>Featured Image</h5>
<div class="input-field file-field">
<div class="btn" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>
Upload file
<input type="file" name="image">
</div>
<div class="file-path-wrapper">
<input type="text" class="file-path">
</div>
</div>
<h5>Post Content</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor"></textarea>
<div class="center">
<input type="submit" value="Publish" name="publish" class="btn white-text" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>
<div>
</div>
</form>
</div>



<!---JQuery--->

<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<?php
include "includes/footer.php";
}
else
{
    $_SESSION['message']="<div class='chip red black-text'>Login to continue</div>";
    header("Location: login.php");
}
?>