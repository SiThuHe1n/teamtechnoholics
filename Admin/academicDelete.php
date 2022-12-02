<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{

include 'connect.php';
if(isset($_POST['academicID']))
{
	$id=$_POST['academicID'];
	$delete="DELETE FROM academic WHERE academicID='$id'";
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