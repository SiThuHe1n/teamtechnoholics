<?php 


	include('connect.php');
	session_start();
			 			

			$Newpass=$_POST['Newpass'];
	
			$UserID	=$_POST['userID'];

			$update="UPDATE users SET  Password='$Newpass'  WHERE userID='$UserID' ";
			$result=mysqli_query($Connect,$update);
			if ($result) {
				echo "<script>alert('Completed');</script>";
			}
			else{
				echo "<script>alert('error  ');</script>";
			}
		



 ?>