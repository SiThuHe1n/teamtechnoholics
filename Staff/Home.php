<?php 
session_start();
if(!isset($_SESSION['Login_Session']))
{
header("Location: ../Login.php");
}
if($_SESSION['userRoleID']==3)
{




}
else 
{
    header("Location: Logout.php");
}



?>

<!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UniTec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="js/customerscript.js"></script>  

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
       
      } 
    });
  }


 var loginSess=null;  

    $(document).ready(function(){

 // loginSess= setInterval(auto_check_login,20000);

     });

   




</script>
<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light "> 
  <a class="navbar-brand py-2" href="">UniTec</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newfeed.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="account.php">Account</a>
      </li>
      <li class="nav-item">
        <a href="Logout.php" class="btn btn-outline-success"> Log out</a>
      </li>
    </ul>
  </div>
</nav>
    <!--jumbotron content-->
    <div class="container-fluid">
     <div class="jumbotron bg-white">
      <h1 class="display-3">Submit your ideas for UniTec</h1> <br>
      <p class="lead">UniTec is a growing IT univeristy in Myanmar.</p>
      <p class="lead">We link with many companies and services to offer the best experiences. We are always tring to give the best of the best of the best to our customers.</p><br>
      <p>Imporve the UniTec with your ideas, that's that easy.</p>
      <a class="btn btn-primary btn-lg bg-dark" href="newfeed.php?Page=1&search=&filter=None&category=ALL" role="button">Submit idea</a>
    </div>

  </div>

<?php include("staff-footer.php"); ?>


