<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{


include 'connect.php';

$id=$_POST['academicID'];
$sdate=$_POST['esdate'];
$cdate=$_POST['ecdate'];
$fcdate=$_POST['efcdate'];

$update="UPDATE academic SET startDate='$sdate',closureDate='$cdate',finalclosureDate='$fcdate' WHERE academicID='$id'";

$result=mysqli_query($Connect,$update);




}
else 
{
    header("Location: Logout.php");
}









 ?>