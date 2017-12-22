<?php
	include("dbconn.php");
	//search	
	if(isset($_POST['search'])){
		$pay_id = $_POST['searchItem'];

		$sql0 = "SELECT * FROM payment WHERE ref = '$pay_id' AND tracking != 'null'";
		$query0 = mysqli_query($dbconn, $sql0);
		$row = mysqli_num_rows($query0);
			if($row == 0){
				echo '<script type="text/javascript">';
				echo 'alert("Product not found!");';
				echo 'location.href="delivery.php"';
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
				$delivery_date = $s["delivery_date"];
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
											<?php echo $pay_id ?>
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
											<?php echo $delivery ?>
										</td>
									</tr>
                                    <tr>
										<td>
											Tracking Number/ Status:
										</td>
										<td>
											<?php echo $tracking ?><br><br>
										</td>
									</tr>
                                    <tr>
										<td>
											Payment Date:
										</td>
										<td>
											<?php echo $pay_date ?><br><br>
										</td>
									</tr>
                                    <tr>
										<td>
											Delivery/Pickup Date:
										</td>
										<td>
											<?php echo $delivery_date ?><br><br>
										</td>
									</tr>
                                    <tr>
										<td colspan="2" align="center" height="30" bgcolor="#F18A54">
                                            <input type="button" name="back" value="Back" onClick="window.history.back();">
										</td>
									</tr>
								
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