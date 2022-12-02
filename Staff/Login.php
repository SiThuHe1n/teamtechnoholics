<?php
	include('connect.php');
	session_start();
	if(isset($_SESSION["Login_Session"]))
	{
		if($_SESSION["userRoleID"]==3)
		{
			header("location: Staff/Home.php");
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
	<title></title>
</head>
<body>
    
	<form action="Login.php" method="POST">

	<div id="login" align="center">	
	<h1> Team Technoholics</h1>
	</br>
<h3> User Name</h3>
<input type="Username" name="Email" id="Email">
<h3>Password</h3>
<input type="Password" name="Password" id="Password">
<br>	
</br>
		<input type="submit" name="btnlogin" value="Sign In"/>

	</div>

		</form>

</body>
</html>