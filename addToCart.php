<!doctype html>
<?php
	session_start();
	include("dbconn.php");
	
	if(isset($_SESSION['id'])):
	{
		if($_POST['add']){
		$pid = $_POST["prod_id"];
		$cid = $_SESSION["id"];
		$status = 0;
		
	$check0 = "SELECT p_id FROM cart WHERE p_id = '$pid' AND c_id = '$cid' AND status = 0";
	$queryCheck0 = mysqli_query($dbconn,$check0) or die ("Error: " . mysqli_error($dbconn));
	$checkrow0 = mysqli_num_rows($queryCheck0);
	if($checkrow0 != 0){
		echo '<script type="text/javascript">';
		echo 'alert("You Already Add This Item");';
		echo 'window.history.back();';
		echo '</script>';
	}
	else
	{
				
		$addCart = "INSERT INTO cart VALUES ('','". $pid ."','". $cid ."','". $status ."')";
		mysqli_query($dbconn, $addCart);
			echo '<script type="text/javascript">';
			echo 'alert("Add To Cart Success!");';
			echo 'window.history.back();';
			echo '</script>';
	}
		}
	}
	else:
	{
		echo '<script type="text/javascript">';
		echo 'alert("Please Login First Before Add To Cart!");';
		echo 'location.href="login.php"';
		echo '</script>';
	}
	endif;
	
	mysqli_close($dbconn);
?>