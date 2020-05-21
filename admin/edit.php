<?php
include "includes/navbar.php";

if(isset($_GET['id']))
{
    $id= $_GET['id'];
    $id=mysqli_real_escape_string($conn, $id);
    $id=htmlentities($id);
    $sql="select * from posts where id=$id";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_assoc($res);
?>
<div class="main">
<form action="edit_check.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
<div class="card-panel">
<?php
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<h5>Title for post</h5>
<textarea name="title" class="materialize-textarea" placeholder="Title">
<?php
echo $row['title'];
?>
</textarea>
<h5>Post Content</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor">
<?php
echo $row['content'];
?>
</textarea>
<div class="center">
<input type="submit" value="Update" name="update" class="btn white-text" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>
<div>
</div>
</form>
</div>



<!---JQuery--->

<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<?php
include "includes/footer.php"
?>

<?php
    }
    else
    {
        redirect("Location: dashboard.php");
    }
}
?>
