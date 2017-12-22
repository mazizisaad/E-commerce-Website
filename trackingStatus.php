<?php
	include("dbconn.php");
	
	//update
	if(isset($_POST['update'])){
	date_default_timezone_set("asia/Kuala_Lumpur");
	$tracking = $_POST["tracking"];
	$ref = $_POST["ref"];
	$delivery_date = date('Y/m/d H:i:s');
				
	$update = "UPDATE payment SET tracking ='$tracking', delivery_date ='$delivery_date' WHERE ref = '$ref'";
	mysqli_query($dbconn, $update);
		echo '<script type="text/javascript">';
		echo 'alert("Update Success!");';
		echo 'location.href="admCheckout.php"';
		echo '</script>';
	/*header("Location: updatePanel.php");
	echo "<script type='text/javascript'>alert('Update Success');</script>";*/
}
	
	//search	
	if(isset($_POST['search'])){
		$pay_id = $_POST['searchItem'];

		$sql0 = "SELECT * FROM payment WHERE ref = '$pay_id' AND tracking = 'null'";
		$query0 = mysqli_query($dbconn, $sql0);
		$row = mysqli_num_rows($query0);
			if($row == 0){
				echo '<script type="text/javascript">';
				echo 'alert("Product not found!");';
				echo 'location.href="admCheckout.php"';
				echo '</script>';
				/*echo "<script type='text/javascript'>alert('Product not found!');</script>";
				header("Location: updatePanel.php");*/
			}
				else{
				$s = mysqli_fetch_assoc($query0);
				$name = $s["name"];
				$ic_num = $s["ic_num"];
				$contact = $s["contact"];
				$email = $s["email"];
				$address = $s["address"];
				$p_id = $s["p_id"];
				$p_name = $s["p_name"];
				$p_brand = $s["p_brand"];
				$xs = $s["xs"];
				$ss = $s["s"];
				$m = $s["m"];
				$l = $s["l"];
				$xl = $s["xl"];
				$xxl = $s["xxl"];
				$delivery = $s["delivery"];
				$tracking = $s["tracking"];
				$pay_date = $s["pay_date"];
			?>
            <div id="searchItem">
			<html>
			<head>
            <title>Admin Checkout</title>
            <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
            <link href="css/style2.css" rel="stylesheet" type="text/css">
            </head>
			<body>
				<table width="100%" height="100%" cellpadding="5" cellspacing="5">
					<tr>
						<td width="30%"></td>
						<td width="40%">
							<table>
								<form method="post" action="trackingStatus.php">
                                	<tr>
                                    	<th colspan="2" align="center">
                                        	<h1>Product Checkout</h1>
                                        </th>
                                    </tr>
									<tr>
										<td>
											Payment ID:
										</td>
										<td>
											<input type="text" name="ref" value="<?php echo $pay_id ?>" style="border:none;" readonly required>
										</td>
									</tr>
									<tr>
										<td>
											Name:
										</td>
										<td>
											<?php echo $name ?>
										</td>
									</tr>
                                    <tr>
										<td>
											IC Number:
										</td>
										<td>
											<?php echo $ic_num ?>
										</td>
									</tr>
                                     <tr>
										<td>
											Contact:
										</td>
										<td>
											<?php echo $contact ?>
										</td>
									</tr>
                                    <tr>
										<td>
											Email:
										</td>
										<td>
											<?php echo $email ?>
										</td>
									</tr>
                                    <tr>
										<td>
											Address:
										</td>
										<td>
											<?php echo $address ?>
										</td>
									</tr>
									<tr>
										<td>
											Product ID/ Product Name/ Product Brand: 
										</td>
										<td>
											<?php echo $p_id . "/ " . $p_name . "/ " . $p_brand ?>
										</td>
									</tr>
									<tr>
										<td>
											Quantity:
										</td>
										<td>
											<?php echo "XS: "  . $xs . "<br> S:" . $ss . "<br> M:" . $m . "<br> L:" . $l . "<br> XL:" . $xl . "<br> XXL:" . $xxl ; ?>
										</td>
									</tr>
                                    <tr>
										<td>
											Delivery Method:
										</td>
										<td>
											<?php echo $delivery ; ?>
										</td>
									</tr>
                                    <tr>
										<td>
											Payment Date:
										</td>
										<td>
											<?php echo $pay_date ; ?>
										</td>
									</tr>
                                    <tr>
										<td>
											Tracking Number/ Status<font color="red">*</font>:
										</td>
										<td>
											<input type="text" name="tracking" value="<?php echo $tracking ?>" autocomplete="off" required><br>
                                            Please Enter Tracking Number For Postage Option Or Enter 'Check' For Self Pickup Option<br><br>
										</td>
									</tr>
									<tr align="center">
										<td colspan="2"><font color="red">*field that can be editted</font></td>
									</tr>
									<tr align="center">
										<td colspan="2" bgcolor="#F18A54" height="30">
											<input type="submit" name="update" value="Update">
                                            <input type="button" name="back" value="Back" onClick="window.history.back();">
										</td>
									</tr>
								</form>
							</table>
						</td>
						<td width="30%"></td>
					</tr>
				</table>
			</body>
			</html>
            </div>
<?php
					}
	}
		mysqli_close($dbconn);
?>
