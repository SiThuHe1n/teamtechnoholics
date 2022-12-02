<?php 
include 'connect.php';
echo "<script>alert('Liked');</script>";
	$userID=$_POST['userID'];
	$ideaID=$_POST['ideaID'];
$select="SELECT * FROM reaction WHERE ideaID='$ideaID' AND userID='$userID' ";
$result = mysqli_query($Connect, $select);
if (mysqli_num_rows($result) > 0) {

	$row = mysqli_fetch_array($result);
	if($row['reactionTypeID']==2)
{
$delete="DELETE FROM reaction where reactionTypeID='2' AND userID='$userID' AND ideaID='$ideaID' ";

	if (mysqli_query($Connect, $delete)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " ;
	}
$insert="INSERT INTO reaction (reactionTypeID,userID,ideaID) values ('1','$userID','$ideaID')";

	if (mysqli_query($Connect, $insert)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " ;
	}
}

	
	ElseIF($row['reactionTypeID']==1)
	{
	$delete="DELETE FROM reaction where reactionTypeID='1' AND userID='$userID' AND ideaID='$ideaID'  ";

if (mysqli_query($Connect, $delete)) {
  echo "New record created successfully";
} else {
  echo "Error: " ;
}

	}

}
else
{
	$insert="INSERT INTO reaction (reactionTypeID,userID,ideaID) values ('1','$userID','$ideaID')";

	if (mysqli_query($Connect, $insert)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " ;
	}
}



 ?>