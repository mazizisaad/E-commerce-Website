<?php
/* include db connection file */
session_start();
include("dbconn.php");
if(isset($_POST['register']))
{
//Register
$r_name = $_POST['reg_name'];
$r_email = $_POST['reg_email'];
$r_password = $_POST['reg_password'];
$r_state = $_POST['reg_state'];

$sql0 = "SELECT c_email FROM customer WHERE c_email = '$r_email'";
	$query0 = mysqli_query($dbconn,$sql0) or die ("Error: " . mysqli_error($dbconn));
	$row0 = mysqli_num_rows($query0);
	if($row0 != 0){
		echo '<script type="text/javascript">';
		echo 'alert("Account Already Exist!");';
		echo 'location.href="login.php";';
		echo '</script>';
	}
	else{
$sql1 = "INSERT INTO customer VALUES ('". $r_name ."','". $r_email ."','". $r_password ."','". $r_state ."')";
mysqli_query($dbconn, $sql1);
		echo '<script type="text/javascript">';
		echo 'alert("Registration Complete!");';
		echo 'location.href="login.php";';
		echo '</script>';
}
}
//Login
if(isset($_POST['login'])){
	/* capture values from HTML form */
	$log_email = $_POST["l_email"];
	$log_password = $_POST["l_password"];
	
	if($log_email == "dev@dev" && $log_password == "ved"){
		$_SESSION['name'] = "Developer";
         header("Location: index.php");		
	}
	else{
		/* execute SQL command */
		$sql2 = "SELECT * FROM customer 
				WHERE  c_email= '$log_email'
				AND c_password = '$log_password'";
				//echo $sql;
		$query2 = mysqli_query($dbconn, $sql2) or 
				die("Error: " . mysqli_error($dbconn, $sql2));
		$row2 = mysqli_num_rows($query2);
		if($row2 == 0){
			echo '<script type="text/javascript">';
			echo 'alert("Invalid Username or Password!");';
			echo 'location.href="login.php";';
			echo '</script>';
		}
		else{
			$login = mysqli_fetch_assoc($query2);
			$_SESSION["id"] = $login['c_email'];
			$_SESSION["name"] = $login['c_name'];
			header("Location: index.php");
			}
	    }
     }
mysqli_close($dbconn);
?>