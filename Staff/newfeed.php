<?php 
session_start();
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==3)
{

if(isset($_GET['Page']))
{
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
    $pagenum=$_GET['Page'];
    $userID=$_SESSION['UserID'];
    $anonymous=1;
    if (isset($_POST['anonymous'])) {

    $anonymous=0;
} else {
     $anonymous=1;

   // Alternate code
}
      date_default_timezone_set("Asia/Yangon");
  $date = date("Y-m-d");

 if(isset( $_FILES["file"] ) && !empty( $_FILES["file"]["name"] ))
 {
 $targetfolder1 = "../upload/";

 $targetfolder = $targetfolder1 ."upload_".rand(1,100000)."_".basename( $_FILES['file']['name']) ;


$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg" || $file_type=="image/jpg" || (!empty($_FILES["uploaded_file"]["type"]))) {
    
 

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {



 }

 else {
 echo "<script>alert('Problem uploading file');</script>";


 }


}

else {
       echo "<script>alert('You may only upload PDFs, JPEGs or PNG or JPG files.');</script>";


}
 }
 else
 {
    $targetfolder="";
 }



if(isset($_POST['ideaTitle']) && isset($_POST['ideaCategory']) && isset($_POST['ideacontent']))
{

      $qaca = "SELECT * FROM academic ORDER BY academicID DESC limit 1";
                        $resultaca = mysqli_query($Connect, $qaca);
                       if (mysqli_num_rows($resultaca) > 0) {
                       $rowaca = mysqli_fetch_array($resultaca);
                       $acaaid= $rowaca['academicID'];
                   }
                   else
                   {
                       $acaaid=0;
                   }


  
    $Title=$_POST['ideaTitle'];
            $Content=$_POST['ideacontent'];
            $Category=$_POST['ideaCategory'];
            $Date1=  date("Y-m-d H:i:s");
          
            $Insert="INSERT INTO ideas(ideaTitle,ideaContent,ideaDate,commentCount,likeCount,dislikeCount,viewCount,userID,categoryID,academicID,filelocation,anonymous) VALUES('$Title','$Content','$Date1','0','0','0','0','$userID','$Category','$acaaid','$targetfolder','$anonymous')";
            $result=mysqli_query($Connect,$Insert);
            if ($result) {
                $datetime = date("Y-m-d H:i:s");
                echo "<script>alert('Completed');</script>";
             
                   $acc="SELECT * FROM users WHERE userID='$userID'";
                          $resacc = mysqli_query($Connect, $acc);
                            if (mysqli_num_rows($resacc) > 0) {
                            $arracc = mysqli_fetch_array($resacc);
                             $dpaID=$arracc['departmentID'];
                         }



                  $qacd="SELECT * FROM users WHERE userRoleID='2' AND departmentID='$dpaID'";
      $resqacd = mysqli_query($Connect, $qacd);
        if (mysqli_num_rows($resqacd) > 0) {
          while($arracd = mysqli_fetch_array($resqacd)){
            $qaemail=$arracd['userEmail'];





//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

try {
    //Server settings
                    //Enable verbose debug output
                                          //Send using SMTP

    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Host       = 'tls://smtp.gmail.com';                     //Set the SMTP server to send through
                                  //Enable SMTP authentication
    $mail->Username   = 'unitechbyteamtechnoholic@gmail.com';                     //SMTP username
    $mail->Password   = 'sithu2022';                               //SMTP password
            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('unitechbyteamtechnoholic@gmail.com');
    //Add a recipient
    $mail->addAddress($qaemail);               //Name is optional
 
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Your Department's staff submitted";
    $mail->Body    = " Your Department's staff submitted an Idea at ".$datetime;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
            }
            else{
                echo "<script>alert('error  ');</script>";
            }
        }
            
        }
      
}
elseif(isset($_POST['ideaTitle']))
{
       
}
else 
{
     header("Location: Home.php");
}



}
else 
{
    header("Location: Logout.php");
}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniTec | Newsfeed</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css' integrity='sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css'/>

    <style>
        #ideaAccordionBtn{
            background-color: #526e91;  /*#526e91 */
        }
        .createPost{
            background-color: #e5e5ed;
        }
        #ideaTitle{
            font-weight: bold;
            font-size: 34px;
            background-color: white;
        }
        #ideacontent{
            font-size: 20px;
        }
        #ideaCategory{
            font-size: 16px;
        }

        .ideaPost{
            border-bottom: 1.3px solid #e5e5ed;
            padding-bottom: 25px;
        }
        
        .ideaPost:last-of-type{
            border-bottom: 0;
        }
              #Terms {
                    display:none;
                    width:500px;
                }
                #cbocate{
                     display:inline;
                }
    </style>
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    
var targetURL="../Login.php";

  function auto_check_login(){
    $.ajax({
      url: "Login_Session.php",
      cache: false,
      success: function(data){
       
          if(data != 1){
              window.location=targetURL; //Redirect user to login page.
          }
          else{
        
          }
      } 
    });
  }



 var loginSess=null;  

    $(document).ready(function(){

 var loginSess=null;  
  //loginSess= setInterval(auto_check_login,5000);

     });

   




</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light "> 
  <a class="navbar-brand py-2" href="">UniTec</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto ">
  <li class="nav-item">
        <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="newfeed.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="account.php">Account</a>
      </li>
      <li class="nav-item">
        <a href="Logout.php" class="btn btn-outline-success"> Log out</a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container mt-4">
        <?php 
                        $qaca = "SELECT * FROM academic ORDER BY academicID DESC limit 1";
                        $resultaca = mysqli_query($Connect, $qaca);
                       if (mysqli_num_rows($resultaca) > 0) {
                       $rowaca = mysqli_fetch_array($resultaca);
                       if($rowaca['closureDate']<$date )
                       {
                    
                        ?>
        <div class="alert alert-danger" role="alert">
          Form is already closed. No action can be done anymore. Please wait for the next form to open.
        </div>
        <?php }}?>
        <div class="row">

            <div class="col-md-8">
                <form action="newfeed.php?Page=1&search=&filter=None&category=ALL" method="POST" enctype="multipart/form-data">
                <div class="accordion accordion-flush" id="createIdeaAccordion">
                    <button id="ideaAccordionBtn" class="btn border-0 py-3 btn-block text-light rounded-0 text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="row">
                            <div class="col-6">
                                What do you want to share?
                            </div>
                            <div class="col-6 ml-auto text-right">
                                <i class="fa-solid fa-angle-down align-center"></i>
                            </div>
                        </div>
                      </button>
                      <?php 
                        $qaca = "SELECT * FROM academic ORDER BY academicID DESC limit 1";
                        $resultaca = mysqli_query($Connect, $qaca);
                       if (mysqli_num_rows($resultaca) > 0) {
                       $rowaca = mysqli_fetch_array($resultaca);
                       if($rowaca['closureDate']<$date )
                       {
                    
                        ?>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#createIdeaAccordion">
                        <div class="alert alert-primary rounded-0" role="alert">
                            You're a bit late. The form is now closed. If you'd still like to see the ideas, it will be available till final closure date (<?php echo $rowaca['finalclosureDate']; ?>).
                          </div>
                    </div>

                        <?php  
                       }
                       else
                       {
                      
?>
   <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#createIdeaAccordion">
                      
                            <div class="card rounded-0 createPost text-white border-light">
                                <div class="card-body">
                                    <div class="form-group px-0">
                                        <input type="text" name="ideaTitle" id="ideaTitle" class="form-control p-3" placeholder="Your idea Title . . ." required>
                                    </div>
                                    <div class="form-group px-0">
                                     
                                        <select class="form-control px-0 border-0" id="ideaCategory" name="ideaCategory" required>
                                         
                                           <?php 
                                                $Categoryquery = "SELECT * FROM categories";
                                                $Resultcategory = mysqli_query($Connect, $Categoryquery);


                                                 while($row2 = mysqli_fetch_array($Resultcategory)):;?>
                                                 ?>
                                                       <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
                                                 <?php
                                                  endwhile;
                 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group px-0">
                                        <textarea id="ideacontent" name="ideacontent"  class="form-control px-0 border-0" placeholder="Your idea Content . . . "  required></textarea>
                                    </div>
                                    <div class="form-group px-0">
                                        <input type="file" name="file" class="form-control-file form-control-sm text-secondary">
                                    </div>
                                     <div class="form-group px-0">
                                   
                                             <div class="  form-switch">
  <input class="form-check-input" name="anonymous" type="checkbox" role="switch" id="flexSwitchCheckDefault">
  <label class="text-dark" for="flexSwitchCheckDefault"> Anonymous</label>
</div>
 </div>



                                    <div class="row mt-5">

                                        <div class="col-sm-8">


                                                <input type="checkbox" id="Agree" name="terms&condition" id="terms&condition" style="width: 17px; height: 17px;" class="align-middle" onchange="checkTerm_condition(this)">
                                                <label for="terms&condition" class="text-dark" style="font-size:small;">I've read and accept the<a href="#" class="text-info"id="showTerms"> Terms and Conditions.</a></label>
                                           
<br>    <br>
<div id="Terms">
    
 
<p style="color:#6c757d;">Terms and conditions </p>



    <p style="color:#6c757d;">
        We may use some of your personal information through submission forms. Before using our site, you must accept these terms. If you don’t agree to these terms, you must not use our site.  
    </p>

    <p style="color:#6c757d;">
    1.Content which must be do not defames or threatens others 
    </p>

    <p style="color:#6c757d;">
        2.Prohibit Harassing statements or violates federal  
    </p>

    <p style="color:#6c757d;">
    3.Prohibit a content which included discussion of illegal activities with the intent to commit them 
    </p>

    <p style="color:#6c757d;">
    4.Contact which must be do not include another’s intellectual property, including, but not limited to, copyrights, trademarks or trade secret 
    </p>

     <p style="color:#6c757d;">
    5.Material which must be do not contains obscene (i.e. pornographic) language or images 
    </p>

     <p style="color:#6c757d;">
    6.Prohibit advertising or commercial solicitation 
    </p>

    <p style="color:#6c757d;">
    7.Content which must not be otherwise unlawful 
    </p>

 


 

 

 

 

 

</div>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="float-right">
                                                <button id="Submitidea" class="btn btn-primary btn-sm" disabled>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                    
                    </div>
<?php  
                       }


                   }
                   else
                   {



                       ?>
               

 <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#createIdeaAccordion">
                        <div class="alert alert-primary rounded-0" role="alert">
                             The form is now closed. There has no Academic Year.
                          </div>
                    </div>


                <?php } ?>
                </div>
                </form>
                <script type="text/javascript">
                    

    $(document).ready(function() {

    
     $( '#showTerms' ).click(function() {
                            
                          $( '#Terms').slideToggle( 'Fast', function() {
                        
                             
                          });
                        });
 


        $("#Submitidea").click(function() {
     alert('Please Wait Program is loading');
            
   });

        


    });


 </script>
                </script>
                <!-- Create post -->
                 <div class="mb-4 bg-light border border-white px-3 shadow"  id="showlist">

               









<?php 

if($pagenum)
{
$b=($_GET["Page"]*5)-5;


include 'Show.php';
$result = mysqli_query($Connect, $query);
if (mysqli_num_rows($result) > 0) {
     $rowcount=mysqli_num_rows($result);
 
 
    while($row = mysqli_fetch_array($result)){
               $usID=   $row['userID'];
             
             

                          
                 
                    $query2="SELECT * From users WHERE userID='$usID'";
                    $result2 = mysqli_query($Connect, $query2);
                    if (mysqli_num_rows($result2) > 0) {

                    $row2 = mysqli_fetch_array($result2);
                    $dpid=$row2['departmentID'];
                    $query3="SELECT * From department WHERE departmentID='$dpid'";
                     $result3 = mysqli_query($Connect, $query3);
                    if (mysqli_num_rows($result3) > 0) {
                    $row3 = mysqli_fetch_array($result3);


                  
    echo '
                    <div class="ideaPost mt-4">
                        <div class="row px-3 mb-0">
                            <div class="col-xs-6">';
                            if($row['anonymous']==0)
                            {
                                  echo'
                                <h4 class="mb-1"><a href="post.php?ideaID='.$row['ideaID'].'" class="text-dark text-decoration-none">Anonymous</a></h4>
                                ';
                            }

                                else{
  echo'
                                <h4 class="mb-1"><a href="post.php?ideaID='.$row['ideaID'].'" class="text-dark text-decoration-none">'.$row2['userName'].'</a></h4>
                                ';
                                }
                    
                          echo      '<p style="font-size:15px" class="text-secondary mb-1">'.$row3['departmentName'].'</p>';
                      }
                      else
                      {
                         echo      '<p style="font-size:15px" class="text-secondary mb-1">error</p>';
                      }
                    }
                    else
                    {
                        echo '<p style="font-size:15px" class="text-secondary mb-1"> Error </p>';
                    }
                                echo'
                                <p style="font-size:13px" class="text-secondary"><i class="fa-solid fa-clock"></i> Posted on '.$row['ideaDate'].'</p>
                            </div>
                            <div class="col-xs-6 ml-auto">
                                <button type="button" class="btn align-top rounded-pill p-0">
                                    <i class="fa-solid fa-eye text-secondary"></i> <span class="badge badge-light text-secondary">'.$row['viewCount'].'</span>
                                  </button>
                            </div>
                        </div>
                        
                        <h3>'. $row['ideaTitle'] .'</h3>
                        <p style="font-size:14px" >'.substr($row['ideaContent'],0,250).' ....... <a href="post.php?ideaID='.$row['ideaID'].'" class="text-secondary">Read More</a></p>
                        <div class="row px-2 mt-4">
                            <div class="col-xs-6">
                                <button id="Thumbup'.$row['ideaID'].'" class="btn btn-light text-primary btn-sm rounded-pill None">0 Like <i class="fa-solid fa-thumbs-up"></i></button>
                                <button id="Thumbdown'.$row['ideaID'].'" class="btn text-danger btn-sm rounded-pill btn-light None"> <i class="fa-solid fa-thumbs-down"></i></button>   
                                <a href="post.php?ideaID='.$row['ideaID'].'" id="comment'.$row['ideaID'].'" class="btn btn-light rounded-pill btn-sm text-muted">0 Comments <i class="fa-solid fa-comments"></i></a>
                            </div>
                          
                        </div>
                    </div>
                    
';

        
?>

<script type="text/javascript">
    
        function Count<?php  echo $row['ideaID'];  ?>()
        {
        
      var ideaID1=<?php     echo $row['ideaID'];  ?>;
         
            $.ajax({

            
                 type: "GET",
                url: "DislikeCount.php",
                data: {
                          
                        ideaID:<?php     echo $row['ideaID']; ?>,
                      

                },
                cache: false,
                success: function(res) {
                 
            $('#Thumbdown<?php echo $row['ideaID'];?>').html(res);

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             $.ajax({

            
                 type: "GET",
                url: "commentcount.php",
                data: {
                          
                        ideaID:<?php     echo $row['ideaID']; ?>,
                      

                },
                cache: false,
                success: function(res) {
                 
            $('#comment<?php echo $row['ideaID'];?>').html(res);

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             $.ajax({

            
                 type: "GET",
                url: "LikeCount.php",
                data: {
                          
                        ideaID:<?php     echo $row['ideaID']; ?>,
                      

                },
                cache: false,
                success: function(res) {
                  
            $('#Thumbup<?php echo $row['ideaID'];?>').html(res);

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
        }

    $(document).ready(function() {
    Count<?php  echo $row['ideaID'];  ?>();
     var cout=null;  
  cout= setInterval(Count<?php  echo $row['ideaID'];  ?>,2500);


  <?php 
  $acid=$row['academicID'];
  $qaca = "SELECT * FROM academic WHERE academicID='$acid'";
                        $resultaca = mysqli_query($Connect, $qaca);
                       if (mysqli_num_rows($resultaca) > 0) {
                       $rowaca = mysqli_fetch_array($resultaca);
                       if($rowaca['finalclosureDate']<$date )
                       {


                       }
                       else
                       {
                        ?>
  $("#Thumbup<?php    echo $row['ideaID'];  ?>").click(function() {
                var ideaID=<?php    echo $row['ideaID'];  ?>;
                  var userID=<?php    echo $userID;  ?>;

            $.ajax({
                type: "POST",
                url: "Thumbup.php",
                data: {
                        
                        userID:userID,
                        ideaID:ideaID
                },
                cache: false,
                success: function(data) {
                   Count<?php  echo $row['ideaID'];  ?>();
        
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             
        });

        $("#Thumbdown<?php  echo $row['ideaID'];  ?>").click(function() {

                          var ideaID=<?php    echo $row['ideaID'];  ?>;
                  var userID=<?php    echo $userID;  ?>;

            $.ajax({
                type: "POST",
                url: "Thumbdown.php",
                data: {
                        
                        userID:userID,
                        ideaID:ideaID
                },
                cache: false,
                success: function(data) {
                          Count<?php  echo $row['ideaID'];  ?>();
        
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             
        });
          


                        <?php 
                       }
                   }
                   else
                   {
?>


<?php  
                   }

   ?>
      



        


    });

</script>
<?php
              
           
        }

       
} 
else
{
    echo"<h3 >There has No Data</h3>";
}
}
 ?>
 
                </div> 

                <!-- Ideas post -->
              

                <!-- Pagination bar -->

  <form action="newfeed.php" method="GET">
<input type="text" name="Page" value="<?php echo $_GET['Page']; ?>" id="page" hidden readonly>
                <nav >
                    <ul class="pagination justify-content-center border-0">
                      
                       

<?php 




include ('Show.php');
$result1 = mysqli_query($Connect, $query1);
if (mysqli_num_rows($result1) > 0) {
     $rowcount=mysqli_num_rows($result1);

$no=ceil($rowcount/5);

$aaa=$_GET['Page'];
$up=$aaa+1;
$down=$aaa-1;
       if($_GET['Page']>1)
       {
  echo'  <li class="page-item"><button id="pagedown'.$down.'"class="page-link">&laquo;</button></li>';
  
 
       }
       else
       {

       }

for ($b=1;$b<=$no;$b++)
{
    if($_GET['Page']==$b)
    {
echo'   <li class="page-item active bg-dark" aria-current="page">
                            <span class="page-link text-light">'.$b.'</span>
                        </li>
';
 
    }
    else
    {
       echo'  <li class="page-item"><button id="page'.$b.'"class="page-link">'.$b.'</button></li>';
  
    }
     
   

  ?>




 <script type="text/javascript">
     
    $(document).ready(function() {
          $("#page<?php  echo $b;  ?>").click(function() {
            
      // var no=<?php  echo $b;  ?>;
            $('#page').val(<?php  echo $b;  ?>);
 
    
            
   });
         

});
 </script>
  <?php

   
}

 if($_GET['Page']<$no)
       {
  echo'  <li class="page-item"><button id="pageup'.$up.'"class="page-link">&raquo;</button></li>';
  
 
       }
       else
       {

       }

       ?>
<script type="text/javascript">
    
 $(document).ready(function() {
        $("#pagedown<?php  echo $down;  ?>").click(function() {
            
  
            $('#page').val(<?php  echo $down;  ?>);
 
    
            
   });
                $("#pageup<?php  echo $up;  ?>").click(function() {
            
      
            $('#page').val(<?php  echo $up;  ?>);
 
    
            
   });
            });
</script>
       <?php
}


 ?>
                   
                  
                  
                    </ul>
                </nav>
         
            </div>

                

            <div class="col-md-4 px-5 ">
                <div class="search mb-4">
                    <h5 class="lead mb-3">Ideas Search</h5>
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search . . ." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
                
                <div class="filter mb-4">
                    <h5 class="lead mb-3">Filter by</h5>
                 
                        <div class="form-group">
                                      <select class="form-control" id="filter1" name="filter">
                            <?php 
                            $filter=array("None","mostviewed","mostpopular","latestcomment","latestidea");
                            for ($i=0;$i<5;$i++)
                            {
                                 if($_GET['filter']==$filter[$i])
                                 {
                                      echo'  <option value="'.$filter[$i].'" selected>'.$filter[$i].'</option>';
                                 }
                                 else
                                 {
                                       echo'  <option value="'.$filter[$i].'">'.$filter[$i].'</option>';
                                 }
                            }

                           
                                
                             ?>
                  
                            
                             
                                
                            </select>
                        </div>
                 
                </div>
            <div class="filter mb-4">
                    <h5 class="lead mb-3">Category </h5>
                 
                        <div class="form-group">
                            <select class="form-control" id="category1" name="category">

                                <?php 

                                $cate="SELECT * FROM categories";
                                $resultcate=mysqli_query($Connect,$cate);

                                if (mysqli_num_rows($resultcate) > 0) {

                                     
                                     if($_GET['category']=="ALL")
                                       {
                                         echo ' <option selected value="ALL">ALL</option>';
                                       }
                                       else
                                       {
                                         echo ' <option value="ALL">ALL</option>';
                                       }
                                    
                                      while($rowcate = mysqli_fetch_array($resultcate)){

                                        if($_GET['category']==$rowcate['categoryID'])
                                       {
                                            echo ' <option selected value="'.$rowcate['categoryID'].'">'.$rowcate['categoryName'].'</option>';
                                       }
                                       else
                                       {
                                         echo ' <option value="'.$rowcate['categoryID'].'">'.$rowcate['categoryName'].'</option>';
                                       }

                                    
                                      }
                                  

                                 
                                    

                                              
                                           
                                        

                                       
                                } else { 
                                    echo "Like 0";
                                }
                                    


                                 ?>
                           
                            </select>
                        </div>
                 
                </div>
            </div>
</form>
<script>
    $(function(){
       $('#filter1').on('change', function(){
      $("form").submit();
          
        });
    
     
           $('#category1').on('change', function(){
      
         $("form").submit();
    
      });
    });
     </script>
         
          
           
        </div>

    </div>
    


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/rrr9ywwcmgivj2altdsyamur2wt6sdp2g5r2x29uu63s33g9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      


        function checkTerm_condition(checkbox){
            if(checkbox.checked == true){
                document.getElementById("Submitidea").removeAttribute("disabled");
            }else{
                document.getElementById("Submitidea").setAttribute("disabled", "disabled");
            }
                
        }
        
    </script>

<!--footer section-->
<style type="text/css">
  
  
</style>

    
<footer class="bg-light p-3 " style="color:#DBE2EF">
  <div class="container ">
    <div class="row">
      <div class="col-lg-4"><a href="" style="text-decoration: none; color: grey;">&copy; All rights reserved 2022-2023</a></div>
      <div class="col-lg-4"><a href="" style="text-decoration: none; color: grey;">By Team Technoholics</a></div>
      <div class="col-lg-4"><a href="" style="text-decoration: none; color: grey;">Improve with your ideas</a></div>
    </div> 
  </div>
</footer>



</body>
</html>