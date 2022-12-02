<?php  
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==1)
{


include 'connect.php';
  date_default_timezone_set("Asia/Yangon");
if(isset($_POST['cname']) && isset($_POST['cdescription'])  )
{
  $cname=$_POST['cname'];
  $cdescription=$_POST['cdescription'];
  $query="INSERT INTO categories (categoryName,categoryDescription) VALUES ('$cname','$cdescription')";
  $result=mysqli_query($Connect,$query);
  if($result)
  {
echo "<script>alert('succ');</script>";
  }
  else
  {
    echo "<script>alert('fail');</script>";
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
    <title>QA Manager | Category</title>
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
    <link rel='stylesheet' href='QA_Manager.css'>
    <style>
        .addUserBtn{
            background-color: #3f72af;
            border-color:#356195;
        }
        .addUserBtn:hover{
            background-color: #356195;
            border-color:#2f5787;
        }
        .addUserBtn:after{
            background-color: #356195;
            border-color:#2f5787;
        }
    </style>
  </head>
  <body>
    <!-- navbar -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
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
                        <a class="nav-link " aria-current="page" href="idea_list.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link active" href="category.php">Category</a>
                    </li>

                </ul>
                       <a class="nav-link " href="Logout.php">Logout</a>
            </div>
        </div>
    </nav>


    <!-- offcanvas sidebar-->

    
    <!--Main Section-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col mx-3">
            <div class="row mb-2 pb-3">
              <div class="col-xs-8">
                <h2 class="h3 page-header">Ideas Category</h2>
              </div>
            </div>
            <hr class="dropdown-divider" />
            <div class="card rounded-0 mt-3">
              <div class="card-header p-2 mb-3">
                <h5 class="card-title font-weight-bold"> All Category</h5>
              </div>
              <div class="card-body">
                <form action="">
                  <div class="form-group row mx-auto">
            
                 
        
                    <div class="col-md-3 mt-2 px-0">
                      <button
                        type="button"
                        class="btn btn-sm py-2 btn-primary mb-3 addUserBtn"
                        data-bs-toggle="modal"
                        data-bs-target="#createModal"
                      >
                        + Add Category
                      </button>
                    </div>
                  </div>
                </form>

                <table
                  class="table table-responsive table-striped data-table table-hover text-center"
                >
                  <thead class="">
                    <tr>
                      <th>No.</th>
                      <th>Category Name</th>
                      <th>Category Description</th>
                  
                      <th>Action</th>
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

    <!-- Create category Modal -->
    <form action="category.php" method="POST">
    <div
      class="modal fade"
      id="createModal"
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
              <span style="font-size: 35px">A</span>dd
              <span style="font-size: 35px">C</span>ategory
            </h3>
          </div>

          <div class="modal-body">
         
              <div class="form-group mb-3">
 
                 
                
               
              </div>
              <div class="form-group mb-3">
                <label for="ccdate">Role Name:</label>
                <input
                  type="text"
                  name="cname"
                   id="cname"
                  class="form-control"
                  required
                />
              </div>
              <div class="form-group mb-3">
                <label for="cfcdate">Role Description :</label>
                <textarea
                  type="text"
                  name="cdescription"
                   id="cdescription"
                  class="form-control"
                  required
                  ></textarea>
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
     
          </div>
        </div>
      </div>
    </div>
</form>
 


    <!-- Edit Modal -->
         <?php 
          $que="SELECT * FROM categories ";
          $res= mysqli_query($Connect, $que);
          if (mysqli_num_rows($res) > 0) {
          while($arr1 = mysqli_fetch_array($res)){

                     ?>
    <div
      class="modal fade"
      id="editModal<?php echo $arr1['categoryID']; ?>"
      tabindex="-1"
      aria-labelledby="editModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header py-0 border-0">
            <h3
              class="modal-title mt-4 mx-auto font-weight-bold border-bottom border-secondary"
              id="editUserModalLabel"
            >
              Edit Category
            </h3>
          </div>

          <div class="modal-body">
          
              <div class="form-group mb-3">
                <label class="control-label"> Name:</label>
                <input
                  class="form-control pl-2 rounded-0"
                  type="text"
                  name="RoleName"
                  id="uName<?php echo $arr1['categoryID']; ?>"
                  value="<?php echo $arr1['categoryName']; ?>"
                />
              </div>

              <div class="form-group mb-3">
                <label class="control-label"> Description:</label>

                <textarea
                  class="form-control pl-2 rounded-0"
                  type="text"
                  name="roleDescription"
                     id="uDescription<?php echo $arr1['categoryID']; ?>"
                  value=""
                ><?php echo $arr1['categoryDescription']; ?></textarea>
              </div>

            
              <div class="mt-4 text-center">
                <button
                  type="button"
                  class="btn btn-primary btn btn-sm rounded-0 mr-3 px-4"
                  data-bs-dismiss="modal"
                >
                  Back
                </button>
                <button   data-bs-dismiss="modal" id="Update<?php echo $arr1['categoryID']; ?>" class="btn btn-dark btn btn-sm rounded-0">
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
      id="deleteConfirmModal<?php echo $arr1['categoryID']; ?>"
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
              id="Delete<?php echo $arr1['categoryID']; ?>"
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
                url: "cateshow.php",
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
            
          }
$(document).ready(function(){
  Show();
  $("#Delete<?php echo $arr1['categoryID']; ?>").click(function() {
                var id=<?php echo $arr1['categoryID']; ?>;
               

            $.ajax({
                type: "POST",
                url: "categorydelete.php",
                data: {
                        
                        id:id
                        
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
  $("#Update<?php echo $arr1['categoryID']; ?>").click(function() {
                var id=<?php echo $arr1['categoryID']; ?>;
                var name=$('#uName<?php echo $arr1['categoryID']; ?>').val();
                var des=$('#uDescription<?php echo $arr1['categoryID']; ?>').val();

                
               

            $.ajax({
                type: "POST",
                url: "categoryupdate.php",
                data: {
                        
                        id:id,
                        categoryName:name,
                        categoryDescription:des
                        
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
