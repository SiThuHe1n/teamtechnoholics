<?php 



session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==1)
{

include 'connect.php';


}
else 
{
    header("Location: Logout.php");
}

include 'connect.php';
$ideaID=$_GET['ideaID'];

$reactCount="SELECT * From ideas where ideaID='$ideaID' ";

$resultreactCount = mysqli_query($Connect, $reactCount);

if (mysqli_num_rows($resultreactCount) > 0) {
     $rowcount=mysqli_num_rows($resultreactCount);
    $row = mysqli_fetch_array($resultreactCount);

 	
    echo $row['commentCount']." Ments ";
               
 	

              
           
        

       
} else { 
    echo "Like 0";
}
 	







 ?>