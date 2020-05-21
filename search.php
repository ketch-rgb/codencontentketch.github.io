<?php
include "includes/header.php";
include "includes/nav.php";
if(isset($_GET['submit']))
{
$q=$_GET['search'];
$q=mysqli_real_escape_string($conn,$q);
$q=htmlentities($q);
$sql="select * from posts where title like '$q' or content like '$q' or title  like '%$q%' or content like '%$q%'";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0)
{
    ?>
    <div class="row">
<!---this is main content area--->
<div class="col l9 m9 s12">
    <?php
    while($row=mysqli_fetch_assoc($res))
    {
?>
<div class="col l3 m4 s12">
<div class="card">
<div class="card-image">
<img src="img/<?php echo $row['feature_image'];?>" alt="">
</div>
<div class="card-title black-text truncate">
<span><?php echo $row['title'];?></span>
</div>
<div class="card-content truncate">
<?php echo $row['content'];?>
</div>
<div class="card-action center" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%)" >
<a href="post.php?id=<?php echo $row['id'];?>" class="white-text">Read More</a>
</div>
</div>
</div>
<?php
    }
    ?>
</div>
<div class="col l3 m3 s12">
<?php
include "includes/sidebar.php";
?>
</div>
</div>
    <?php
}
else
{
    ?>
    <h5>Sorry no data found by given search query. Search again with another search query.</h5>
    <?php
}
}
else
{
    header("Location: index.php");
}
?>

<?php
include "includes/footer.php";
?>