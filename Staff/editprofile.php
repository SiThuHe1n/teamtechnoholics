<?php 


	include('connect.php');
	session_start();
			 			

			$userName=$_POST['userName'];
			$userEmail=$_POST['userEmail'];
			$userPhone=$_POST['userPhone'];
			$dateofbirth=$_POST['dateofbirth'];
			$gender=$_POST['gender'];
			$UserID	=$_POST['UserID'];

			$update="UPDATE users SET  userName='$userName' ,userEmail='$userEmail' ,userPhoneNumber='$userPhone' ,dateofbirth='$dateofbirth' ,userGender='$gender' WHERE userID='$UserID' ";
			$result=mysqli_query($Connect,$update);
			if ($result) {
				echo "<script>alert('Completed');</script>";
			}
			else{
				echo "<script>alert('error  ');</script>";
			}
		



 ?>