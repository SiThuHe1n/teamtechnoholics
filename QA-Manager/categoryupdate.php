<?php 

session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==1)
{


include 'connect.php';

$id=$_POST['id'];
$value1=$_POST['categoryName'];
$value2=$_POST['categoryDescription'];


$update="UPDATE categories SET categoryName='$value1',categoryDescription='$value2' WHERE categoryID='$id'";

$result=mysqli_query($Connect,$update);




}
else 
{
    header("Location: Logout.php");
}








 ?>