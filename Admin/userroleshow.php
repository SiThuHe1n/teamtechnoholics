<?php 



   include 'connect.php';
          $role="SELECT * FROM userrole ";
          $resurole= mysqli_query($Connect, $role);
          $num=0;
          if (mysqli_num_rows($resurole) > 0) {
          while($arr1 = mysqli_fetch_array($resurole)){
                    $num++;
                   echo'
                    <tr>
                     
                      <td>'.$num.'</td>
                      <td>'.$arr1['userRoleName'].'</td>
                  
                      <td>'.$arr1['userRoleDescription'].'</td>
                  
                    
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editModal'.$arr1['userRoleID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userRoleID'].'"
                        >
                          Delete
                        </button>
                      
                      </td>
                    </tr>
                     ';




}
}

 ?>