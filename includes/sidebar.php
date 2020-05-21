<ul class="collection">
<li class="collection-item">
<h5>Search</h5>
<form action="search.php" method="GET">
<div class="input-field">
<input type="text" id="search" name="search" placeholder="Search Anything">
<div class="center">
<input type="submit" class="btn" value="Search" name="submit" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%">
</div>
</form>
</div>
</li>
</ul>

<div class="collection with-header">
<h5 class="center"> Most Read </h5>
<div class="divider"></div>
<?php
$sql = "select * from posts order by view DESC limit 5";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_assoc($res))
{
?>
<a href="post.php?id=<?php echo $row['id'];?>" class="collection-item grey lighten-3 black-text"><?php echo $row['title'];?></a>
<?php
}
}
?>
</div>
</div>