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
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   if(isset($_POST['downloadacad']))
                        {

                $acadID=$_POST['downloadacad'];
                        $quecsv="SELECT * FROM ideas WHERE academicID='$acadID'";
                        $rescsv = mysqli_query($Connect, $quecsv);
                         $arraydata2=[['Idea_ID','Idea_Title','Content','Uploaded_Date','Comment_Count','Liked_Count','Disliked_Count','View_Count','User_Name','User_Department_Name','Category','Academic']];
                        if (mysqli_num_rows($rescsv) > 0) {
        
                            while($rowcsv = mysqli_fetch_array($rescsv)){
                                  $arraydata1=[];
                                $username1='';
                                $depname='';
                                $catname='';
                                $actext1='';
                              
                                       $usID1=   $rowcsv['userID'];
                                     $acdID1=$rowcsv['academicID'];
                                     $ctID1=$rowcsv['categoryID'];
                                      
                    $quecsv2="SELECT * From users WHERE userID='$usID1'";

                    $rescsv2 = mysqli_query($Connect, $quecsv2);
                    if (mysqli_num_rows($rescsv2) > 0) {

                    $rowcsv2 = mysqli_fetch_array($rescsv2);
                $username1=$rowcsv2['userName'];
                        
                    $dpid1=$rowcsv2['departmentID'];
                    $quecsv3="SELECT * From department WHERE departmentID='$dpid1'";
                     $rescsv3 = mysqli_query($Connect, $quecsv3);
                    if (mysqli_num_rows($rescsv3) > 0) {
                    $rowcsv3 = mysqli_fetch_array($rescsv3);
                  
                    $depname=$rowcsv3['departmentName'];
      

                      }
                      else
                      {
                               $depname="noData";
                 
                      }
                    }
                    else
                    {
                        $username1="noData";
                 
                    }
                     $quecsv4="SELECT * From categories WHERE categoryID='$ctID1'";
                    $rescsv4 = mysqli_query($Connect, $quecsv4);
                    if (mysqli_num_rows($rescsv4) > 0) {
                      $rowcsv4 = mysqli_fetch_array($rescsv4);

                                $catname=$rowcsv4['categoryName'];
                    }
                    else
                    {
                           
                               $catname="noData";
                    }

                    $quecsv5="SELECT * From academic WHERE academicID='$acdID1'";
                    $rescsv5 = mysqli_query($Connect, $quecsv5);
                    if (mysqli_num_rows($rescsv5) > 0) {

                    $rowcsv5 = mysqli_fetch_array($rescsv5);

   
                    $actext1=$rowcsv5['startDate'].' to '.$rowcsv5['finalclosureDate'];
                     
}

 array_push($arraydata1,$rowcsv['ideaID'],$rowcsv['ideaTitle'],$rowcsv['ideaContent'],$rowcsv['ideaDate'],$rowcsv['commentCount'],$rowcsv['likeCount'],$rowcsv['dislikeCount'],$rowcsv['viewCount'],$username1 , $depname,$catname,$actext1 );

   
                               array_push($arraydata2,$arraydata1);
}

}
 
   $f = fopen('php://output', 'w');
   header("Content-type: application/csv");
   header("Content-Disposition: attachment; filename=Allidea.csv");

if ($f === false) {
die('Error opening the file ');
}



foreach ($arraydata2 as $row) {
fputcsv($f, $row);
}
 fclose($f);




} ?>