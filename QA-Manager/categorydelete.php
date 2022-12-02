<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==1)
{


include 'connect.php';
if(isset($_GET['ideaID']))
{
	$id=$_GET['ideaID'];
	$delete="DELETE FROM categories WHERE categoryID='$id'";
	$result=mysqli_query($Connect,$delete);
	if($result)
	{
echo"succ";
	}
	else
	{
echo"fail";
	}
}


}
else 
{
    header("Location: Logout.php");
}





 ?>