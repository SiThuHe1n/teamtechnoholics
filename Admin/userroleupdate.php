<?php 

session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{


include 'connect.php';

$id=$_POST['id'];
$value1=$_POST['rolename'];
$value2=$_POST['roledes'];


$update="UPDATE userrole SET userRoleName='$value1',userRoleDescription='$value2' WHERE userRoleID='$id'";

$result=mysqli_query($Connect,$update);




}
else 
{
    header("Location: Logout.php");
}








 ?>