<?php
	include("dbconn.php");
	//delete
	if(isset($_POST['delete'])){
			$delete = "DELETE from product WHERE id='$_POST[prod_id]'";
			mysqli_query($dbconn, $delete);
				echo '<script type="text/javascript">';
				echo 'alert("Delete Success!");';
				echo 'location.href="updatePanel.php"';
				echo '</script>';
			/*echo "<script type='text/javascript'>alert('Delete Success');</script>";*/
			}
	//update
	if(isset($_POST['update'])){
	$id = $_POST["id"];
	$name = $_POST["name"];
	$size = $_POST["size"];
	$price = $_POST["price"];
	$note = $_POST["note"];
				
	$update = "UPDATE product SET p_name ='$name', p_size ='$size', p_price ='$price', p_note ='$note'
   				WHERE id = '$id'";
	mysqli_query($dbconn, $update);
		echo '<script type="text/javascript">';
		echo 'alert("Update Success!");';
		echo 'location.href="updatePanel.php"';
		echo '</script>';
	/*header("Location: updatePanel.php");
	echo "<script type='text/javascript'>alert('Update Success');</script>";*/
}
	
	//search	
	if(isset($_POST['search'])){
		$update_id = $_POST['prod_id'];

		$sql0 = "SELECT * FROM product WHERE id = '$update_id'";
		$query0 = mysqli_query($dbconn, $sql0);
		$row = mysqli_num_rows($query0);
			if($row == 0){
				echo '<script type="text/javascript">';
				echo 'alert("Product not found!");';
				echo 'location.href="updatePanel.php"';
				echo '</script>';
				/*echo "<script type='text/javascript'>alert('Product not found!');</script>";
				header("Location: updatePanel.php");*/
			}
				else{
				$s = mysqli_fetch_assoc($query0);
				$id = $s["id"];
				$update_imageName = $s["p_imageName"];
				$update_brand = $s["p_brand"];
				$update_name = $s["p_name"];
				$update_size = $s["p_size"];
				$update_type = $s["p_type"];
				$update_price = $s["p_price"];
				$update_note = $s["p_note"];
			?>
            <div id="searchItem">
			<html>
			<head>
            <title>Update</title>
            <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
            <link href="css/style2.css" rel="stylesheet" type="text/css">
            </head>
			<body>
				<table width="100%" height="100%" cellpadding="5" cellspacing="5" border="0">
					<tr>
						<td width="30%"></td>
						<td width="40%">
							<table width="100%" height="100%" cellpadding="5" cellspacing="5" border="0">
								<form method="post" action="update.php">
                                	<tr>
                                    	<th colspan="2" align="center">
                                        	<h1>Product Update</h1>
                                        </th>
                                    </tr>
                                    <tr>
                                    	<td colspan="2" align="center">
                                        	<?php
											 //echo "<img src =get.php?id=$id>"; jgn guna sbb salah concept
											 echo '<img src="data:image/jpeg;base64,'.base64_encode($s['p_image']).'" width="300" height="300">';//please convert image or file to base64, otherwise it doesnt work
											?>
                                        </td>
                                    </tr>
									<tr>
										<td>
											Product ID:
										</td>
										<td>
											<input type="text" name="id" style='border:none; background:transparent' value="<?php echo $id ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td>
											Image Name:
										</td>
										<td>
											<input type="text" name="imageName" style='border:none; background:transparent' value="<?php echo $update_imageName ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td>
											Product Brand: 
										</td>
										<td>
											<input type="text" name="brand" style='border:none; background:transparent' value="<?php echo $update_brand ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td>
											Product Name<font color="red">*</font>:
										</td>
										<td>
											<input type="text" name="name" value="<?php echo $update_name ?>" required>
										</td>
									</tr>
								    <tr>
										<td>
											Product Size<font color="red">*</font>: 
										</td>
										<td>
											<input type="text" name="size" value="<?php echo $update_size ?>" required>
										</td>
									</tr>
									<tr>
										<td>
											Gender Type:
										</td>
										<td>
											<input type="text" name="type" style='border:none; background:transparent' value="<?php echo $update_type ?>" readonly required>
										</td>
									</tr>
									<tr>
										<td>
											Product Price<font color="red">*</font>: 
										</td>
										<td>
											<input type="text" name="price" value="<?php echo $update_price ?>" required>
										</td>
									</tr>
									<tr>
										<td>
											Product Note<font color="red">*</font>:
										</td>
										<td>
											<input type="text" value="<?php echo $update_note ?>" required readonly><br><br>
                                            <select name="note">
                        						<option value=" ">None
                            					<option value="New Arrival">New Arrival
                            					<option value="Hot Selling">Hot Selling
                            					<option value="Trending Item">Trending Item
                            					<option value="Sales">Sales
                        					</select>
										</td>
									</tr>
									<tr align="center">
										<td colspan="2"><font color="red">*field that can be editted</font></td>
									</tr>
									<tr align="center">
										<td colspan="2" height="30" bgcolor="#F18A54">
											<input type="submit" name="update" value="Update">
                                            <input type="button" name="back" value="Back" onClick="window.history.back();"
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