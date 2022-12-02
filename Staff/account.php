<?php 
session_start();
include 'connect.php';
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==3)
{


    $userID=$_SESSION['UserID'];



}
else 
{
    header("Location: Logout.php");
}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css' integrity='sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==' crossorigin='anonymous'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover.css'/>
    <style>
        *{
            color: #303841;
        }
        nav{
            background-color: #FAFAFA;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link
        {
            color: white;
            border-radius: 0%;
            background-color: #3F72AF;
        }
        a {
            color: #303841;
            text-decoration: none;
            background-color: transparent;
        }
        a:hover {
            color: #3F72AF;
        }
        

        .input-border{
            border-color: #3F72AF;
        }

        .tab-content {
            height: auto! Important;
        }
        
        
    </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    
var targetURL="../Login.php";

  function auto_check_login(){
    $.ajax({
      url: "Login_Session.php",
      cache: false,
      success: function(data){
       
          if(data != 1){
              window.location=targetURL; //Redirect user to login page.
          }
          else{
        
          }
      } 
    });
  }


 var loginSess=null;  

    $(document).ready(function(){

 //loginSess= setInterval(auto_check_login,5000);

     });

   




</script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light "> 
        <a class="navbar-brand py-2" href="">UniTec</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav ml-auto ">
             <li class="nav-item">
        <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item"">
        <a class="nav-link" href="newfeed.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="account.php">Account</a>
      </li>
      <li class="nav-item">
        <a href="Logout.php" class="btn btn-outline-success"> Log out</a>
      </li>
          </ul>
        </div>
      </nav>
      <?php 


                                $account="SELECT * From users where userID='$userID'  ";

                                $result = mysqli_query($Connect, $account);

                                if (mysqli_num_rows($result) > 0) {
                                   
                                    $acc = mysqli_fetch_array($result);


                             ?>
    <div class="container mt-4">

        <div class="row">

            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true" >Profile Information</a>
                    <a class="nav-link" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Security</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="col-lg-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="home-tab">
                            <h4 class="text-center pb-3 mb-4 head-orange">Personal Information</h4>

                            <div class="form-group">
                                <label class="control-label">Username:</label>
                                <div class="form-control pl-2 rounded-0 border-top-0 border-left-0 border-right-0 input-border"><?php echo $acc['userName']; ?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email:</label>
                                <div class="form-control pl-2 rounded-0 border-top-0 border-left-0 border-right-0 input-border"><?php echo $acc['userEmail']; ?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Phone number:</label>
                                <div class="form-control pl-2 rounded-0 border-top-0 border-left-0 border-right-0 input-border"><?php echo $acc['userPhoneNumber']; ?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Date Of Birth:</label>
                                <div class="form-control pl-2 rounded-0 border-top-0 border-left-0 border-right-0 input-border"><?php echo $acc['dateofbirth']; ?></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Gender:</label>
                                <div class="form-control pl-2 rounded-0 border-top-0 border-left-0 border-right-0 input-border"><?php echo $acc['userGender']; ?></div>
                            </div>

                            <div class="mt-4 text-center">
                                <a type="submit" class="btn btn-dark btn btn-sm rounded-0" style="background-color: #303841;" id="v-pills-editprofile-tab" data-toggle="pill" href="#v-pills-editprofile" role="tab" aria-controls="v-pills-editprofile" aria-selected="false">Edit Profile</a>
                            </div>
                            
                        </div>
                      
                        <div class="tab-pane fade show" id="v-pills-editprofile" role="tabpanel" aria-labelledby="v-pills-editprofile-tab">
                       
                                <h4 class="border-bottom border-secondary pb-3 mb-4">Edit Personal Information</h4>

                                <div class="form-group">
                                    <label class="control-label">Username:</label>
                                    <input id="userName" class="form-control pl-2 rounded-0" type="text" name="name" value="<?php echo $acc['userName']; ?>">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Email:</label>
                                    <input id="userEmail"  class="form-control pl-2 rounded-0" type="text" name="email" value="<?php echo $acc['userEmail']; ?>">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Phone number:</label>
                                    <input id="userPhone"  class="form-control pl-2 rounded-0" type="text" name="phone" value="<?php echo $acc['userPhoneNumber']; ?>">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Date Of Birth:</label>
                                    <input id="dateofbirth"  type="date" class="form-control pl-2 rounded-0" type="text" name="DOB" value="<?php echo $acc['dateofbirth']; ?>">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Gender:</label>
                                    <input id="gender"  class="form-control pl-2 rounded-0" type="text" name="fullname" value="<?php echo $acc['userGender'];?>">
                                </div>
                                
                                <div class="mt-4 text-center" >
                                    <a href="account.php" class="btn btn-primary btn btn-sm rounded-0 mr-3 px-4">Back</a>
                                    <button id="editprofile" type="submit" class="btn btn-dark btn btn-sm rounded-0">Update Profile Data</button>
                                </div>

                        </div>



<script type="text/javascript">
    
       $(document).ready(function() {

    



        $("#editprofile").click(function() {
            
        var userName = $('#userName').val();
        var userEmail = $('#userEmail').val();
        var userPhone = $( "#userPhone" ).val();
        var dateofbirth = $('#dateofbirth').val();
        var gender = $('#gender').val();
      
          var userID =<?php    echo $userID;  ?>;
      
       if (!$('#userName').val())
        {
                  alert('userName is empty!!');
             $("#userName").focus();
                $("#userName").attr("placeholder", "userName is Empty");
          
        }
       else if (!$('#userEmail').val())
            {
                  alert('userEmail is empty!!');
              $("#userEmail").focus();
                $("#userEmail").attr("placeholder", "userEmail is Empty");
              
      
 
       }
         else if (!$('#userPhone').val())
            {
                  alert('userPhone is empty!!');
              $("#userPhone").focus();
                $("#userPhone").attr("placeholder", "userPhone is Empty");
              
      
 
       }
    
      else if (!$('#dateofbirth').val())
            {
                  alert('dateofbirth is empty!!');
              $("#dateofbirth").focus();
     
              
      
 
       }
    
      else if (!$('#gender').val())
            {
                  alert('gender is empty!!');
              $("#gender").focus();
                $("#gender").attr("placeholder", "gender is Empty");
              
      
 
       }
    
    

       else if($('#userName').val() && $('#userEmail').val() && $('#dateofbirth').val() && $('#gender').val() && $('#userPhone').val()){
       
           $.ajax({
                type: "POST",
                url: "editprofile.php",
                data: {
                        userName:userName,
                        userEmail:userEmail,
                        dateofbirth:dateofbirth,
                        gender:gender,
                        userPhone:userPhone,
                        UserID:userID
                },
                cache: false,
                success: function(data) {


         alert("success");
        window.location.replace('account.php');
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });

       }

            
   });

        


   


        $("#changepass").click(function() {
            
        var newpass = $('#newpass').val();

          var userID = <?php    echo $userID;  ?>;
      
       if (!$('#oldpass').val())
        {
                  alert('Old Password is empty!!');
             $("#oldpass").focus();
                $("#oldpass").attr("placeholder", "Old Password  is Empty");
          
        }
       else if (!$('#newpass').val())
            {
                  alert('New Password is empty!!');
              $("#newpass").focus();
                $("#newpass").attr("placeholder", "New Password is Empty");
              
      
 
       }
       else if (!$('#newpass1').val())
            {
                  alert('Confirm Password is empty!!');
              $("#newpass1").focus();
                $("#newpass1").attr("placeholder", "Confirm Password is Empty");
              
      
 
       }
          else if ($('#newpass').val()!=$('#newpass1').val())
            {
                  alert('New Password must be same with Confirm Password!!');
                     $("#oldpass").focus();
            $('#oldpass').val('');
              $('#newpass').val('');
              $('#newpass1').val('');
              
      
 
       }

       else if ($('#oldpass').val()!=<?php echo $acc['Password']; ?>)
            {
                  alert('Old Password is wrong');
                    $("#oldpass").focus();
              $('#oldpass').val('');
              $('#newpass').val('');
              $('#newpass1').val('');
              
      
 
       }
    

       else if($('#oldpass').val() && $('#newpass').val() && $('#newpass1').val() && $('#oldpass').val()==<?php echo $acc['Password'] ?>){
       
           $.ajax({
                type: "POST",
                url: "changepass.php",
                data: {

                        Newpass:newpass,
                      
                        userID:userID
                },
                cache: false,
                success: function(data) {
               

         alert("success");
         window.location.replace('account.php');
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                        alert("error");
                }

            });

       }

            
   });

        


    });


 </script>




                        <?php 
                        }
                         ?>







    
                        <div class="tab-pane fade show" id="v-pills-security" role="tabpanel" aria-labelledby="home-tab">
                            
                            <h4 class="border-bottom border-secondary pb-3 mb-4">Security</h4>
                          

                                <label>Change Password</label>
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <input id="oldpass" class="form-control pl-2 rounded-0 mb-4 border" placeholder="Old password" name="oldpassword">
                                            <input id="newpass"class="form-control pl-2 rounded-0 mb-4 border" placeholder="New password" name="newpassword">
                                            <input id="newpass1"class="form-control pl-2 rounded-0 border" placeholder="Confirm password" name="confirmpw">
                                            
                                        </div>
                                        <small class="mt-2 text-muted">
                                            It's a good idea to use long password for stronger security.
                                        </small>
                                    </div>
                                </div>
                                <button id="changepass" class="btn btn-dark btn-sm rounded-0" style="background-color: #303841;" type="submit">Update password</button>

                           
                            
                        </div>
                    </div>
                </div>
            </div> 

        </div>

    </div>

<br><br><br><br>
        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/rrr9ywwcmgivj2altdsyamur2wt6sdp2g5r2x29uu63s33g9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#demo',
            skin: 'oxide-dark',
            height : 400
        });
    </script>

    <?php include("staff-footer.php"); ?>