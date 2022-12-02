<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{


include 'connect.php';
if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$delete="DELETE FROM department WHERE departmentID='$id'";
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