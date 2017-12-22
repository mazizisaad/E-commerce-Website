<?php
	session_start();
	include("dbconn.php");
	
	if(isset($_POST['change']))
{
	//Change Password
	$old = $_POST['old'];
	$new = $_POST['new'];
	$confirm = $_POST['confirm'];

	$sql0 = "SELECT c_password FROM customer WHERE c_password = '$old'";
	$query0 = mysqli_query($dbconn,$sql0) or die ("Error: " . mysqli_error($dbconn));
	$row0 = mysqli_num_rows($query0);
	if($row0 == 0){
		echo "<script type=text/javascript>";
		echo 'alert("Your Old Password Is Incorrect!");';
		echo 'window.history.back();';
		echo "</script>";
	}
	else{
		if($new == $confirm){
			$sql1 = "UPDATE customer SET c_password ='$new' WHERE c_email = '$_SESSION[id]'";
			mysqli_query($dbconn, $sql1);
			echo "<script type=text/javascript>";
			echo 'alert("Password Change Successful!");';
			echo 'window.close();';
			echo "</script>";
		}
		else{
			echo "<script type=text/javascript>";
			echo 'alert("Your Password Is Not Match!");';
			echo 'window.history.back();';
			echo "</script>";
	    }
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Password</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="password">
<form method="post" action="password.php">
	<fieldset>
	<table border="0" width="350" height="100">
    	<th colspan="2"><font size="5">Change Password</font></th>
        <tr>
        	<td>
            	Name:
            </td>
            <td>
            	<p><?php echo $_SESSION['name'];?></p>
            </td>
        </tr>
    	<tr>
        	<td>
            	Insert Old Password:
            </td>
            <td>
            	<input type="password" name="old" placeholder="Old Password" required>
            </td>
        </tr>
        <tr>
        	<td>
            	Insert New Password: 
            </td>
            <td>
            	<input type="password" name="new" placeholder="New Password" required>
            </td>
        </tr>
        <tr>
        	<td>
            	Confirm New Password: 
            </td>
            <td>
            	<input type="password" name="confirm" placeholder="Confirm Password" required>
            </td>
        </tr>
        <tr>
        	<td colspan="2" height="30" align="center" bgcolor="#F18A54">
            	<input type="submit" name="change" value="Change Password">
            </td>
        </tr>
    </table>
    </fieldset>
</form>
</div>
</body>
</html>
<?php
	mysqli_close($dbconn);
?>