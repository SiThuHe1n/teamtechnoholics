<?php 
include 'connect.php';
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==1)
{


    if(isset($_GET['ideaID']))
{
date_default_timezone_set("Asia/Yangon");
    //$pagenum=$_GET['Page'];
    $userID=$_SESSION['UserID'];
  
  $date = date("Y-m-d");


$ideaID=$_GET['ideaID'];
$userID=$_SESSION['UserID'];
$time=  date("Y-m-d H:i:s");





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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css' integrity='sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css'/>
    <link rel='stylesheet' href='QA_Manager.css'>
    <style>
        html {
            scroll-behavior: smooth;
        }

        #post-like-btn{
            background-color:white;
            border: none;
            border-radius: 50%;
            color: #5a5959;
            padding: 10px 15px;
            text-align: center;
            font-size: 20px;
            display: inline-block;
            transition: 0.3s;
        }
        #post-like-btn:hover{
            background-color: #3f71af38;
            border-radius: 50%;
            color: #3F72AF;
        }
        #post-like-btn:active{
            background-color: #1d4e8a5e;
            border-radius: 50%;
            color: #223d5e;
            box-shadow: 0 0 10px 15px #154f9638;
        }

        #post-dislike-btn{
            background-color:white;
            border: none;
            border-radius: 50%;
            color: #5a5959;
            padding: 10px 15px;
            text-align: center;
            font-size: 20px;
            display: inline-block;
            transition: 0.3s;
        }
        #post-dislike-btn:hover{
            background-color: #dc354631;
            border-radius: 50%;
            color: #dc3545;
        }
        #post-dislike-btn:active{
            background-color: #9b26322c;
            border-radius: 50%;
            color: #9b2632;
            box-shadow: 0 0 10px 15px #b4384449;
        }

        
        #post-comments-count{
            background-color:white;
            border: none;
            border-radius: 50%;
            color: #5a5959;
            padding: 10px 15px;
            text-align: center;
            font-size: 20px;
            display: inline-block;
            transition: 0.3s;
        }
        #post-comments-count:hover{
            background-color: #6c757d3f;
            border-radius: 50%;
            color: #6c757d;
        }
        #post-comments-count:active{
            background-color: #94a0aa3f;
            border-radius: 50%;
            color: #51585e;
            box-shadow: 0 0 10px 15px #5454573f;
        }

        #post-view-count{
            background-color: white;
            border: none;
            border-radius: 50%;
            color: black;
            padding: 10px 15px;
            text-align: center;
            font-size: 20px;
            display: inline-block;
            transition: 0.3s;
        }
        #post-view-count:hover{
            background-color: #343a401f;
            border-radius: 50%;
            color: #6c757d;
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
     
      } 
    });
  }


 var loginSess=null;  

    $(document).ready(function(){

 // loginSess= setInterval(auto_check_login,5000);

     });

   




</script>

<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light px-5 nav-bottom pb-3 mynav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UniTec</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    <li class="nav-item px-5">
                        <a class="nav-link active" aria-current="page" href="http://localhost:8080/UniTec/UniTec/QA-Manager/idea_list.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link " href="category_list.php">Category</a>
                    </li>

                </ul>
                <button type="button" class="btn orange-btn-outline">Logout</button>

            </div>
        </div>
    </nav>
    <div class="container-fluid mt-5">

        <div class="row">

            <div class="col-md-1 text-center d-none d-md-block">
                <div class="position-fixed">
                    <button id="post-like-btn" name="btnlike">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </button>
                    <center name="likecount" id="Thumbup1" class="text-secondary"> Like</center> <br>
                    <button id="post-dislike-btn" name="btndislike">
                        <i class="fa-solid fa-thumbs-down"></i>
                    </button>
                    <center name="dislikecount" id="Thumbdown1" class="text-secondary"> Dislike</center> <br>
                    <a href="#comments" id="post-comments-count">
                        <i class="fa-solid fa-comments"></i>
                    </a>
                    <center name="cmtcount" id="cmtamount" class="text-secondary"> Ments</center> <br>
                    <button disabled="disabled" id="post-view-count">
                        <i class="fa-solid fa-eye text-secondary"></i>
                    </button>
                    <center name="viewcount" id="ViewCount1" class="text-secondary"> View</center>
                </div>

            </div>

            
<?php 

    $que2="SELECT * FROM ideas WHERE ideaID='$ideaID'";

                    $resu3 = mysqli_query($Connect, $que2);
                    if (mysqli_num_rows($resu3) > 0) {
                        $arr4 = mysqli_fetch_array($resu3);
                        $categoryid2=$arr4['categoryID'];

                    $ctg1="SELECT * FROM categories WHERE categoryID='$categoryid2'";
                    $resu4 = mysqli_query($Connect, $ctg1);
                    if (mysqli_num_rows($resu4) > 0) {
                        $arr5 = mysqli_fetch_array($resu4);
                     
                      
                      



 ?>
            <div class="col-md-8">
                <div class="alert alert-warning" role="alert">
                  QA Manager and QA Coordinator can have read-only access.
                </div>
                <div class="bg-light p-3 shadow-sm">
                    <div class="row px-3">
                        <div class="col-xs-7">
                            <p class="font-weight-normal text-muted">Anonymous<small>(<?php echo $arr5['categoryName']; ?>)</small></p>
                        </div>
                        <div class="col-xs-5 ml-auto">
                            <p class="font-weight-normal text-muted"><i class="fa-solid fa-clock" style="font-size: small;"></i> <?php echo $arr4['ideaDate']; ?></p>
                        </div>
                    </div>   
                    <!-- Title -->
                    <h2 class="font-weight-bold"><?php echo $arr4['ideaTitle']; ?></h2>

                    <!-- Category -->
                    <span style="font-size: 14px; background-color: #e2e6ea;" class="font-weight-light p-1 px-2 rounded-pill"># <?php echo $arr5['categoryName']; ?></span>

                    <!-- Idea Content -->
                    <p class="mt-4 text-justify border-bottom pb-3">
                      <?php echo $arr4['ideaContent']; ?>
                    </p>
                   
                    <?php if($arr4['filelocation']=='0' || $arr4['filelocation']=='')
                    {

                    }
                    else
                    {

                    
                     ?>
                      <p class="mt-3 font-weight-bold">
                        1 Attachments
                    </p>
                    <div class="row px-3">
                        <div class="col-md-4">
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe  class="embed-responsive-item border bg-white" src="<?php echo $arr4['filelocation']; ?>"></iframe>
                              </div>
                              <a href="<?php echo $arr4['filelocation']; ?>" download="<?php echo $arr4['filelocation']; ?>" class="text-info text-decoration-none"><?php echo $arr4['filelocation']; ?> Attachment</a>
                        </div>
                    </div>
                <?php } ?>

                </div>
                <hr class="my-4">
                <div class="p-3 border" style="background-color:#f3f5f3;">
                
                 

                         


                      
   

                            
                    
         
                    
         
                </div>
                <?php 
                    }
                } ?>
                <hr class="my-4">
                <!-- comments -->

<script type="text/javascript">
    
        function Count()
        {
        
      var ideaID1=<?php     echo $ideaID;  ?>;
         
            $.ajax({

            
                 type: "GET",
                url: "DislikeCount.php",
                data: {
                          
                        ideaID:ideaID1
                      

                },
                cache: false,
                success: function(res) {
                 
               $("center[name='dislikecount'").html(res);
           $("span[name='dislikecount'").html(res);
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
                          
                        ideaID:ideaID1
                      

                },
                cache: false,
                success: function(res) {
                 
                $("center[name='cmtcount'").html(res);
                 $("span[name='cmtcount'").html(res);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
               $.ajax({

            
                 type: "GET",
                url: "viewcount.php",
                data: {
                          
                        ideaID:ideaID1
                      

                },
                cache: false,
                success: function(res) {
                 
                $("center[name='viewcount'").html(res);
                $("span[name='viewcount'").html(res);
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
                 $.ajax({
            
                 type: "GET",
                url: "Listcomment.php",
                data: {
                          
                         ideaID:ideaID1

                },
                cache: false,
                success: function(res) {
                
            $('#comments').html(res);

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
                          
                        ideaID:ideaID1
                      

                },
                cache: false,
                success: function(res) {
                  
            $("center[name='likecount'").html(res);
              $("span[name='likecount'").html(res);

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
        }

   

    
function listComments()
        {
      var ideaID1=<?php     echo $ideaID;  ?>;
        
            $.ajax({
            
                 type: "GET",
                url: "Listcomment.php",
                data: {
                          
                        ideaID:<?php    echo $ideaID;?>

                },
                cache: false,
                success: function(res) {
                
            $('#comments').html(res);

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
        }
           $(document).ready(function() {


              Count();
     var cout=null;  
  cout= setInterval(Count,2500);
 


       
       listComments();
           });
        
        
        

</script>
                <div id="comments">
              
    
                    <div class="media mb-3">
                        <div class="media-body border p-2 rounded">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="pt-2">Anonymous <small class="font-weight-normal text-muted">• Feb 9, 2022</small></h6>
                                </div>
                               
                            </div>
                            <p style="font-size:14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus non, eaque dolores rem accusantium asperiores laborum nisi harum debitis? Non in, neque animi nesciunt saepe architecto! Placeat, facilis necessitatibus? Beatae!</p>
                        </div>
                    </div>
                </div>

                <br><br>

            </div>

            
        </div>

        <!-- Likes, dislikes, ments, view for mboile -->
        <div class="fixed-bottom d-block d-md-none d-sm-block ">
            <div class="bg-white border-top p-1" style="box-shadow: 0 -1px 5px rgb(0 0 0 / 20%);">
                <div class="row">
                    <div class="col-3">
                        <button id="post-like-btn" name="btnlike">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </button>
                        <span  name="likecount"style="font-size:15px;" class="text-secondary">0</span>
                    </div>
                    <div class="col-3">
                        <button id="post-dislike-btn" name="btndislike">
                            <i class="fa-solid fa-thumbs-down"></i>
                        </button>
                        <span name="dislikecount"style="font-size:15px;" class="text-secondary">0</span>
                    </div>
                    <div class="col-3">
                        <a href="#comments" id="post-comments-count">
                            <i class="fa-solid fa-comments" style="font-size: 19px;"></i>
                        </a>
                        <span name="cmtcount" style="font-size:15px;" class="text-secondary">2</span>
                    </div>
                    <div class="col-3">
                        <button disabled="disabled" id="post-view-count">
                            <i class="fa-solid fa-eye text-secondary"></i>
                        </button>
                        <span name="viewcount" style="font-size:15px;" class="text-secondary">0</span>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal for edit comment -->


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<!--footer section-->
<style type="text/css">
  
  
</style>
<footer class="bg-light p-3 fixed-bottom" style="color:#DBE2EF">
  <div class="container ">
    <div class="row">
      <div class="col-lg-4"><a href="index.php" style="text-decoration: none; color: grey;">&copy; All rights reserved 2022-2023</a></div>
      <div class="col-lg-4"><a href="index.php" style="text-decoration: none; color: grey;">By Team Technoholics</a></div>
      <div class="col-lg-4"><a href="index.php" style="text-decoration: none; color: grey;">Improve with your ideas</a></div>
    </div> 
  </div>
</footer>

</body>
</html>





