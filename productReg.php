<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Product Registration</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style2.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrapper">
   	  <div id="header">
      	<div id="upper">
        	<ul>
            	<li><a href="admLogout.php"><?php echo $_SESSION['AdmName']?>[Logout]</a></li>
            </ul>
        </div>
        <div id="lower">
        	<ul>
            	<li><a href="admHome.php">Home</a></li>
                <li><a href="productReg.php">Upload</a></li>
                <li><a href="updatePanel.php">Update</a></li>
                <li><a href="admCheckout.php">Checkout</a></li>
                <li><a href="delivery.php">Delivery</a></li>
            </ul>
        </div>
      </div>
      <div id="body">
      <div id="form">
      	<form method="post" action="productReg.php" enctype="multipart/form-data">
        	<table>
            	<tr>
                	<td align="center" colspan="2">
                    	<img src="image/logo.png" width="200" height="200" alt="Admin Login"/>
                    </td>
                </tr>
                <tr>
                	<th colspan="2">Product Registration</th>
                </tr>
                <tr>
                	<td align="right">Product ID: </td>
                    <td><input type="text" name="upload_id" required></td>
                </tr>
                <tr>
                	<td align="right">Image: </td>
                    <td><input type="file" name="upload_image" required></td>
                </tr>
                <tr>
                	<td align="right">Brand: </td>
                    <td>
                    	<select name="upload_brand">
                        	<option value="Empayar Kuku Besi">Empayar Kuku Besi
                            <option value="Abstrax">Abstrax
                            <option value="Legit">Legit
                            <option value="Akudesign">Akudesign
                            <option value="Rare">Rare
                        </select>
                    </td>
                </tr>
                <tr>
                	<td align="right">Name: </td>
                    <td><input type="text" name="upload_name" placeholder="Product Name" required></td>
                </tr>
                <tr>
                	<td align="right">Size: </td>
                    <td><input type="text" name="upload_size" placeholder="Product Size" required></td>
                </tr>
                <tr>
                	<td align="right">Type: </td>
                    <td>
                    	<select name="upload_type">
                        	<option value="Women">Women
                            <option value="Men">Men
                            <option value="Kids">Kids
                        </select>
                    </td>
                </tr>
                <tr>
                	<td align="right">Price: </td>
                    <td><input type="text" name="upload_price" placeholder="Product Price" required></td>
                </tr>
                <tr>
                	<td align="right">Note: </td>
                    <td>
                    	<select name="upload_note">
                        	<option value=" ">None
                            <option value="New Arrival">New Arrival
                            <option value="Hot Selling">Hot Selling
                            <option value="Trending Item">Trending Item
                            <option value="Sales">Sales
                        </select>
                    </td>
                </tr>
                <tr>
                	<td align="center" colspan="2" bgcolor="#F18A54" height="30">
                    	<input type="submit" name="upload" value="Upload">&nbsp;<input type="reset" name="reset" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
        </div>
      </div>
	  <div id="footer">
   		<p>&copy; 2016 Tempatan Brands Outlet Official</p>
      </div>
    </div>
</body>
</html>
<?php
	//upload pic to db
	//$file = $_FILES['upload_image']['tmp_name'];
	
		if(isset($_POST['upload']))
			/*echo "<script type='text/javascript'>alert('Please Upload an Image');</script>";
		else*/
		{
			$image = addslashes(file_get_contents($_FILES['upload_image']['tmp_name']));
			$image_name = addslashes($_FILES['upload_image']['name']);
			$image_size = getimagesize($_FILES['upload_image']['tmp_name']);
			//retrive from form
			$prod_id = $_POST["upload_id"];
			$prod_brand = $_POST["upload_brand"];
			$prod_name = $_POST["upload_name"];
			$prod_size = $_POST["upload_size"];
			$prod_type = $_POST["upload_type"];
			$prod_price = $_POST["upload_price"];
			$prod_note = $_POST["upload_note"];
			
			$sql = "SELECT * FROM product WHERE id = '$prod_id'";
				//echo $sql;
		$query = mysqli_query($dbconn, $sql);
		$row = mysqli_num_rows($query);
			
			if($image_size==false)
				echo "<script type='text/javascript'>alert('That is not an image!');</script>";
			else
			{
			if($row != 0)
				echo "<script type='text/javascript'>alert('Product ID already exist!');</script>";
			else
			{
				if($insert = mysqli_query($dbconn, "INSERT INTO product VALUES ('". $prod_id ."','". $image ."','". $image_name ."','". $prod_brand ."','". $prod_name ."','". $prod_size ."','". $prod_type ."','". $prod_price ."','". $prod_note ."')"))
					echo "<script type='text/javascript'>alert('Upload Success');</script>";
				else
				{
					echo "<script type='text/javascript'>alert('Upload Fail');</script>";
				}
			}
			}
		}
	mysqli_close($dbconn);
?>