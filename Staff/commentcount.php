<?php 



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