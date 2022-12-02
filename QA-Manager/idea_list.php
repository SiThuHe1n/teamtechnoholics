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


    $pagenum=$_GET['Page'];
   
      date_default_timezone_set("Asia/Yangon");
  $date = date("Y-m-d");

 ?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="QA_Manager.css">
    <title>QA Manager | Ideas List</title>

    
</head>

  <body>

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
             <a class="nav-link active" aria-current="page" href="idea_list.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link " href="category.php">Category</a>
                    </li>

                </ul>
                  <a class="nav-link " href="Logout.php">Logout</a>

            </div>
        </div>
    </nav>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
         var csvFileDataall=[];
    </script>
    <!-- <div id ="nav_divider"></div> -->
    <div class="container mt-2">

        <div class="row">
              <form  action="idea_list.php" method="GET">
                <input type="text" name="Page" value="1" id="pagetop"  readonly hidden>
            <div class="col-md-6 col-sm-12 p-3 row" >
         <!--  Search Function-->
          <div class="col mt-3"><h5>Search :</h5></div>
                    <div class="col mt-3"><input type="text" name="search"class="form-control"></div>
                    <div class="col-md-3 mt-3"><button type="submit" class="btn blue-btn-filled  px-3">Search</button></div>
                
            </div>
            <div class="col-md-6 row">
               <!--  Filter Function-->
                <div class="col mt-3"><h5>Filter :</h5></div>
                    <select class="form-select col mt-3" name="filter">
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
                    <div class="col-md-2 mt-3"><button type="submit" class="btn blue-btn-filled  px-4">Filter</button></div>
                
            </div>
             <div class="col-md-6   row">
               <!--  Filter Function-->
                <div class="col mt-3"><h5>Search :</h5></div>
                    <select class="form-select col mt-3" name="category">
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
                    <div class="col-md-2 mt-3"><button type="submit" class="btn blue-btn-filled  px-4">Filter</button></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-4">
                <form class="row" action="csvdownload.php" method="POST">  <!--  Filter Function-->
                    <select class="form-select col mt-3" name="downloadacad">
                        <?php 
                         $acad1="SELECT * FROM academic";
                                $resultacad1=mysqli_query($Connect,$acad1);

                                if (mysqli_num_rows($resultacad1) > 0) {
                                      
                                      while($acadarr1 = mysqli_fetch_array($resultacad1)){
                                    echo '       <option value="'.$acadarr1['academicID'].'">'.$acadarr1['startDate'].' to '.$acadarr1['finalclosureDate'].'</option>';
                                }
                                }
                                else
                                {

                                }


                                     
                         ?>
                
                      </select>
                    <div class="col-md-2 mt-3"><button type="submit" class="btn blue-btn-filled  px-4">Download</button></div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>

                      

                        <?php 
                      
                     



                         ?>
       
                        <th scope="col">Idea ID</th>
                        <th scope="col">Idea Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Uploaded Date</th>
                        <th scope="col">Comment Count</th>
                        <th scope="col">Liked Count</th>
                        <th scope="col">Disliked Count</th>
                           <th scope="col">View Count</th>
                        <th scope="col">User Name</th>
                           <th scope="col">User's Department Name</th>
                        <th scope="col">Category</th>
                           <th scope="col">Academic</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


<?php 

if($pagenum)
{
$b=($_GET["Page"]*5)-5;


include 'Show.php';
$result = mysqli_query($Connect, $query);
if (mysqli_num_rows($result) > 0) {
     $rowcount=mysqli_num_rows($result);
 
            
    while($row = mysqli_fetch_array($result)){
        $arraydata=array();
        
               $usID=   $row['userID'];
             $acdID=$row['academicID'];
             $ctID=$row['categoryID'];
             
                  
    echo '
    <tr>
                      <th scope="row">'.$row['ideaID'].'</th>
                        <td>'.$row['ideaTitle'].'</td>
                        <td>'.substr($row['ideaContent'],0,50).'.........</td>
                        <td>'.$row['ideaDate'].'</td>
                        <td>'.$row['commentCount'].'</td>
                        <td>'.$row['likeCount'].'</td>
                        <td>'.$row['dislikeCount'].'</td>
                        <td>'.$row['viewCount'].'</td>
                      
                     
                        
                      
                    ';
                array_push($arraydata,$row['ideaID'],$row['ideaTitle'],$row['ideaContent'],$row['ideaDate'],$row['commentCount'],$row['likeCount'],$row['dislikeCount'],$row['viewCount']);
                 
                    $query2="SELECT * From users WHERE userID='$usID'";
                    $result2 = mysqli_query($Connect, $query2);
                    if (mysqli_num_rows($result2) > 0) {

                    $row2 = mysqli_fetch_array($result2);
                    echo '  <td>'.$row2['userName'].'</td>';
                              array_push($arraydata,$row2['userName']);
                    $dpid=$row2['departmentID'];
                    $query3="SELECT * From department WHERE departmentID='$dpid'";
                     $result3 = mysqli_query($Connect, $query3);
                    if (mysqli_num_rows($result3) > 0) {
                    $row3 = mysqli_fetch_array($result3);
                  
                 
                    echo ' <td>'.$row3['departmentName'].'</td>';
                       array_push($arraydata,$row3['departmentName']);

                      }
                      else
                      {
                               array_push($arraydata,"noData");
                 
                      }
                    }

                    else
                    {
                    array_push($arraydata,"noData");
                 
                    }
                     $query22="SELECT * From categories WHERE categoryID='$ctID'";
                    $result22 = mysqli_query($Connect, $query22);
                    if (mysqli_num_rows($result22) > 0) {
                      $row22 = mysqli_fetch_array($result22);

                             echo ' <td>'.$row22['categoryName'].'</td>';
                                 array_push($arraydata,$row22['categoryName']);
                    }
                    else
                    {
                             echo ' <td> no Category</td>';
                               array_push($arraydata,"noData");
                    }

                    $query21="SELECT * From academic WHERE academicID='$acdID'";
                    $result21 = mysqli_query($Connect, $query21);
                    if (mysqli_num_rows($result21) > 0) {

                    $row21 = mysqli_fetch_array($result21);

                    echo   '<td>'.$row21['startDate'].' to '.$row21['finalclosureDate'].'</td>';
                    $actext=$row21['startDate'].' to '.$row21['finalclosureDate'];
                      array_push($arraydata,$actext);
                }
                else
                {echo   '<td> No academic</td>';
              array_push($arraydata,"noData");

                }
                        echo '
                        <td>
                            <div class="dropdown">
                                <button class="btn orange-btn-filled dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> <!-- Idea Action-->
                                    <li><a class="dropdown-item" href="post.php?ideaID='.$row['ideaID'].'">View</a></li>
                                    <li><a class="dropdown-item" href="postDelete.php?ideaID='.$row['ideaID'].'">Delete</a></li>
                                    <form action="downloadcsveach.php" method="POST">
                                    <li><button class="dropdown-item" id="downloadcsv">Download Document</button></li>
                                    <input type="text" name="csveach" value="'.$row['ideaID'].'" readonly hidden >
                                    </form>
                                </ul>
                            </div>
                        </td>
                         </tr>
                                ';


?>

<script type="text/javascript">
    
      

    $(document).ready(function() {

      

        


    });

</script>

<?php
              
           
        }

       
} 
else
{

    echo"    <tr>
                 
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>

                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
                 <td>
                    No Data
                 </td>
             </tr> ";
}
}
 ?>



                  
                </tbody>
            </table>


        </div>
        <!--Pagination-->
       <form action="" method="GET">

                <nav >
                    <ul class="pagination justify-content-center border-0">
                      
                        <input type="text" name="Page" id="page" value="<?php echo $_GET['Page']; ?>"  readonly hidden>
                        <input type="text" name="category" value="<?php echo $_GET['category']; ?>" readonly hidden>
                        <input type="text" name="filter" value="<?php echo $_GET['filter']; ?>"  readonly hidden>
                        <input type="text" name="search" value="<?php echo $_GET['search']; ?>"  readonly hidden>
                     
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
                $('#pagetop').val(<?php  echo $b;  ?>);
 
    
            
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
                     $('#pagetop').val(<?php  echo $down;  ?>);
 
    
            
   });
                $("#pageup<?php  echo $up;  ?>").click(function() {
            
      
            $('#page').val(<?php  echo $up;  ?>);
                     $('#pagetop').val(<?php  echo $up;  ?>);
 
    
            
   });
            });
</script>
       <?php
}


 ?>
                   
                  
                  
                    </ul>
                </nav>
         
            </div>

                

            
</form>

          

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>

</html>