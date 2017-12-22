<?php
	include("dbconn.php");	
	$id = addslashes($_REQUEST['id']);
	//image
	$sql = "SELECT p_image FROM product WHERE id = '$id'";
	$query = mysqli_query($dbconn, $sql);	
	$image = mysqli_fetch_assoc($query);
	//$print = $image['p_image'];
	//header("Content-type: image/jpeg");
	echo '<img src="data:image/jpeg;base64,'.base64_encode($image['p_image']).'">';
	//echo $print;
	mysqli_close($dbconn);
	
	/*if(isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($_GET['id']);
		$query = mysqli_query("SELECT p_image FROM product WHERE id = '$id'");
		while($row = mysqli_fetch_assoc($query))
		{
			$image = $row["p_image"];
		}
		//header("content-type: image/jpeg");
		echo '<img src="data:image/jpeg;base64,'.base64_encode($image['image_file']).'">';
	}
	else
	{
		echo "Error!";
	}
	mysqli_close($dbconn);*/
?>