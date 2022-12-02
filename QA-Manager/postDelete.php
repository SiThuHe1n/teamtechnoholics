<?php 

session_start();
function redirect($page) {
    header('Location: ' . $page);
    exit;
}
if(!isset($_SESSION['Login_Session']))
{
redirect('../login.php');

}
if($_SESSION['userRoleID']==1)
{


include 'connect.php';
if(isset($_GET['ideaID']))
{   
    echo $_GET['ideaID'];
	$id=$_GET['ideaID'];
	$delete="DELETE FROM ideas WHERE ideaID='$id'";
	$result=mysqli_query($Connect,$delete);
	if($result)
	{
    echo "<script>";
    echo "alert('Completely deleted');";
    echo "</script>";
    echo "<script>window.location='https://unitecbyteamtechnoholicpro.000webhostapp.com/QA-Manager/idea_list.php?Page=1&search=&filter=latestidea&category=ALL';</script>";
	}
	else
	{
echo "<script>";
echo "alert('Idea with comments, like and dislike cannot delete');";
echo "</script>";
echo "<script>window.location='https://unitecbyteamtechnoholicpro.000webhostapp.com/QA-Manager/idea_list.php?Page=1&search=&filter=latestidea&category=ALL';</script>";
	}
}


}
else 
{
    redirect("Logout.php");
}





 ?>