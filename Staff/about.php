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

 // loginSess= setInterval(auto_check_login,5000);

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
      <li class="nav-item">
        <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newfeed.php?Page=1&search=&filter=None&category=ALL">Ideas</a>
      </li>
      <li class="nav-item active">
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
<br><br>
    <!--jumbotron content-->
    <div class="container justify-content-md-center">
    <p class="lead text-justify">
    UniTec  is the public sciences and research university which mainly target the computing sectors. UniTec is one of the oldest university in Myanmar’s modern education system and located in the Hlaing, Yangon.  The university was placed under the Ministry of Science and Technology since 2002. The university offers wide variety of diplomas and degrees for undergraduate level, post-graduate level and doctoral level of education. Among these courses, the main subject areas of the university are software engineering degree, business information system degree, networking and cybersecurity degree. Like other universities, UniTec delivered all the programmes through physical classrooms since opening day. Due to COVID 19 crisis, UniTec has to temporarily shut down both classrooms and staff departments and go online only. The quality assurance manager of the university usually collects thoughts from each department in-person for the university improvement process. Because of the COVID 19 crisis, in-person method is not working anymore and the university decided to build a web-based management system for doing the ideas gathering process online. The system will be developed under the structure of agile software development life cycle which includes short sprints to deliver product in the shortest of time. In this project, multiple tools such as UML diagrams will be used to produce the artefacts for the web application. The web application will be built mostly in popular web programming language called JavaScript for both client side and server side rendering.
    <br>
    <i class="lead text-justify">
    <h1 class="bold">Terms and conditions</h1><br>

We may use some of your personal information through submission forms. Before using our site, you must accept these terms. If you don’t agree to these terms, you must not use our site.
<br>
1.  Content which must be do not defames or threatens others <br>
2.  Prohibit Harassing statements or violates federal <br>
3.  Prohibit a content which included discussion of illegal activities with the intent to commit them <br>
4.  Contact which must be do not include another’s intellectual property, including, but not limited to, copyrights, trademarks or trade secret <br>
5.  Material which must be do not contains obscene (i.e. pornographic) language or images <br>
6.  Prohibit advertising or commercial solicitation <br>
7.  Content which must not be otherwise unlawful <br>
    </i>
  
  </div>

    

    

  </div><br>

<?php include("staff-footer.php"); ?>


