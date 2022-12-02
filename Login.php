<?php

	include('connect.php');
	session_start();
	if(isset($_SESSION["Login_Session"]))
	{
		if($_SESSION["userRoleID"]==3)
		{
			header("location: Staff/Home.php");
		}
		elseif($_SESSION["userRoleID"]==4)
		{
			header("location: Admin/admin_dashboard.php");
		}
			elseif($_SESSION["userRoleID"]==2)
		{
			header("location: QA-Coordinator/Qac.php?category=ALL&search=.php");
		}
			elseif($_SESSION["userRoleID"]==1)
		{
			header("location: QA-Manager/idea_list.php?Page=1&search=&filter=None&category=ALL");
		}



		else
		{
			header("location: Staff/Home.php");
		}
	}
	else{
			if (isset($_POST['btnlogin']))
				{
					$Email=$_POST['Email'];
					$Password=$_POST['Password'];
					$login="SELECT * FROM users WHERE userEmail='$Email' AND Password='$Password' ";
					$result=mysqli_query($Connect,$login);
					$row = mysqli_fetch_array($result);
					if($row>0)
					{
					
						$_SESSION["Login_Session"]=$row['userEmail'].$row['userID'].$row['userRoleID'];
						$_SESSION["userEmail"]=$row['userEmail'];
						$_SESSION["UserID"]=$row['userID'];
						$_SESSION["userRoleID"]=$row['userRoleID'];
					if ($_SESSION["userRoleID"]==3)
					{
								header("location: Staff/Home.php");
					}
					elseif ($_SESSION["userRoleID"]==4)
					{
								header("location: Admin/admin_dashboard.php");
					}
							elseif($_SESSION["userRoleID"]==2)
		{
			header("location: QA-Coordinator/Qac.php?category=ALL&search=");
		}
			elseif($_SESSION["userRoleID"]==1)
		{
			header("location: QA-Manager/idea_list.php?Page=1&search=&filter=None&category=ALL");
		}
					else 
					{
						header("location: Staff/Home.php");
					}



					

				
				

			        }
			        else
			        {
			        	echo "<script>alert('Email or Password is incorrect!');</script>";
			        }
				}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	   <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
        <div class="wrapper">
    <div class="logo"> <img src="logo.png" alt=""> </div>
    <div class="text-center name"> UniTec </div>

	<form action="Login.php" method="POST" >
  <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="Email" name="Email"  id="userName" placeholder="Email"> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input  name="Password" type="password" id="pwd" placeholder="Password"> </div> <button name='btnlogin' class="btn mt-3">Login</button>
	
		</form>
</div>
</body>
</html>