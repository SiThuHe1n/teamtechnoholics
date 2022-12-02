   <?php 
   

   include 'connect.php';
          $aca="SELECT * FROM academic ";
          $resuaca= mysqli_query($Connect, $aca);
          if (mysqli_num_rows($resuaca) > 0) {
          while($arr1 = mysqli_fetch_array($resuaca)){

                   echo'
                    <tr>
                     
                      <td>'.$arr1['academicID'].'</td>
                      <td>'.$arr1['startDate'].'</td>
                      <td>'.$arr1['closureDate'].'</td>
                      <td>'.$arr1['finalclosureDate'].'</td>
                  
                    
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editClosureModal'.$arr1['academicID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['academicID'].'"
                        >
                          Delete
                        </button>
                      
                      </td>
                    </tr>
                     ';




             }} 



?>