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
              <a href="charts.php" class="nav-link px-3">
                <span class="me-2">
                  <i class="fa-solid fa-chart-line"></i>
                </span>
                Charts
              </a>
            </li>
            <li>
              <a href="tables.php" class="nav-link px-3 text-primary">
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
          <p class="col-md-12 fw-bold fs-4">
            Selection of Charts and Graphs in the system
          </p>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Number of Staff Per Department</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>Department Name</th>
               
                        <th>Staff Amount</th>

                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                         $dpt="SELECT * FROM department order by departmentID";
                          $resdpt = mysqli_query($Connect, $dpt);
                            if (mysqli_num_rows($resdpt) > 0) {
                              while($arrdpt = mysqli_fetch_array($resdpt)){
                                $dpid=$arrdpt['departmentID'];
                                $usercount=0;
                         $user="SELECT * FROM users where departmentID='$dpid' ";
                          $resuser = mysqli_query($Connect, $user);
                            if (mysqli_num_rows($resuser) > 0) {
                              while($arruser = mysqli_fetch_array($resuser)){
                                $usercount++;
                              }
                            }


                       ?>
                      <tr>
                        <td><?php  echo $arrdpt['departmentName']; ?></td>
                        <td><?php  echo $usercount; ?></td>
                      
                      </tr>
                      <?php }} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-5">
          <hr class="dropdown-divider" />
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Previous Years' Closure Dates</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>Academic Year</th>
                        <th>Initial Closure Date</th>
                        <th>Final Closure Date</th>
                        <th>Number of Ideas</th>
                        
                      </tr>
                    </thead>
                    <tbody>
               
                        <?php 


                         $acd="SELECT * FROM academic order by academicID";
      $resacd = mysqli_query($Connect, $acd);
        if (mysqli_num_rows($resacd) > 0) {
          while($arracd = mysqli_fetch_array($resacd)){
           ?>
                   <tr>
                        <td><?php  echo $arracd['startDate'].' to '.$arracd['finalclosureDate']; ?></td>
                        <td><?php  echo $arracd['startDate']; ?></td>
                        <td><?php  echo $arracd['closureDate']; ?></td>
                        <td><?php  echo $arracd['finalclosureDate']; ?></td>
                     
                      </tr>
                  <?php  } };?>
                    </tbody>
                    <tfoot></tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="my-5">
          <hr class="dropdown-divider" />
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Ideas Count Per Category</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                            <th>Category</th>
                          <th>Ideas Assigned</th>
                          <th>Total Comments</th>
                          <th>Total Reactions</th>
                          <th>Total viewed</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
 $cat="SELECT * FROM categories order by categoryID";
      $resucat = mysqli_query($Connect, $cat);
        if (mysqli_num_rows($resucat) > 0) {
          while($arr1 = mysqli_fetch_array($resucat)){
             $noidea=0;
             $cmtcount=0;
             $reactcount=0;
             $viewcount=0;
           $catID=$arr1['categoryID'];
             
   $ideas = "SELECT * FROM ideas where categoryID='$catID'  ";


      $residea = mysqli_query($Connect, $ideas);
        if (mysqli_num_rows($residea) > 0) {
  
  
      $no1=mysqli_num_rows($residea) ;
           while($arr2 = mysqli_fetch_array($residea)){
        $cmtcount+=$arr2['commentCount'];
      $reactcount+=$arr2['likeCount']+$arr2['dislikeCount'];
      $viewcount=$arr2['viewCount'];
}
        
      $noidea+=$no1;
    
   

  }
  else
  {
  }






                         ?>
                        <tr>
                          <td><?php echo $arr1['categoryName']; ?></td>
                          <td><?php echo  $noidea; ?></td>
                          <td><?php echo  $cmtcount; ?></td>
                          <td><?php echo  $reactcount; ?></td>
                          <td><?php echo  $viewcount; ?></td>

                        </tr>
                     <?php   
 
  }
} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="my-5">
          <hr class="dropdown-divider" />
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
  </body>
</html>
