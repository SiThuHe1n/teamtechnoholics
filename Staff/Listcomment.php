<?php 
include 'connect.php';
$ideaID=$_GET['ideaID'];
$Cmtcount="SELECT * From comments where ideaID='$ideaID' ";

$resultCmtcount = mysqli_query($Connect, $Cmtcount);

if (mysqli_num_rows($resultCmtcount) > 0) {
     $rowcount=mysqli_num_rows($resultCmtcount);

 
    while($row = mysqli_fetch_array($resultCmtcount)){
               
                echo '    <div class="media mb-3">
                        <div class="media-body border p-2 rounded">
                            <div class="row">
                                <div class="col-8">
                                ';
                                if($row['ischeck']==1)
                                {
                                    echo '       <h6 class="pt-2">Anonymous <small class="font-weight-normal text-muted"> '.$row['commentTime'].'</small></h6>';
                                }
                                else
                                {
                                    $usid=$row['userID'];
                                    $cmusid="SELECT * FROM users where userID='$usid'";
                                    $cmidres = mysqli_query($Connect, $cmusid);
                                    if (mysqli_num_rows($cmidres) > 0) {
                                         

                                         
                                       $row1= mysqli_fetch_array($cmidres);


                                       echo '       <h6 class="pt-2">'.$row1['userName'].' <small class="font-weight-normal text-muted"> '.$row['commentTime'].'</small></h6>';
                                   }
                                }
                             
                                echo'
                                </div>
                               
                            </div>
                            <p style="font-size:14px;">'.$row['commentContent'].'</p>
                        </div>
                    </div>';

              
           
        }

       
} else {
		echo "<p>Nodata</p>";
}
 	

 ?>