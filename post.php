<?php
include "includes/header.php";
include "includes/nav.php";
?>

<title>Blog Post Page</title>
<div class="row">
<!----main content area---->
<div class="col l9 m9 s12">
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);   
    $sql="select * from posts where id=$id";    
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $sql2="select view from posts where id=$id";
        $res2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($res2);
        $view=$row2['view'];
        $view=$view+1;
        $sql3="update posts set view=$view where id=$id";
        mysqli_query($conn, $sql3);
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $content=$row['content'];
?>

<div class="card-panel">
<h5 class="center"><?php echo ucfirst ($title);?></h5>
<p class="flow-text"><?php echo ucfirst ($content);?></p>
<div class="row">
<!----related blog area--->
<div class="col l12 m12 s12">
    <h5>Related Blogs</h5>
    <?php
$sql="select * from posts order by rand() limit 5";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0)
{
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
<div class="card-action center" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%)" >
<a href="post.php?id=<?php echo $row['id'];?>" class="white-text">Read More</a>
</div>
</div>
</div>
<?php
    }    
}
?>
</div>
</div>
</div>
<?php
    }
    else
    {
        header("Location: index.php");
    }
}
?>    
</div>



<!---sidebar area-->
<div class="col l3 m3 s12">
<?php
include "includes/sidebar.php"
?>
</div>



</div>


<?php
include "includes/footer.php";
?>