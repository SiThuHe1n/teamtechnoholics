
<?php
 
if(!isset($_SESSION['Login_Session']))
{
	echo false;
	
}
else if (isset($_SESSION['Login_Session']))
{
echo true;
}
?>
