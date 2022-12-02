<?php 
include 'connect.php';
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==2)
{

include 'connect.php';
$userID=$_SESSION['UserID'];
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


  
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
    <title>QA Coordinator Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css' integrity='sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css'/>
    <style>

        #coorTabs .nav-pills .nav-link.active, .nav-pills .show > .nav-link
        {
            color: white;
            background-image: linear-gradient(to right, #595e64, #43484b, #303841);
        }

        #coorTabs a {
            color: #303841;
        }
        #nav_divider{
    width:100%;
    border-top:0.05px solid #FF5722;
}
.orange-btn-outline{
    border:0.05px solid #FF5722;
    color:#FF5722;
}
.orange-btn-filled{
    background-color:#FF5722;
    color:#FFF;
}
.blue-btn-filled{
    background-color:#3F72AF;
    color:#FFF;
}
.nav-bottom{
    border-bottom: 1px solid #3F72AF;
}
.page-header{
    text-align: center;
}
.mynav{
    position:sticky;
    top:0;
    background-color:#FFF;
    z-index:5;
}


    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand" href="#">UniTec</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="Qac.php?category=ALL&search=">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-12 mx-auto">
                <div class="row mx-1 mb-4 border-bottom pb-2 border-secondary">
                    <div class="col-xs-8">
                        <h3 class="page-header"><?php     $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $dep="SELECT * FROM department WHERE departmentID='$dpid'";
                                          $resu2 = mysqli_query($Connect, $dep);
                                    if (mysqli_num_rows($resu2) > 0) {
                                        $arr2 = mysqli_fetch_array($resu2); 
                                        echo $arr2['departmentName']; 
                                        }
                                    }
                                         ?></h3>
                    </div>
                    <div class="col-xs-4 ml-auto">
                        <div id="coorTabs">
                            <ul class="nav nav-pills mb-2 rounded-pill border shadow-sm" id="coordinatorTabs" style="background-color: #f0f0f0a8;" role="tablist">
                             
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link rounded-pill  active px-3 py-2" id="departmentIdeas-tab" data-toggle="pill" href="#departmentIdeas" role="tab" aria-controls="departmentIdeas" aria-selected="true">Department Ideas</a>
                                </li>
                                   <li class="nav-item" role="presentation">
                                    <a class="nav-link rounded-pill px-3 py-2" id="staffList-tab" data-toggle="pill" href="#staffList" role="tab" aria-controls="pills-home" aria-selected="false">Department Staffs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade " id="staffList" role="tabpanel" aria-labelledby="staffList-tab">
                    <div class="card rounded-0">
                        <div class="card-header p-2 mb-3">
                            <h5 class="card-title">Staff's <small style="font-size:15px;">table</small></h5>
                        </div>
                        <div class="card-body">


                           

                            <table class="table table-responsive-sm table-borderless table-hover text-center">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        <th>Submitted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                             

                                   $num=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid' AND userRoleID=3 ";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                                   $submitted=0;
                                                   $unsubmitted=0;
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                         
                                                            $submitted++;

                                                          

                                                      }
                                                      else
                                                      {
                                                        $unsubmitted++;
                                                      }
                                                      $num++;
                                                      echo 
                                                      '
                                                      <tr>
                                                      <td> '.$num.'</td>
                                                      <td> '.$arr2['userName'].'</td>
                                                      <td> '.$arr2['userEmail'].'</td>
                                                      <td> '.$arr2['userPhoneNumber'].'</td>

                                                      <td> Staff</td>
                                                   ';
                                                 if($submitted>0)
                                                 {
                                                    echo ' <td> <button type="button" class="btn btn-success px-2 py-1">
                                                True
                                            </button> </td>
                                                   <td>


                                               <button class="btn btn-sm btn-outline-warning"> Notify </button>
                               
                                            </td>


                                            ';
                                                 }
                                                 elseif($unsubmitted>0)
                                                 {
                                                    echo ' <td> <button type="button" class="btn btn-danger p-1">
                                                False
                                            </button> </td>
                                                   <td>
                                                   <form action="mail.php" method="POST"> <button class="btn btn-sm btn-outline-warning">Notify </button>
                                                    <input type="text" name="Email" value="'.$arr2['userEmail'].'" hidden readonly>
                                                   </form>
                                   
                                            </td>



                                            ';
                                                 }
                                                   echo'
                                               


                                                      </tr>




                                                      ';


                                                  }
                                              }
                                          }
                                      
                                  



                                    ?>
                                  
                                </tbody>
                            </table>

                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade show active" id="departmentIdeas" role="tabpanel" aria-labelledby="departmentIdeas-tab">
                    <div class="card rounded-0">
                        <div class="card-header p-2">
                            <h5 class="card-title">Ideas <small style="font-size:15px;">table</small></h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-8">
                                    <div>
                                        <canvas id="barChart" height="300"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <canvas id="submittedRate" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                           <div class="container mt-2">

       
              <form  action="Qac.php" method="GET">

                 <div class="form-group row mx-auto">
                                   
                                      <div class="col-md-7 mb-2">
                                        <div class="form-inline">
                                            <label for="userFilter">Filter by Category : &nbsp;</label>
                                            <div class="input-group">
                                                <select class="form-control rounded-0 form-control-sm" name="category">
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
                                    echo " 0";
                                }
                                    


                                 ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-sm btn-outline-dark rounded-0 px-1" type="submit">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="col-md-1"></div>
                                      <div class="col-md-4 mb-2">
                                            <div class="input-group">
                                            <input type="text" name="search" class="form-control form-control-sm rounded-0 p-2 py-3" placeholder="Search . . ." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-outline-dark rounded-0 px-1" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>

  
          
            
                </form>
          

                            <table class="table table-responsive-sm table-borderless table-hover text-center">
                                <thead class="">
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                  $category=$_GET['category'];
                                  $search=$_GET['search'];
                                  if($category=="ALL" && $search=="" )
                                  {
                                       $num=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid'";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                          while($arr3 = mysqli_fetch_array($resu2))
                                                          {
                                                            $catid=$arr3['categoryID'];

                                                              $cat="SELECT * FROM categories WHERE categoryID='$catid'";
                                                              $resu3 = mysqli_query($Connect, $cat);
                                                                if (mysqli_num_rows($resu3) > 0) {
                                                                    $arr4 = mysqli_fetch_array($resu3);
                                                                }
                                                            $num++;
                                                            echo '<tr>  

                                                                <td>'.$num.'</td>
                                                                <td>'.$arr3['ideaTitle'].'</td>
                                                                <td>'.$arr3['ideaContent'].'</td>
                                                                <td>'.$arr3['ideaDate'].'</td>
                                                                <td>'.$uname.'</td>
                                                                <td>'.$arr4['categoryName'].'</td>
    <td><a class="btn btn-sm btn-outline-warning" href="post.php?ideaID='.$arr3['ideaID'].'">View</a></td>











                                                               <tr>';
                                                          }
                                                 }
                                        }
                                    }
                                }
                                  }
                                    elseif($category=="ALL" && $search!="" )
                                    {
   $num=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid'";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid' AND ideaTitle like '%%%$search%%%'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                          while($arr3 = mysqli_fetch_array($resu2))
                                                          {
                                                            $catid=$arr3['categoryID'];

                                                              $cat="SELECT * FROM categories WHERE categoryID='$catid'";
                                                              $resu3 = mysqli_query($Connect, $cat);
                                                                if (mysqli_num_rows($resu3) > 0) {
                                                                    $arr4 = mysqli_fetch_array($resu3);
                                                                }
                                                            $num++;
                                                            echo '<tr>  

                                                                <td>'.$num.'</td>
                                                                <td>'.$arr3['ideaTitle'].'</td>
                                                                <td>'.$arr3['ideaContent'].'</td>
                                                                <td>'.$arr3['ideaDate'].'</td>
                                                                <td>'.$uname.'</td>
                                                                <td>'.$arr4['categoryName'].'</td>
    <td><a class="btn btn-sm btn-outline-warning" href="post.php?ideaID='.$arr3['ideaID'].'">View</a></td>











                                                               <tr>';
                                                          }
                                                 }
                                        }
                                    }
                                }
                                    }
                                      elseif($category!="ALL" && $search=="" )
                                    {
                                           $num=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid'";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid' AND categoryID='$category'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                          while($arr3 = mysqli_fetch_array($resu2))
                                                          {
                                                            $catid=$arr3['categoryID'];

                                                              $cat="SELECT * FROM categories WHERE categoryID='$catid'";
                                                              $resu3 = mysqli_query($Connect, $cat);
                                                                if (mysqli_num_rows($resu3) > 0) {
                                                                    $arr4 = mysqli_fetch_array($resu3);
                                                                }
                                                            $num++;
                                                            echo '<tr>  

                                                                <td>'.$num.'</td>
                                                                <td>'.$arr3['ideaTitle'].'</td>
                                                                <td>'.$arr3['ideaContent'].'</td>
                                                                <td>'.$arr3['ideaDate'].'</td>
                                                                <td>'.$uname.'</td>
                                                                <td>'.$arr4['categoryName'].'</td>
    <td><a class="btn btn-sm btn-outline-warning" href="post.php?ideaID='.$arr3['ideaID'].'">View</a></td>











                                                               <tr>';
                                                          }
                                                 }
                                        }
                                    }
                                }
                                    }
                                      elseif($category!="ALL" && $search!="" )
                                    {
                                           $num=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid'";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid' AND categoryID='$category' AND ideaTitle like '%%%$search%%%'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                          while($arr3 = mysqli_fetch_array($resu2))
                                                          {
                                                            $catid=$arr3['categoryID'];

                                                              $cat="SELECT * FROM categories WHERE categoryID='$catid'";
                                                              $resu3 = mysqli_query($Connect, $cat);
                                                                if (mysqli_num_rows($resu3) > 0) {
                                                                    $arr4 = mysqli_fetch_array($resu3);
                                                                }
                                                            $num++;
                                                            echo '<tr>  

                                                                <td>'.$num.'</td>
                                                                <td>'.$arr3['ideaTitle'].'</td>
                                                                <td>'.$arr3['ideaContent'].'</td>
                                                                <td>'.$arr3['ideaDate'].'</td>
                                                                <td>'.$uname.'</td>
                                                                <td>'.$arr4['categoryName'].'</td>
    <td><a class="btn btn-sm btn-outline-warning" href="post.php?ideaID='.$arr3['ideaID'].'">View</a></td>











                                                               <tr>';
                                                          }
                                                 }
                                        }
                                    }
                                }
                                    }

                               

                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
                
            </div>

        </div>
    </div>



    
    
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js' integrity='sha512-cEgdeh0IWe1pUYypx4mYPjDxGB/tyIORwjxzKrnoxcif2ZxI7fw81pZWV0lGnPWLrfIHGA7qc964MnRjyCYmEQ==' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/rrr9ywwcmgivj2altdsyamur2wt6sdp2g5r2x29uu63s33g9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js' integrity='sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==' crossorigin='anonymous'></script>
    <script>

//bar
var ctxB = document.getElementById("barChart").getContext('2d');
var myBarChart = new Chart(ctxB, {
  type: 'bar',
  data: {
    labels: ["Ideas", "Like", "Dislike","View" ,"Comment"],
    datasets: [{
      data: [<?php 

                                    $amount=0;
                                    $like=0;
                                    $dislike=0;
                                    $view=0;
                                    $comment=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid' AND userRoleID=3 ";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                                 
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                         
                                                         while($arr3 = mysqli_fetch_array($resu2))
                                                         {
                                                            $amount++;
                                                            $like+=$arr3['likeCount'];
                                                            $dislike+=$arr3['dislikeCount'];
                                                            $view+=$arr3['viewCount'];
                                                            $comment+=$arr3['commentCount'];
                                                         }
                                                          

                                                          

                                                      }
                                                      else
                                                      {
                                                      
                                                      }
                                                  


                                                  }
                                              }
                                          }
                                      echo $amount.','.$like.','.$dislike.','.$view.','.$comment;
                                  





         ?>],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'

      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
    
      ],
      borderWidth: 1
    }]
  },
  options: {

    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    maintainAspectRatio: false,
    plugins: {

    legend: {
      display: false
    },
  
        title: {
            display: true,
            text: 'Total Interaction',
        }
        }

    }
});



//pie
var ctxP = document.getElementById("submittedRate").getContext('2d');
  var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
      labels: ["Unsubmitteed", "Submitted"],
      datasets: [{
        data: [<?php 


                                    $submitted=0;
                                    $unsubmitted=0;
                                  $user="SELECT * FROM users WHERE userID='$userID'";
                                  $resu = mysqli_query($Connect, $user);
                                    if (mysqli_num_rows($resu) > 0) {
                                        $arr1 = mysqli_fetch_array($resu);
                                        $dpid=$arr1['departmentID'];
                                        $user1="SELECT * FROM users WHERE departmentID='$dpid' AND userRoleID=3 ";
                                  $resu1 = mysqli_query($Connect, $user1);
                                    if (mysqli_num_rows($resu1) > 0) {
                                        while($arr2 = mysqli_fetch_array($resu1))
                                        {
                                                 
                                            

                                            $usid=$arr2['userID'];
                                            $uname=$arr2['userName'];
                                            $idea="SELECT * FROM ideas where userID='$usid'";
                                             $resu2 = mysqli_query($Connect, $idea);
                                                 if (mysqli_num_rows($resu2) > 0) {
                                                         
                                                         while($arr3 = mysqli_fetch_array($resu2))
                                                         {
                                                              $submitted++;
                                                         }
                                                          

                                                          

                                                      }
                                                      else
                                                      {
                                                        $unsubmitted++;
                                                      }
                                                  


                                                  }
                                              }
                                          }
                                      echo $unsubmitted.','.$submitted;
                                  





         ?>],
        backgroundColor: ["#F7464A", "#46BFBD"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1"]
      }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Idea Submitted Rate Within Department',
            }
        }
    }
  });
    </script>
</body>
</html>