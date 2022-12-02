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
if(isset($_POST['csdate']) && isset($_POST['ccdate']) &&  isset($_POST['cfcdate'])  )
{
  $sdate=$_POST['csdate'];
  $cdate=$_POST['ccdate'];
  $fcdate=$_POST['cfcdate'];


$date = date("Y-m-d");
      $acad="SELECT * FROM academic ";
          $resuacad= mysqli_query($Connect, $acad);
          if (mysqli_num_rows($resuacad) > 0) {
            $arr2=mysqli_fetch_array($resuacad);
            if($sdate<$arr2['finalclosureDate'])
            {
 echo "<script>alert('StartDate must be higher than FinalclosureDate of last data ');</script>";
            }
elseif($sdate>=$cdate || $sdate>=$fcdate  )
  {
 echo "<script>alert('StartDate must be lower than ClosureDate/FinalclosureDate ');</script>";
  }

  elseif($cdate>=$fcdate  )
  {
 echo "<script>alert('ClosureDate must be lower than FinalclosureDate');</script>";
  }

  elseif($cdate<=$date || $fcdate<=$date  )
  {
 echo "<script>alert('ClosureDate/FinalclosureDate must be higher than Today');</script>";
  }

  elseif($sdate<$cdate && $sdate<$fcdate && $cdate<$fcdate && $cdate>$date  && $fcdate>$date   )
  {

    $insert="INSERT INTO academic (startDate,closureDate,finalclosureDate) VALUES ('$sdate','$cdate','$fcdate')";
    $result=mysqli_query($Connect,$insert);
    if($result)
    {
    echo "<script>alert('Succ');</script>";
    }
    else
    {
      echo "<script>alert('Errr');</script>";
    }
  }
 
   else
    {
      echo "<script>alert('Errr');</script>";
    }
            }
            else
            {
              if($sdate>=$cdate || $sdate>=$fcdate  )
  {
 echo "<script>alert('StartDate must be lower than ClosureDate/FinalclosureDate ');</script>";
  }

  elseif($cdate>=$fcdate  )
  {
 echo "<script>alert('ClosureDate must be lower than FinalclosureDate');</script>";
  }

  elseif($cdate<=$date || $fcdate<=$date  )
  {
 echo "<script>alert('ClosureDate/FinalclosureDate must be greater than Today');</script>";
  }

  elseif($sdate<$cdate && $sdate<$fcdate && $cdate<$fcdate && $cdate>$date  && $fcdate>$date   )
  {

    $insert="INSERT INTO academic (startDate,closureDate,finalclosureDate) VALUES ('$sdate','$cdate','$fcdate')";
    $result=mysqli_query($Connect,$insert);
    if($result)
    {
    echo "<script>alert('Succ');</script>";
    }
    else
    {
      echo "<script>alert('Errr');</script>";
    }
  }
 
   else
    {
      echo "<script>alert('Errr');</script>";
    }
            }
  

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
 
            <div class="input-group my-3 my-lg-0">
          
         
            </div>
   
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
              <a href="academic.php" class="nav-link px-3 text-primary">
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
              <a href="tables.php" class="nav-link px-3">
                <span class="me-2"> <i class="fa-solid fa-table"></i> </span>
                Tables
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!--Main Section-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col mx-3">
            <div class="row mb-2 pb-3">
              <div class="col-xs-8">
                <h2 class="h3 page-header">Academic Year</h2>
              </div>
            </div>
            <hr class="dropdown-divider" />
            <div class="card rounded-0 mt-3">
              <div class="card-header p-2 mb-3">
                <h5 class="card-title font-weight-bold"> All Academic Year</h5>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-group row mx-auto">
            
                 
        
                    <div class="col-md-3 mt-2">
                      <button
                        type="button"
                        class="btn mt-3 btn-sm blue-bg text-white rounded-0"
                        data-bs-toggle="modal"
                        data-bs-target="#createClosureModal"
                      >
                        + Add Academic Year
                      </button>
                    </div>
                  </div>
                </form>

                <table
                  class="table table-responsive table-striped data-table table-hover text-center"
                >
                  <thead class="">
                    <tr>
                      <th>Academic ID</th>
                      <th>Start Date</th>
                      <th>Closure Date</th>
                      <th>Finalclosure Date.</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody id='tbo'>
                 
                  <div id=tbo2></div>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Create user Modal -->
    <div
      class="modal fade"
      id="createClosureModal"
      tabindex="-1"
      aria-labelledby="createUserModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header py-0 border-0">
            <h3
              class="modal-title mt-4 mx-auto font-weight-bold"
              id="createUserModalLabel"
            >
              <span style="font-size: 35px">C</span>reate
              <span style="font-size: 35px">A</span>cademic
            </h3>
          </div>

          <div class="modal-body">
            <form id="createUserForm" method="POST" action="academic.php">
              <div class="form-group mb-3">
   <?php 
          $aca="SELECT * FROM academic order by academicID desc limit 1 ";
          $resuaca= mysqli_query($Connect, $aca);
          if (mysqli_num_rows($resuaca) > 0) {
        
          $arr4 = mysqli_fetch_array($resuaca);

                 
                echo '   <label for="csdate">Start Date:</label>
                <input
                  type="date"
                  name="csdate"
                  id="csdate"
                  class="form-control"
                  value="'.$arr4['finalclosureDate'].'" required />';
            
                 }
                else
                {
                    echo '   <label for="csdate">Start Date:</label>
                <input
                  type="date"
                  name="csdate"
                  class="form-control"
                  value="'.date("Y-m-d").'" required />';
                } ?>
                 
                
               
              </div>
              <div class="form-group mb-3">
                <label for="ccdate">Closure Date:</label>
                <input
                  type="date"
                  name="ccdate"
                   id="ccdate"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group mb-3">
                <label for="cfcdate">Final Closure Date:</label>
                <input
                  type="date"
                  name="cfcdate"
                   id="cfcdate"
                  class="form-control"
                  required
                />
              </div>

             
              
           

              <div style="overflow: auto" class="m-3">
                <button
                  type="button"
                  class="btn grey-bg"
                  style="float: left"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Close
                </button>
                <button
                  type="submit"
                  class="btn btn-primary"
                  style="float: right"
                >
                  Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

 


    <!-- Edit User Modal -->
         <?php 
          $aca="SELECT * FROM academic ";
          $resuaca= mysqli_query($Connect, $aca);
          if (mysqli_num_rows($resuaca) > 0) {
          while($arr1 = mysqli_fetch_array($resuaca)){

                     ?>
    <div
      class="modal fade"
      id="editClosureModal<?php echo $arr1['academicID']; ?>"
      tabindex="-1"
      aria-labelledby="editClosureModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header py-0 border-0">
            <h3
              class="modal-title mt-4 mx-auto font-weight-bold border-bottom border-secondary"
              id="editUserModalLabel"
            >
              Edit Closure Date
            </h3>
          </div>

          <div class="modal-body">
          
              <div class="form-group mb-3">
                <label class="control-label">Start Date:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="date"
                  name="esdate"
                  id="esdate<?php echo $arr1['academicID']; ?>"
                  value="<?php echo $arr1['startDate']; ?>"
                />
              </div>

              <div class="form-group mb-3">
                <label class="control-label">Closure Date:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="date"
                  name="ecdate"
                     id="ecdate<?php echo $arr1['academicID']; ?>"
                  value="<?php echo $arr1['closureDate']; ?>"
                />
              </div>

              <div class="form-group mb-3">
                <label class="control-label">Final Closure Date:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="date"
                  name="efcdate"
                     id="efcdate<?php echo $arr1['academicID']; ?>"
                  value="<?php echo $arr1['finalclosureDate']; ?>"
                />
              </div>

              <div class="mt-4 text-center">
                <button
                  type="button"
                  class="btn btn-primary btn btn-sm rounded-0 mr-3 px-4"
                  data-bs-dismiss="modal"
                >
                  Back
                </button>
                <button   data-bs-dismiss="modal" id="Update<?php echo $arr1['academicID']; ?>" class="btn btn-dark btn btn-sm rounded-0">
                  Update Data
                </button>
              </div>
       
          </div>
        </div>
      </div>
    </div>
          



    <!-- DELETE CONFRIM MODAL -->
    <div
      class="modal fade"
      id="deleteConfirmModal<?php echo $arr1['academicID']; ?>"
      tabindex="-1"
      aria-labelledby="deleteConfirmModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body">
            <br />
            <h4 class="text-center border-bottom border-dark pb-2">
              Delete user
            </h4>
            <p class="text-center mb-3 border-bottom border-dark py-4">
              Are you sure you want to delete this user?
              <span class="text-danger"
                >You cannot get this user account back once you have
                deleted.</span
              >
            </p>
            <div class="mx-auto text-center">
              <button
                type="button"
                class="btn btn-secondary mr-2"
                data-bs-dismiss="modal"
              >
                Cancel
              </button>
                 <button
              id="Delete<?php echo $arr1['academicID']; ?>"
               class="btn btn-danger"
               data-bs-dismiss="modal"
               
              >
                Delete
              </button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
     <script type="text/javascript">
        function Show()
        {
        
     
         
            $.ajax({

            
                 type: "GET",
                url: "academicshow.php",
                data: {
                          
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#tbo').html(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
              $.ajax({

            
                 type: "POST",
                url: "refreshdelete.php",
                data: {
                          
                       
                      

                },
                cache: false,
                success: function(res) {
                     $('#csdate').val(res);
         

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error1");
                }

            });
          }
$(document).ready(function(){
  Show();
  $("#Delete<?php echo $arr1['academicID']; ?>").click(function() {
                var academicID=<?php echo $arr1['academicID']; ?>;
               

            $.ajax({
                type: "POST",
                url: "academicDelete.php",
                data: {
                        
                        academicID:academicID
                        
                },
                cache: false,
                success: function(data) {
                   Show();
                
                
        
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             
        });
  $("#Update<?php echo $arr1['academicID']; ?>").click(function() {
                var academicID=<?php echo $arr1['academicID']; ?>;
                var esdate=$('#esdate<?php echo $arr1['academicID']; ?>').val();
                var ecdate=$('#ecdate<?php echo $arr1['academicID']; ?>').val();
                var efcdate=$('#efcdate<?php echo $arr1['academicID']; ?>').val();
                
               

            $.ajax({
                type: "POST",
                url: "academicUpdate.php",
                data: {
                        
                        academicID:academicID,
                        esdate:esdate,
                        ecdate:ecdate,
                        efcdate:efcdate
                        
                },
                cache: false,
                success: function(data) {
                   Show();
                
                
        
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });
             
        });

})


   </script>
       <?php 






      
}}
                     ?>
  
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

  </body>
</html>
