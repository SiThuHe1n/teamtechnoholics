<?php 


session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{

include 'connect.php';


}
else 
{
    header("Location: Logout.php");
}


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <style type="text/css">
.chartWrapper {/* w w w. j a v  a2 s.co  m*/
   position: relative;
}
.chartWrapper > canvas {
   position: absolute;
   left: 0;
   top: 0;
   pointer-events:none;
}
.chartAreaWrapper {

   overflow-x: scroll;
}

    </style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- navbar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light light-bg fixed-top">
      <div class="container-fluid">
        <!-- offcanvas button-->
        <button
          class="navbar-toggler me-2"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample"
        >
          <i class="fa-solid fa-align-left"></i>
        </button>
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#"
          >UniTec</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex ms-auto">
            <div class="input-group my-3 my-lg-0">
             
            </div>
          </form>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-circle"></i> Admin
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown"
              >
             
                <li>
                  <a class="dropdown-item" href="Logout.php">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- offcanvas sidebar-->

    <div
      class="offcanvas offcanvas-start sidebar-nav light-bg"
      tabindex="-1"
      id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-light">
          <ul class="navbar-nav">
            <li><div class="text-muted fw-bold small p-3">MAIN</div></li>
            <li>
              <a href="admin_dashboard.php" class="nav-link px-3 ">
                <span class="me-2">
                  <i class="fa-solid fa-gauge"></i>
                </span>
                Dashboard
              </a>
            </li>
            <li>
              <a href="Ideas.php" class="nav-link px-3">
                <span class="me-2">
                  <i class="fa-solid fa-lightbulb"></i>
                </span>
                Ideas
              </a>
            </li>
            <li>
              <a href="academic.php" class="nav-link px-3">
                <span class="me-2">
                  <i class="fa-solid fa-calendar-check"></i>
                </span>
                Academic Year
              </a>
            </li>

            <li>
              <a href="staff_manage.php" class="nav-link px-3">
                <span class="me-2">
                  <i class="fa-solid fa-user-group"></i>
                </span>
                Staff
              </a>
            </li>
                 <li>
              <a href="userrole.php" class="nav-link px-3 ">
                <span class="me-2">
                  <i class="fa-solid fa-user-group"></i>
                </span>
                UserRole
              </a>
            </li>
             <li>
              <a href="department.php" class="nav-link px-3 ">
                <span class="me-2">
                  <i class="fa-solid fa-user-group"></i>
                </span>
                Department
              </a>
            </li>


            <li class="my-3">
              <hr class="dropdown-divider" />
            </li>
            <li>
              <div class="text-muted fw-bold small px-3 py-2">ADD-ONS</div>
            </li>
            <li>
              <a href="charts.php" class="nav-link px-3 text-primary">
                <span class="me-2">
                  <i class="fa-solid fa-chart-line"></i>
                </span>
                Charts
              </a>
            </li>
            <li>
              <a href="tables.php" class="nav-link px-3">
                <span class="me-2"> <i class="fa-solid fa-table"></i> </span>
                Tables
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- main section -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <p class="col-md-12 fw-bold fs-4">Total Selection of Tables</p>
        </div>

        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="card">
              <div class="card-header">>Total Idea Count Per Department</div>
              <div class="card-body">
                   <div class="chartWrapper"> 
         <div class="chartAreaWrapper"> 
            <div class="chartAreaWrapper" id="chartAreaWrapper1"> 
               <canvas id="Chart1" height="100" width="300"></canvas> 
            </div> 
         </div> 
         <canvas id="axis1" height="300" width="0"></canvas> 
      </div> 
              </div>
            </div>
          </div>
          <li class="my-3">
            <hr class="dropdown-divider" />
          </li>
          <div class="row">
            <div class="col-md-12 mx-auto">
              <div class="card">
                <div class="card-header">Total Idea Count Per Category</div>
                <div class="card-body">
                      <div class="chartWrapper"> 
         <div class="chartAreaWrapper"> 
            <div class="chartAreaWrapper" id="chartAreaWrapper2"> 
               <canvas id="Chart2" height="100" width="300"></canvas> 
            </div> 
         </div> 
         <canvas id="axis2" height="300" width="0"></canvas> 
      </div> 
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="https://github.com/chartjs/Chart.js/releases/download/v2.6.0/Chart.min.js"></script> 
   

<script type="text/javascript">

      const charts = document.querySelectorAll("#chart1");
      const dep = [];
      <?php 
  $dep="SELECT * FROM department order by departmentID";
      $resudep = mysqli_query($Connect, $dep);
        if (mysqli_num_rows($resudep) > 0) {
          while($arr1 = mysqli_fetch_array($resudep)){
          echo 'dep.push("'.$arr1['departmentName'].'");'; }} ?>


    const charts2 = document.querySelectorAll("#myChart3");
    const cate = [];
 
     <?php   $cat="SELECT * FROM categories order by categoryID";
      $resucat = mysqli_query($Connect, $cat);
        if (mysqli_num_rows($resucat) > 0) {
          while($arr1 = mysqli_fetch_array($resucat)){
          
           echo 'cate.push("'.$arr1['categoryName'].'");'; }} ?>

      window.onload=function(){


function addData(numData, chart){
         for (var i = 0; i < numData; i++){
      
          var newwidth = $('#chartAreaWrapper1').width() +60;
          $('#chartAreaWrapper1').width(newwidth);
    }
}
function addData2(numData, chart){
      for (var i = 0; i < numData; i++){
      
          var newwidth1 = $('#chartAreaWrapper2').width() +60;
          $('#chartAreaWrapper2').width(newwidth1);
    }
}


$(function() {
  var Chartdata2 =  document.getElementById("Chart2").getContext("2d");
  var chartnew1 = new Chart(Chartdata2, {
    type: 'bar',
    data: {
      labels: dep,
      datasets: [
        {
          label: "# ",
          data: [  <?php   $dep="SELECT * FROM department order by departmentID";
      $resudep = mysqli_query($Connect, $dep);
        if (mysqli_num_rows($resudep) > 0) {
          while($arr1 = mysqli_fetch_array($resudep)){
             $noid=0;
           $depid=$arr1['departmentID']; 
              $user = "SELECT * FROM users where userRoleID=3 and departmentID='$depid' order by departmentID  ";


      $resusers = mysqli_query($Connect, $user);
        if (mysqli_num_rows($resusers) > 0) {
    while($arr2 = mysqli_fetch_array($resusers)){
  
      $usID=$arr2['userID'];
     


        $idea = "SELECT * FROM ideas where userID='$usID' ";
          $residea = mysqli_query($Connect, $idea);
           if (mysqli_num_rows($residea) > 0) {

      $arr3 =mysqli_num_rows($residea) ;
        $noid+=$arr3;
    }
    else
    {

    }

   

  }
   echo $noid.','; }}}?>],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
        
          ],
          borderWidth: 1,
        },
      ],
    },
    maintainAspectRatio: false,
    responsive: true,
    options: {

     
     
    legend: {
      display: false
    },
  
  
      scales: {
        xAxes: [{
          ticks: {
               callback: function(label) {
          if (/\s/.test(label)) {
            return label.split(" ");
          }else{
            return label;
          }              
        }
      
          }

        }],
        yAxes: [{
          ticks: {
            fontSize: 12,
            beginAtZero: true
          }
        }]
      },
      animation: {
     
             onComplete: function() {
          var sourceCanvas = chartnew1.chart.canvas;
          var copyWidth = chartnew1.scales['y-axis-0'].width - 10;
          var copyHeight = chartnew1.scales['y-axis-0'].height + chartnew.scales['y-axis-0'].top + 10;
          var targetCtx = document.getElementById("axis1").getContext("2d");
          targetCtx.canvas.width = copyWidth;
          targetCtx.drawImage(sourceCanvas, 0, 0, copyWidth, copyHeight, 0, 0, copyWidth, copyHeight);
        }
      }
    }
  });
  addData(9, chartnew1);
});

      $(function() {
  var Chartdata1 =  document.getElementById("Chart1").getContext("2d");
  var chartnew2 = new Chart(Chartdata1, {
    type: 'bar',
    data: {
      labels: cate,
      datasets: [
        {
          label: "# ",
          data: [  <?php  $cat="SELECT * FROM categories order by categoryID";
      $resucat = mysqli_query($Connect, $cat);
        if (mysqli_num_rows($resucat) > 0) {
          while($arr1 = mysqli_fetch_array($resucat)){
             $noidea=0;
           $catID=$arr1['categoryID'];
             
   $ideas = "SELECT * FROM ideas where categoryID='$catID'  ";


      $residea = mysqli_query($Connect, $ideas);
        if (mysqli_num_rows($residea) > 0) {

  
      $no1=mysqli_num_rows($residea) ;
      $noidea+=$no1;
   

  }
  else
  {
  }
   echo $noidea.",";
  }
}
 ?>],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
        
          ],
          borderWidth: 1,
        },
      ],
    },
    maintainAspectRatio: false,
    responsive: true,
    options: {

     
     
    legend: {
      display: false
    },
  
  
      scales: {
        xAxes: [{
          ticks: {
               callback: function(label) {
          if (/\s/.test(label)) {
            return label.split(" ");
          }else{
            return label;
          }              
        }
      
          }

        }],
        yAxes: [{
          ticks: {
            fontSize: 12,
            beginAtZero: true
          }
        }]
      },
      animation: {
     
             onComplete: function() {
          var sourceCanvas = chartnew2.chart.canvas;
          var copyWidth = chartnew2.scales['y-axis-0'].width - 10;
          var copyHeight = chartnew2.scales['y-axis-0'].height + chartnew2.scales['y-axis-0'].top + 10;
          var targetCtx = document.getElementById("axis2").getContext("2d");
          targetCtx.canvas.width = copyWidth;
          targetCtx.drawImage(sourceCanvas, 0, 0, copyWidth, copyHeight, 0, 0, copyWidth, copyHeight);
        }
      }
    }
  });
  addData2(9, chartnew2);
});

      




      



}
</script> 
  </body>
</html>
