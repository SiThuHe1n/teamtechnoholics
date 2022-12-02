<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==4)
{

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connect.php';


$Sort=$_POST['sort'];
$Search=$_POST['search'];

if($Sort=="Default" || $Search!="")
{
$query="SELECT * FROM users WHERE userName LIKE '%%%$Search%%%' ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Name" || $Search!="")
{
  
$query="SELECT * FROM users   WHERE userName LIKE '%%%$Search%%%' order by userName  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Asc" || $Search!="")
{
  
$query="SELECT * FROM users   WHERE userName LIKE '%%%$Search%%%' order by userID ASC   ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Desc" || $Search!="")
{
  
$query="SELECT * FROM users   WHERE userName LIKE '%%%$Search%%%' ORDER BY userID DESC  ";
$result=mysqli_query($Connect,$query);
$number=0;
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Default" || $Search="")
{
  $number=0;
$query="SELECT * FROM users ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Name" || $Search="")
{
  $number=0;
$query="SELECT * FROM users ORDER BY userName ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Asc" || $Search="")
{
  $number=0;
$query="SELECT * FROM users ORDER BY userID ASC ";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}
elseif($Sort=="Desc" || $Search="")
{
  $number=0;
$query="SELECT * FROM users ORDER BY userID DESC";
$result=mysqli_query($Connect,$query);
  if (mysqli_num_rows($result) > 0) {
  while($arr1 = mysqli_fetch_array($result)){
$urid=$arr1['userRoleID'];
$depid=$arr1['departmentID'];
$number++;
    $query2="SELECT * FROM userrole WHERE userRoleID='$urid' ";
$result2=mysqli_query($Connect,$query2);
$arr2 = mysqli_fetch_array($result2);

$query3="SELECT * FROM department WHERE departmentID='$depid' ";
$result3=mysqli_query($Connect,$query3);
$arr3 = mysqli_fetch_array($result3);

echo '   <tr>
                      <th scope="row">'.$number.'</th>
                      <td>'.$arr1['userName'].'</td>
                      <td>'.$arr1['userEmail'].'</td>
                      <td>'.$arr1['Password'].'</td>
                      <td>'.$arr1['dateofbirth'].'</td>
                      <td>'.$arr1['userPhoneNumber'].'</td>
                      <td>'.$arr1['userGender'].'</td>

                      <td>'.$arr2['userRoleName'].'</td>
                       <td>'.$arr3['departmentName'].'</td>
                      <td>
                        <button
                          class="btn btn-warning m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#editUserModal'.$arr1['userID'].'"
                        >
                          Edit
                        </button>
                        <button
                          class="btn btn-danger m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#deleteConfirmModal'.$arr1['userID'].'"
                        >
                          Delete
                        </button>
                        <button
                          class="btn btn-info m-1"
                          data-bs-toggle="modal"
                          data-bs-target="#resetPasswordModal'.$arr1['userID'].'"
                        >
                          Reset Acc
                        </button>
                      </td>
                    </tr>
                ';
  }
}
}









}
else 
{
    header("Location: Logout.php");
}






 ?>