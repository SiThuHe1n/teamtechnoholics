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
$value1=$_POST['departmentName'];



$update="UPDATE department SET departmentName='$value1'WHERE departmentID='$id'";

$result=mysqli_query($Connect,$update);




}
else 
{
    header("Location: Logout.php");
}









 ?>