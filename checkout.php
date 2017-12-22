<!doctype html>
<?php
	session_start();
	include("dbconn.php");
	
	//delete
	if(isset($_POST['delete'])){
			$delete = "DELETE from cart WHERE cartID='$_POST[cartID]'";
			mysqli_query($dbconn, $delete);
				echo '<script type="text/javascript">';
				echo 'alert("Delete Success!");';
				echo 'location.href="cart.php"';
				echo '</script>';
			/*echo "<script type='text/javascript'>alert('Delete Success');</script>";*/
			}
	if(isset($_POST['checkout']))
	{
		$ref = $_POST['cartID'];
		$sql0 = "SELECT * 
				 FROM product p join cart c on p.id = c.p_id
				 join customer cus on c.c_id = cus.c_email
				 WHERE cartID like '$ref'";
		$query0 = mysqli_query($dbconn, $sql0);
		$r = mysqli_fetch_array($query0);
		
		$p_id = $r['p_id'];
		$name = $r['c_name'];
		$email = $r['c_email'];
		$p_name = $r['p_name'];
		$brand = $r['p_brand'];
		$size = $r['p_size'];
		$price = $r['p_price'];
	}
?>
<html>
<head>
<meta charset="utf-8">
<title>Checkout Items</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="jquery/cal.js"></script>
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
				<?php else: ?>
					<a class="link" href="login.html" style="text-decoration:none">Hi, Guest[Login]</a>
				<?php endif; ?>
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
<div id="checkoutTitle">
 	<h1>Checkout Items</h1>
 </div>
 <div id="checkoutContent">
 	<form name="checkout" method="post" action="checkOutSummary.php">
 		<div id="billing">
        	<fieldset>
   			  <table border="0" width="500">
                	<legend>Billing and Shipping</legend>
                   	<tr>
                    	<td>
                        	Name: 
                        </td>
                        <td>
                        	<input type="text" name="name" autocomplete="off" value = "<?php echo  $name; ?>" required> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	IC Number: 
                        </td>
                        <td>
                        	<input type="text" name="ic_num" autocomplete="off" required> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Contact Number: 
                        </td>
                        <td>
                        	<input type="text" name="contact" autocomplete="off" required> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Email Address: 
                        </td>
                        <td>
                        	<input type="email" name="email" autocomplete="off" value="<?php echo $email; ?>" required> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Addrees: 
                        </td>
                        <td>
                        	<textarea name="address" cols="30" rows="4" autocomplete="off" required></textarea> 
                        </td>
                    </tr>
            	</table>
            </fieldset>
    	</div>
        <div id="payment">
        	<fieldset>
            	<table width="600">
                	<legend>Payment</legend>
                  <tr>
                    	<td>
                        	Method: 
                        </td>
                        <td>
                        	<input type="radio" name="method" value="Credit/Debit" required>Credit/Debit</input>
                            <input type="radio" name="method" value="Fund Transfer">Fund Transfer</input>
                            <input type="radio" name="method" value="Internet Banking">Internet Banking</input> 
                        </td>
                  </tr>
                     <tr>
                    	<td>
                        	Bank: 
                        </td>
                        <td>
                       	  <select name="bank" required>
                            	<option value="Affin Bank">Affin Bank Berhad</option>
                                <option value="Alliance Bank">Alliance Bank Berhad</option>
                                <option value="AmBank">AmBank Berhad</option>
                                <option value="CIMB Bank">CIMB Bank Berhad</option>
                                <option value="EON Bank">EON Bank Berhad</option>
                                <option value="Hong Leong Bank">Hong Leong Bank Berhad</option>
                                <option value="MayBank">Malayan Banking Berhad</option>
                                <option value="Public Bank">Public Bank</option>
                                <option value="RHB Bank">RHB Bank</option>
                                <option value="Citibank">Citibank</option>
                                <option value="HSBC Bank">HSBC Bank</option>
                                <option value="OCBC Bank">OCBC Bank</option>
                                <option value="UOB">UOB</option>
                                <option value="Bank Islam">Bank Islam</option>
                                <option value="Bank Muamalat">Bank Muamalat</option>
                                <option value="Bank BSN">Bank BSN</option>
                                <option value="Paypal">Paypal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Delivery: 
                        </td>
                        <td>
                        	<input type="radio" name="delivery" value="Self Pickup" required onClick="calPrice()">Self Pickup</input>
                            <input type="radio" name="delivery" value="Postage" onClick="calPrice()">Postage</input> 
                        </td>
                  </tr>
                </table>
            </fieldset>
        </div>
		<div id="item">
       	  <fieldset>
       	    <table border="0" width="1000" align="center">
                	<legend>Checkout Item</legend>
                    	<th align="center">
                        	ID
                        </th>
                        <th>
                        	Image
                        </th>
                        <th>
                        	Product Name
                        </th>
                        <th>
                        	Product Brand
                        </th>
                        <th>
                        	Size
                        </th>
                        <th>
                        	Quantity
                        </th>
                        <th>
                        	Price
                        </th>
                        <th>
                        	Total Price
                        </th>
              <tr valign="top">
                    	<td rowspan="6">
                        	<input type="text" name="ch_id" value="<?php echo $ref; ?>" style='border:none; text-align:center' size="10" readonly>
                            <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                  </td>
             
                  <?php echo "<td rowspan=6>"  .'<img src="data:image/jpeg;base64,'.base64_encode($r['p_image']).'" width="100" height="100">' . " </td>"; ?>
                        
                  <td rowspan="6">
                        	<input type="text" name="p_name" value="<?php echo $p_name; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td rowspan="6">
                        	<input type="text" name="p_brand" value="<?php echo $brand; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	XS
                        </td>
                        <td>
                        	<input type="number" name="input_xs" min="0" max="10" value="0" style='border:none; text-align:center' onchange="calPrice()"/> 
                        </td>
                        <td>
                        	<input type="number" name="price" value="<?php echo $price; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	<input type="text" name="total_xs" style='border:none; text-align:center' readonly>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	S 
                        </td>
                        <td>
                        	<input type="number" name="input_s" min="0" max="10" value="0" style='border:none; text-align:center' onchange="calPrice()" /> 
                        </td>
                        <td>
                        	<input type="number" value="<?php echo $price; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	<input type="text" name="total_s" style='border:none; text-align:center' readonly>
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	M
                        </td>
                        <td>
                        	<input type="number" name="input_m" min="0" max="10" value="0" style='border:none; text-align:center' onchange="calPrice()" /> 
                        </td>
                        <td>
                        	<input type="number" value="<?php echo $price; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	<input type="text" name="total_m" style='border:none; text-align:center' readonly>
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	L
                        </td>
                        <td>
                        	<input type="number" name="input_l" min="0" max="10" value="0" style='border:none; text-align:center' onChange="calPrice()" />
                        </td>
                        <td>
                        	<input type="number" value="<?php echo $price; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	<input type="text" name="total_l" style='border:none; text-align:center' readonly>
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	XL
                        </td>
                        <td>
                        	<input type="number" name="input_xl" min="0" max="10" value="0" style='border:none; text-align:center' onchange="calPrice()" />
                        </td>
                        <td>
                        	<input type="number" value="<?php echo $price; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	<input type="text" name="total_xl" style='border:none; text-align:center' readonly>
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	XXL
                        </td>
                        <td>
                        	<input type="number" name="input_xxl" min="0" max="10" value="0" style='border:none; text-align:center' onchange="calPrice()" />
                        </td>
                        <td>
                        	<input type="number" value="<?php echo $price; ?>" style='border:none; text-align:center' readonly>
                        </td>
                        <td>
                        	<input type="text" name="total_xxl" style='border:none; text-align:center' readonly>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="7" align="right">
                        	Total: RM 
                        </td>
                        <td>
                        	<input type="text" name="total" style='text-align:center' readonly>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="7" align="right">
                        	Delivery Charge: RM 
                        </td>
                        <td>
                        	<input type="text" name="delivery_charge" style='text-align:center' readonly>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="7" align="right">
                        	<b>Grand Total: RM</b> 
                        </td>
                        <td>
                        	<input type="text" name="grand_total" style='text-align:center' readonly>
                        </td>
                    </tr>
                </table>
            </fieldset>
          <div id="proceed">
          	<table width="1000">
            	<tr>
                	<td align="right">
                    	<input type="submit" name="next" value="Continue">&nbsp;
                        <input type="button" name="back" value="Back" onClick="window.history.back();";
                    </td>
                </tr>
            </table>
          </div>
        </div>
    </form>
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
