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
$value2=$_POST['username'];
$value3=$_POST['email'];
$value4=$_POST['pass'];
$value5=$_POST['phone'];
$value6=$_POST['dob'];
$value7=$_POST['gender'];
$value8=$_POST['role'];
$value9=$_POST['dep'];



$update="UPDATE users SET userName='$value2',userEmail='$value3',Password='$value4',dateofbirth='$value6',userPhoneNumber='$value5',userGender='$value7',userRoleID='$value8',departmentID='$value9'WHERE userID='$id'";

$result=mysqli_query($Connect,$update);







}
else 
{
    header("Location: Logout.php");
}






 ?>