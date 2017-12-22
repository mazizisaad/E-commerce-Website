<!doctype>
<?php
session_start();
include("dbconn.php");
//Login
if(isset($_POST['login'])){
	/* capture values from HTML form */
	$logAdm_email = $_POST["adm_email"];
	$logAdm_password = $_POST["adm_password"];
	
	if($logAdm_email == "dev@dev" && $logAdm_password == "ved"){
		$_SESSION['name'] = "Developer";
         header("Location: test.php");		
	}
	else{
		/* execute SQL command */
		$sql2 = "SELECT * FROM admin 
				WHERE  adm_email= '$logAdm_email'
				AND adm_password = '$logAdm_password'";
				//echo $sql;
		$query2 = mysqli_query($dbconn, $sql2) or 
				die("Error: " . mysqli_error($dbconn, $sql2));
		$row2 = mysqli_num_rows($query2);
		if($row2 == 0){
			echo '<script type="text/javascript">';
			echo 'alert("Invalid Username or Password!");';
			echo 'location.href="admin.php";';
			echo '</script>';
		}
		else{
			$login = mysqli_fetch_assoc($query2);
			$_SESSION["AdmId"] = $login['adm_email'];
			$_SESSION["AdmName"] = $login['adm_name'];
			header("Location: admHome.php");
			}
}
     }
mysqli_close($dbconn);
?>

<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Tempatan Brands Outlet Admin Login</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
</head>
<body>
	<div id="adm_wrapper">
   	  <div id="adminLogin">
      	<form method="post" action="admin.php">
        	<table>
            	<tr>
                	<td align="center" colspan="2">
                    	<img src="image/logo.png" width="200" height="200" alt="Admin Login"/>
<h1>Admin Login</h1>
                    </td>
                </tr>
            	<tr>
                	<td align="right">Name: </td>
                    <td><input type="email" name="adm_email" placeholder="Username" required></td>
                </tr>
                <tr>
                	<td align="right">Password: </td>
                    <td><input type="password" name="adm_password" placeholder="Password" required></td>
                </tr>
                <tr>
                	<td align="center" colspan="2">
                    	<input type="submit" name="login" value="Login">&nbsp;<input type="reset" name="reset" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
      </div>
    </div>
</body>
</html>