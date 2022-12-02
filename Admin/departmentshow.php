   <?php 



   include 'connect.php';
          $dep="SELECT * FROM department ";
          $num=0;
          $resdep= mysqli_query($Connect, $dep);
          if (mysqli_num_rows($resdep) > 0) {
          while($arr1 = mysqli_fetch_array($resdep)){
              $num++;
    
                   echo'
                    <tr>
                     
                      <td>'.$num.'</td>
                      <td>'.$arr1['departmentName'].'</td>
                 
                      
                    
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editModal'.$arr1['departmentID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['departmentID'].'"
                        >
                          Delete
                        </button>
                      
                      </td>
                    </tr>
                     ';




             }}



 ?>