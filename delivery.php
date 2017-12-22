<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Product Delivery</title>
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
      	<div id="searchItem">
        	<form method="post" action="searchItem.php">
            	<fieldset>
                <legend>Search Payment ID</legend>
            	<table width="600" align="left">
                	<tr>
                    	<td>
                        	Payment ID: 
                        </td>
                        <td>
                        	<input type="text" name="searchItem" placeholder="Payment ID" autocomplete="off" required>
                            <input type="submit" name="search" value="Search">
                        </td>
                    </tr>                
                </table>
                </fieldset>
            </form>
        </div>
      	<div id="postage">
        	<?php
		$sql0 = "SELECT * FROM payment WHERE delivery = 'Postage' AND tracking != 'null' ORDER BY pay_date, name, p_brand, address";
		$row = mysqli_query($dbconn, $sql0);
		echo "<table align='center' cellpadding='5'>
				<tr align='center'>
					<td colspan=10 bgcolor=#C0C0C0>
						<b>Postage Items</b>
					</td>
				</tr>
				<th>Payment ID</th>
				<th>Name</th>
				<th>IC Number</th>
				<th>Email</th>
				<th>Address</th>
				<th>Product ID/ Product Name/ Product Brand</th>
				<th>Quatity</th>
				<th>Tracking Number</th>
				<th>Payment Date</th>
				<th>Delivery Date</th>";
				while($data = mysqli_fetch_array($row)){
				    echo "<form action=# method=post>";
					echo "<tr align='center'>";
					echo "<td>"  .$data['ref'] . " </td>";
					echo "<td>"  .$data['name'] .  " </td>";
					echo "<td>"  .$data['ic_num'] . " </td>";
					echo "<td>"  .$data['email'] . " </td>";
					echo "<td>"  .$data['address'] . " </td>";
					echo "<td>"  .$data['p_id'] . "/ " . $data['p_name'] . "/ " . $data['p_brand'] . " </td>";
					echo "<td> XS: "  .$data['xs'] . "<br> S:" . $data['s'] . "<br> M:" . $data['m'] . "<br> L:" . $data['l'] . "<br> XL:" . $data['xl'] . "<br> XXL:" . $data['xxl'] . " </td>";
					echo "<td>" . $data['tracking'] . "</td>";
					echo "<td>" . $data['pay_date'] . "</td>";
					echo "<td>" . $data['delivery_date'] . "</td>";
					echo "</form>";
				}
		echo "</table>";
	?>
        </div>
        <div id="pickup">
        	<?php
		$sql1 = "SELECT * FROM payment WHERE delivery = 'Self Pickup' AND tracking != 'null' ORDER BY pay_date, name, p_brand, address";
		$row1 = mysqli_query($dbconn, $sql1);
		echo "<table align='center' cellpadding='5'>
				<tr align='center'>
					<td colspan=10 bgcolor=#C0C0C0>
						<b>Pickup Items</b>
					</td>
				</tr>
				<th>Payment ID</th>
				<th>Name</th>
				<th>IC Number</th>
				<th>Email</th>
				<th>Address</th>
				<th>Product ID/ Product Name/ Product Brand</th>
				<th>Quatity</th>
				<th>Pickup Status</th>
				<th>Payment Date</th>
				<th>Delivery Date</th>";
				while($data1 = mysqli_fetch_array($row1)){
				    echo "<form action=# method=post>";
					echo "<tr align='center'>";
					echo "<td>"  .$data1['ref'] . " </td>";
					echo "<td>"  .$data1['name'] .  " </td>";
					echo "<td>"  .$data1['ic_num'] . " </td>";
					echo "<td>"  .$data1['email'] . " </td>";
					echo "<td>"  .$data1['address'] . " </td>";
					echo "<td>"  .$data1['p_id'] . "/ " . $data1['p_name'] . "/ " . $data1['p_brand'] . " </td>";
					echo "<td> XS: "  .$data1['xs'] . "<br> S:" . $data1['s'] . "<br> M:" . $data1['m'] . "<br> L:" . $data1['l'] . "<br> XL:" . $data1['xl'] . "<br> XXL:" . $data1['xxl'] . " </td>";
					echo "<td>" .$data1['tracking'] . " </td>";
					echo "<td>" . $data1['pay_date'] . "</td>";
					echo "<td>" . $data1['delivery_date'] . "</td>";
					echo "</form>";
				}
		echo "</table>";
	?>
        </div>
      </div>
	  <div id="footer">
   		<p>&copy; 2016 Tempatan Brands Outlet Official</p>
      </div>
    </div>
</body>
</html>
<?php
	mysqli_close($dbconn);
?>