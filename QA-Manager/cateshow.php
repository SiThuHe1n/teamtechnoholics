<?php 
   session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==1)
{


   include 'connect.php';
          $query="SELECT * FROM categories ";
          $res= mysqli_query($Connect, $query);
          if (mysqli_num_rows($res) > 0) {
          while($arr1 = mysqli_fetch_array($res)){

                   echo'
                    <tr>
                     
                      <td>'.$arr1['categoryID'].'</td>
                      <td>'.$arr1['categoryName'].'</td>
                  
                      <td>'.$arr1['categoryDescription'].'</td>
                  
                    
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editModal'.$arr1['categoryID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['categoryID'].'"
                        >
                          Delete
                        </button>
                      
                      </td>
                    </tr>
                     ';




             }}


}
else 
{
    header("Location: Logout.php");
}

 ?>