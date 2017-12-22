<?php
	session_start();
	include("dbconn.php");
		
	if(isset($_POST['next'])):
	{		
		$ref = $_POST['ch_id'];
		$name = $_POST['name'];
		$ic_num = $_POST['ic_num'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$method = $_POST['method'];
		$bank = $_POST['bank'];
		$delivery = $_POST['delivery'];
		$p_id = $_POST['p_id'];
		$p_name = $_POST['p_name'];
		$p_brand = $_POST['p_brand'];
		$price = $_POST['price'];
		$input_xs = $_POST['input_xs'];
		$input_s = $_POST['input_s'];
		$input_m = $_POST['input_m'];
		$input_l = $_POST['input_l'];
		$input_xl = $_POST['input_xl'];
		$input_xxl = $_POST['input_xxl'];
		$grand_total = $_POST['grand_total'];
?>		
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Checkout Summary</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
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
					<a class="link" href="login.php" style="text-decoration:none">Hi, Guest[Login]</a>
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
 <div id="aboutUsTitle"> <!-- malas nk tukar -->
 	<h1>Checkout Summary</h1>
 </div>
 <div id="aboutUsContent">
 	<div id="summaryTable">
    	<form method="post" action="payment.php">   
        	<fieldset>
            <legend align="center">Summary</legend>
        	<table border="0" width="800" align="center">
            	<tr>
                	<td colspan="2" align="right" bgcolor="#F18A54">
                    	Checkout ID: <input name="ch_id" type="text" size="4" value="<?php echo $ref; ?>" style='border:none; background: transparent;' readonly> 
                    </td>
                </tr>
            	<tr>
                	<td>
                    	Name: 
                    </td>
                    <td>
                    	<input type="text" name="name" value="<?php echo $name; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	IC Number: 
                    </td>
                    <td>
                    	<input type="text" name="ic_num" value="<?php echo $ic_num; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Contact: 
                    </td>
                    <td>
                    	<input type="text" name="contact" value="<?php echo $contact; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Email: 
                    </td>
                    <td>
                    	<input type="email" name="email" value="<?php echo $email; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Address: 
                    </td>
                    <td>
                    	<textarea name="address" style='border:none' cols="30" rows="5" readonly><?php echo $address; ?></textarea>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Payment Method: 
                    </td>
                    <td>
                    	<input name="method" type="text" value="<?php echo $method; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Bank Name: 
                    </td>
                    <td>
                    	<input name="bank" type="text" value="<?php echo $bank; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Delivery Method: 
                    </td>
                    <td>
                    	<input name="delivery" type="text" value="<?php echo $delivery; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Product Name: 
                    </td>
                    <td>
                    	<input name="p_name" type="text" value="<?php echo $p_name; ?>" style='border:none' readonly>
                        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                    </td>
                </tr>
                <tr>
                	<td>
                    	Product Brand: 
                    </td>
                    <td>
                    	<input name="brand" type="text" value="<?php echo $p_brand; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Price per Item: RM
                    </td>
                    <td>
                    	<input name="price" type="number" value="<?php echo $price; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Quantity: 
                    </td>
                    <td>
                    	XS: <input name="xs" type="text" value="<?php echo $input_xs; ?>" size="2" style='border:none' readonly>
                        S: <input name="s" type="text" value="<?php echo $input_s; ?>" size="2" style='border:none' readonly>
                        M: <input name="m" type="text" value="<?php echo $input_m; ?>" size="2" style='border:none' readonly>
                        L: <input name="l" type="text" value="<?php echo $input_l; ?>" size="2" style='border:none' readonly>
                        XL: <input name="xl" type="text" value="<?php echo $input_xl; ?>" size="2" style='border:none' readonly>
                        XXL: <input name="xxl" type="text" value="<?php echo $input_xxl; ?>" size="2" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td>
                    	Grand Total: RM
                    </td>
                    <td>
                    	<input name="grand_total" type="number" value="<?php echo $grand_total; ?>" style='border:none' readonly>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center"  bgcolor="#F18A54">
            			<input type="submit" name="continue" value="Proceed"> &nbsp; <input type="button" name="back" value="Back" onClick="window.history.back();"
                    </td>
                </tr>
              </table>
            </fieldset>
        </form>
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
	}
	endif;
	
	mysqli_close($dbconn);
?>