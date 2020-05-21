<?php
include "includes/navbar.php";
if(isset($_SESSION['username']))
{
?>
<div class="row main">
<div class="col l12 m12 s12">
<div class="card-panel">
<ul class="collection with-header">
<li class="collection-header" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")>
<h5>Recent Posts<h5>
<span id="message"></span>
</li>
<?php
$sql="select * from posts order by id desc";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_assoc($res))
{
?>
<li class="collection-item">
<a href=""><?php echo $row['title']?></a><br>
<span><a href="edit.php?id=<?php echo $row['id']; ?>">Edit <i class="material-icons tiny"> edit</i></a> | <a href="" id="<?php echo $row['id']; ?>" class="delete">Delete <i class="material-icons tiny red-text">clear</i></a> | <a href="">Share <i class="material-icons tiny green-text">share</i> </a></span>
</li>
<?php
}
}
else
{
    echo "<div class='chip red white-text'>You have no posts yet. Write by clicking the edit button below</div>.";
}
?>
</ul>
</div>
</div>
</div>
<div class="fixed-action-btn">
<a href="write.php" class="btn-floating btn btn-large white-text pulse" style= "background: linear-gradient(105.4deg, #71C1FB 0%, #8CE3F7 100%")><i class="material-icons">edit</i></a>
</div>



<script>
const del=document.querySelectorAll(".delete");
del.forEach(function(item,index)
{
item.addEventListener("click", deleteNow)
})
function deleteNow(e)
{
    e.preventDefault();
    if(confirm("Do you really want to delete?"))
    {
      const xhr=new XMLHttpRequest();
      xhr.open("GET", "delete.php?id="+Number(e.target.id), true)
      xhr.onload=function()
      {
        const messg=xhr.responseText;
        const message=document.getElementById("message")
        message.innerHTML=messg;
      }
      xhr.send()
    }
    
    
}
</script>
<?php
include "includes/footer.php";
}
else
{
    $_SESSION['message']="<div class='chip red black-text'>Login to continue</div>";
    header("Location: login.php");
}
?>