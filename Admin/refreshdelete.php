<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{


include 'connect.php';
  date_default_timezone_set("Asia/Yangon");
 $aca4="SELECT * FROM academic order by academicID desc limit 1 ";
          $resuaca4= mysqli_query($Connect, $aca4);
          if (mysqli_num_rows($resuaca4) > 0) {
        
          $arr4 = mysqli_fetch_array($resuaca4);
                echo $arr4['finalclosureDate'];
                 }

                
                   else
                {
                 echo date("Y-m-d");
                } 



}
else 
{
    header("Location: Logout.php");
}



 ?>