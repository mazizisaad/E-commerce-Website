<?php
	include("dbconn.php");
	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$to = "delima.tech.team@gmail.com";
		$subject = "Subscribe";
		$txt = "Subscribe Tempatan Brands Outlet!\nEmail: ".$email;

		mail($to,$subject,$txt,"From: ".$email);
		echo "<script type=text/javascript>";
		echo "alert('Subscribe Sent!');";
		echo "window.history.back();";
		echo "</script>";
	}
	mysqli_close($dbconn);	
?>