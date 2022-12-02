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

$value1='12345';




$update="UPDATE users SET Password='$value1'WHERE userID='$id'";

$result=mysqli_query($Connect,$update);






}
else 
{
    header("Location: Logout.php");
}







 ?>