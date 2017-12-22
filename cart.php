<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Cart</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	function openWin() {
    	myWindow = window.open("password.php", "Change Password", "width=100, height=100");  
		myWindow.resizeTo(435, 350); 
		myWindow.moveTo(500, 100);                            
    	myWindow.focus(); 
	}
</script>
</head>
<body>
<div id="logo"> <img src="image/logo.png" width="180" height="180" alt=""/> </div>
<div id="wrapper">
<div id="nav">
  	<div id="upper">
   	  <div id="login">
      	<ul style="">
        	<li>
				<?php if(isset($_SESSION['id'])): ?>
					<a class="link" href="logout.php" style="text-decoration:none"><?php echo $_SESSION['name']?>[Logout]</a>
				<?php else: 
					//<a class="link" href="login.php" style="text-decoration:none">Hi, Guest[Login]</a>
                    echo '<script type="text/javascript">';
					echo 'alert("Please Login First!");';
					echo 'location.href="login.php"';
					echo '</script>';
				 endif; ?>
			</li>
        </ul>
      </div>
      <div id="search">
      	<img src="button/add to cart.png" width="25" height="25" alt=""/>
        <?php if(isset($_SESSION['id'])):
				{
				$numID = $_SESSION['id'];
				$sumCart = "SELECT c.p_id
							FROM cart c join customer cus on c.c_id = cus.c_email
							WHERE c.status = 0
							AND c.c_id like '$numID'";
				$queryCart = mysqli_query($dbconn,$sumCart) or die ("Error: " . mysqli_error($dbconn));
				$count = mysqli_num_rows($queryCart);
        		echo "<p><a href=cart.php>" . $count . " item(s)</a></p>";
				}
				else:
				{
					echo "<p><a href=cart.php>0 item(s)</a></p>";
				}
				endif;
		?>
		<form method="post" action="search.php">
        	<input type="search" name="search" placeholder="Search" required>
            <input type="submit" name="search_button">
        </form>
      </div>
    </div>
    <div id="lower">
   	  <div id="nav_category">
      	<ul>
        	<li><a href="index.php">Home</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="http://www.poslaju.com.my/track-trace/" target="_blank">Postage Tracking</a></li>
        </ul>
      </div>
    </div>
 </div>
 <div id="body">
 <div id="cartTitle">
 	<h1>Cart</h1>
 </div>
 <div id="cartContent">
 	<div id="left">
    	<?php
			$sql0 = "SELECT * FROM customer WHERE c_email like '$_SESSION[id]'";
			$query0 = mysqli_query($dbconn,$sql0) or die ("Error: " . mysqli_error($dbconn));
			$c = mysqli_fetch_assoc($query0);
				$id = $c["c_email"];
				$name = $c["c_name"];
				$state = $c["c_state"];			
		?>
        	<table border="0">
            	<tr>
                	<td colspan="2" align="center"><h1>Details</h1></td>
                </tr>
                <tr>
                	<td>Name: </td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                	<td>Email: </td>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                	<td>State: </td>
                    <td><?php echo $state; ?></td>
                </tr>
                <tr>
                	<td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                	<td colspan="2"><input type="button" name="password" value="Change Password" onClick="openWin()"></td>
                </tr>
            </table>
    </div>
    <div id="right">
    	<div id="form">
<?php
		$sql0 = "SELECT c.cartID, p.id, p.p_image, p.p_name, p.p_brand, p.p_type, p.p_price 
				 FROM cart c join product p on c.p_id = p.id
				 WHERE c.c_id like '$_SESSION[id]'
				 AND c.status = 0
				 ORDER BY p_brand, p_type";
				 
		$row = mysqli_query($dbconn, $sql0);
		echo "<table align='center' cellpadding='5'>
				<th colspan=8>Current Item(s)</th>
				<tr align='center'>
				<th>Card No. </th>
				<th>Product No. </th>
				<th>Image</th>
				<th>Product Name</th>
				<th>Brand Name</th>
				<th>Product Type</th>
				<th>Product Price</th>
				<th>Delete/Checkout</th>
				<tr>";
				while($data = mysqli_fetch_array($row)){
				    echo "<form action=checkout.php method=post>";
					echo "<tr align='center'>";
					echo "<td>"  . "<input type=text name=cartID readonly size=5 style='border:none; text-align:center; background: transparent'; value=" .$data['cartID'] . " </td>";
					echo "<td>"  .$data['id'] .  " </td>";
					echo "<td>"  .'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="100" height="100">' . " </td>";
					echo "<td>"  .$data['p_name'] .  " </td>";
					echo "<td>"  .$data['p_brand'] . " </td>";
					echo "<td>"  .$data['p_type'] . " </td>";
					echo "<td>"  .$data['p_price'] . " </td>";
					echo "<td><input type=submit name=delete value=Delete> &nbsp; <input type=submit name=checkout value='Checkout'></td>";
					echo "</form>";
				}
		echo "</table>";
	?>
    </div>
    <br><br><br>
    <div id="formHistory">
<?php
		$sql1 = "SELECT * 
				 FROM payment p join cart c on p.ref = c.cartID
				 WHERE c.c_id = '$_SESSION[id]'
				 AND tracking != ' '
				 ORDER BY pay_date, p_brand";
				 
		$row1 = mysqli_query($dbconn, $sql1);
		echo "<table align='center' cellpadding='5'>
				<th colspan=7>History Item(s)</th>
				<tr align='center'>
				<th>Cart No. </th>
				<th>Payment Date </th>
				<th>Product No. </th>
				<th>Product Name</th>
				<th>Brand Name</th>
				<th>Total Price</th>
				<th>Tracking Number</th>
				<tr>";
				while($data1 = mysqli_fetch_array($row1)){
					echo "<tr align='center'>";
					echo "<td>"  .$data1['ref'] . " </td>";
					echo "<td>"  .$data1['pay_date'] . " </td>";
					echo "<td>"  .$data1['p_id'] .  " </td>";
					echo "<td>"  .$data1['p_name'] .  " </td>";
					echo "<td>"  .$data1['p_brand'] . " </td>";
					echo "<td>"  .$data1['grand_total'] . " </td>";
					echo "<td>"  .$data1['tracking'] . " </td>";
				}
		echo "</table>";
	?>
    </div>
    </div>
 </div>
 </div>
 <div id="footer">
<div id="information">
 	<div id="placing">
		<div id="info">
       	  <div id="info_title">
          	<p>Tempatan Brand Outlets</p>
          </div>
          <div id="info_content">
          	<p>This website is the first website that sell Malaysia local clothing online. We have several colections such as Empayar Kuku Besi
            , Abstrax, Akudesign, Legit and Rare. Those beautiful design will make you look stunning. Get the original shirt from us!</p>
          </div>
        </div>
    	<div id="info2">
       	  <div id="info2_title">
          	<p>Customer Informations</p>
          </div>
          <div id="info2_content">
          	<ul>
            	<li><a href="privacy&policy.php">Privacy & Policy</a></li>
                <li><a href="goodsReturnPolicy.php">Goods Return Policy</a></li>
                <li><a href="customerService.php">Customer Service</a></li>
                <li><a href="shoppingGuide.php">Shopping Guide</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
          </div>
        </div>
    	<div id="newsletter">
       	  <div id="newsletter_title">
          	<p>Newsletter</p>
          </div>
          <div id="newsletter_content">
          	<form method="post" action="email.php">
            	<p>Email: </p> 
                <input type="email" name="email" placeholder="Place Your Email Here" autocomplete="off">
                <input type="submit" name="submit" value="Subscribe">
            </form>
          </div>
        </div>
    </div>
 </div>
 <div id="footerLower">
 	<p>&copy; 2016 Tempatan Brands Outlet Official</p>
 </div>
 </div>
</div>
</body>
</html>
<?php
	mysqli_close($dbconn);
?>