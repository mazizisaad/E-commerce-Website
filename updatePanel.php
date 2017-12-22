<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Product Update</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style2.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery/smoothscroll.js"></script>
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
    <p align="center">
    	<ul>
    		<li><a href="#women" class="smoothScroll">Women/</a></li>
    		<li><a href="#men" class="smoothScroll">Men/</a></li>
        	<li><a href="#kids" class="smoothScroll">Kids</a></li>
    	</ul>
    </p>
<?php
		//women
		$sql0 = "SELECT * FROM product WHERE p_type = 'Women' ORDER BY p_brand, p_type";
		$row = mysqli_query($dbconn, $sql0);
		echo "<table align='center' cellpadding='5'>
				<tr align='center'>
					<td colspan=7 bgcolor=#C0C0C0>
						<h2 id='women'><b>Women Products</b></h2>
					</td>
				</tr>
				<th>Product ID</th>
				<th>Product Image</th>
				<th>Brand Name</th>
				<th>Product Name</th>
				<th>Product Type</th>
				<th>Product Note</th>
				<th>Delete/Update</th>";
				while($data = mysqli_fetch_array($row)){
				    echo "<form action=update.php method=post>";
					echo "<tr align='center'>";
					echo "<td>"  . "<input type=text name=prod_id readonly style='border:none; text-align:center; background:transparent' size=5 value=" .$data['id'] . " </td>";
					echo "<td>"  .'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="100" height="100">' . " </td>";
					echo "<td>"  .$data['p_brand'] .  " </td>";
					echo "<td>"  .$data['p_name'] . " </td>";
					echo "<td>"  .$data['p_type'] . " </td>";
					echo "<td>"  .$data['p_note'] . " </td>";
					echo "<td><input type=submit name=delete value=Delete> &nbsp; <input type=submit name=search value='Update Product'></td>";
					echo "</form>";
				}
		echo "</table>";
		
		//men
		$sql0 = "SELECT * FROM product WHERE p_type = 'Men'ORDER BY p_brand, p_type";
		$row = mysqli_query($dbconn, $sql0);
		echo "<table align='center' cellpadding='5'>
				<tr align='center'>
					<td colspan=7 bgcolor=#C0C0C0>
						<h2 id='men'><b>Men Products</b></h2>
					</td>
				</tr>
				<th>Product ID</th>
				<th>Product Image</th>
				<th>Brand Name</th>
				<th>Product Name</th>
				<th>Product Type</th>
				<th>Product Note</th>
				<th>Delete/Update</th>";
				while($data = mysqli_fetch_array($row)){
				    echo "<form action=update.php method=post>";
					echo "<tr align='center'>";
					echo "<td>"  . "<input type=text name=prod_id readonly style='border:none; text-align:center; background:transparent' size=5 value=" .$data['id'] . " </td>";
					echo "<td>"  .'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="100" height="100">' . " </td>";
					echo "<td>"  .$data['p_brand'] .  " </td>";
					echo "<td>"  .$data['p_name'] . " </td>";
					echo "<td>"  .$data['p_type'] . " </td>";
					echo "<td>"  .$data['p_note'] . " </td>";
					echo "<td><input type=submit name=delete value=Delete> &nbsp; <input type=submit name=search value='Update Product'></td>";
					echo "</form>";
				}
		echo "</table>";
		
		$sql0 = "SELECT * FROM product WHERE p_type = 'Kids' ORDER BY p_brand, p_type";
		$row = mysqli_query($dbconn, $sql0);
		echo "<table align='center' cellpadding='5'>
				<tr align='center'>
					<td colspan=7 bgcolor=#C0C0C0>
						<h2 id='kids'><b>Kids Products</b></h2>
					</td>
				</tr>
				<th>Product ID</th>
				<th>Product Image</th>
				<th>Brand Name</th>
				<th>Product Name</th>
				<th>Product Type</th>
				<th>Product Note</th>
				<th>Delete/Update</th>";
				while($data = mysqli_fetch_array($row)){
				    echo "<form action=update.php method=post>";
					echo "<tr align='center'>";
					echo "<td>"  . "<input type=text name=prod_id readonly style='border:none; text-align:center; background:transparent' size=5 value=" .$data['id'] . " </td>";
					echo "<td>"  .'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="100" height="100">' . " </td>";
					echo "<td>"  .$data['p_brand'] .  " </td>";
					echo "<td>"  .$data['p_name'] . " </td>";
					echo "<td>"  .$data['p_type'] . " </td>";
					echo "<td>"  .$data['p_note'] . " </td>";
					echo "<td><input type=submit name=delete value=Delete> &nbsp; <input type=submit name=search value='Update Product'></td>";
					echo "</form>";
				}
		echo "</table>";
		mysqli_close($dbconn);
	?>
    </div>
    </div>
<div id="footer">
   		<p>&copy; 2016 Tempatan Brands Outlet Official</p>
      </div>
    </div>
</body>
