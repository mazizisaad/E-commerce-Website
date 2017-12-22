<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Women</title>
<link rel="stylesheet" href="jquery/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="jquery/lightbox.js"></script>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery/smoothscroll.js"></script>
<script type="text/javascript">
	function blinker() {
    $('.blink_me').fadeOut(500);
    $('.blink_me').fadeIn(500);
	}
	setInterval(blinker, 1000);
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
<div id="womenTitle">
 	<h1 id="womenDept">Women Department</h1>
    <ul>
    	<li><a href="#kukubesi" class="smoothScroll">Kuku Besi/</a></li>
    	<li><a href="#abstrax" class="smoothScroll">Abstrax/</a></li>
        <li><a href="#legit" class="smoothScroll">Legit/</a></li>
        <li><a href="#akudesign" class="smoothScroll">Akudesign/</a></li>
        <li><a href="#rare" class="smoothScroll">Rare</a></li>
    </ul>
 </div>
 <div id="womenContent">
   <div id="kukubesiClothing">
     <h2 id="kukubesi"><img src="button/right.png" width="20px" height="20px"/>Empayar Kukubesi Clothing</h2>
     <div id="items">
<?php
	 $sql0 = "SELECT * FROM product WHERE p_brand = 'Empayar Kuku Besi' AND p_type = 'Women' ORDER BY id";
		$row0 = mysqli_query($dbconn, $sql0);
		while($data = mysqli_fetch_array($row0)){
		echo "<div id='productTable'>";	
			echo "<form action=addToCart.php method=post>";
		echo "<table align='center' cellpadding='5'>";
			    echo "<tr>";
					echo "<td colspan='8'> " .'<a href="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" rel="lightbox"/>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="200" height="250">' . " </td>";
					echo "<td>";
					echo "	<table>";
						   echo "<tr align='center'>";
							if($data['p_note'] == "New Arrival"):
								echo "<td><h1><font color=#1B9CF9>New Arrival</font></h1></td>";
							elseif($data['p_note'] == "Hot Selling"):
								echo "<td class=blink_me><h1><font color=#F01414>Hot Selling</font></h1></td";
							elseif($data['p_note'] == "Trending Item"):
								echo "<td class=blink_me><h1><font color=#56DB2F>Trending Item</font></h1></td";
							elseif($data['p_note'] == "Sales"):
								echo "<td class=blink_me><h1><font color=#FCED1D>Sales</font></h1></td";
							else:
								echo " ";
							endif;
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product ID: "
									. "<input type=text name=prod_id readonly style='border:none;' value=" .$data['id'] . 
								 " </td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Brand Name: " .$data['p_brand'] .  
								 "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product Name: " .$data['p_name'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Size: " .$data['p_size'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Price: RM " .$data['p_price'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td><input type=submit name=add value='Add To Cart'></td>";
						   echo "</tr>";						   
						echo "</table>";
					echo "</td>";
				echo "</tr>";
					echo "</tr>";
					echo "</form>";
					echo "</table>";
					echo "</div>";
				} 
	?>
    </div>
     <br>
     <a href="#womenDept" class="smoothScroll">Go to top</a>
   </div>
   <div id="AbstraxClothing">
     <h2 id="abstrax"><img src="button/right.png" width="20px" height="20px"/>Abstrax Clothing</h2>
     <div id="items">
     <?php
	 $sql0 = "SELECT * FROM product WHERE p_brand = 'Abstrax' AND p_type = 'Women' ORDER BY id";
		$row0 = mysqli_query($dbconn, $sql0);
		while($data = mysqli_fetch_array($row0)){
		echo "<div id='productTable'>";	
			echo "<form action=addToCart.php method=post>";
		echo "<table align='center' cellpadding='5'>";
			    echo "<tr>";
					echo "<td colspan='8'> ".'<a href="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" rel="lightbox"/>' .'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="200" height="250">' . " </td>";
					echo "<td>";
					echo "	<table>";
						   echo "<tr align='center'>";
							if($data['p_note'] == "New Arrival"):
								echo "<td><h1><font color=#1B9CF9>New Arrival</font></h1></td>";
							elseif($data['p_note'] == "Hot Selling"):
								echo "<td class=blink_me><h1><font color=#F01414>Hot Selling</font></h1></td";
							elseif($data['p_note'] == "Trending Item"):
								echo "<td class=blink_me><h1><font color=#56DB2F>Trending Item</font></h1></td";
							elseif($data['p_note'] == "Sales"):
								echo "<td class=blink_me><h1><font color=#FCED1D>Sales</font></h1></td";
							else:
								echo " ";
							endif;
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product ID: "
									. "<input type=text name=prod_id readonly style='border:none;' value=" .$data['id'] . 
								 " </td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Brand Name: " .$data['p_brand'] .  
								 "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product Name: " .$data['p_name'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Size: " .$data['p_size'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Price: RM " .$data['p_price'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td><input type=submit name=add value='Add To Cart'></td>";
						   echo "</tr>";						   
						echo "</table>";
					echo "</td>";
				echo "</tr>";
					echo "</tr>";
					echo "</form>";
					echo "</table>";
					echo "</div>";
				} 
	?>
    </div>
    <br>
     <a href="#womenDept" class="smoothScroll">Go to top</a>
   </div>
   <div id="legitClothing">
     <h2 id="legit"><img src="button/right.png" width="20px" height="20px"/>Legit Clothing</h2>
     <div id="items">
     <?php
	 $sql0 = "SELECT * FROM product WHERE p_brand = 'Legit' AND p_type = 'Women' ORDER BY id";
		$row0 = mysqli_query($dbconn, $sql0);
		while($data = mysqli_fetch_array($row0)){
		echo "<div id='productTable'>";	
			echo "<form action=addToCart.php method=post>";
		echo "<table align='center' cellpadding='5'>";
			    echo "<tr>";
					echo "<td colspan='8'> " .'<a href="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" rel="lightbox"/>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="200" height="250">' . " </td>";
					echo "<td>";
					echo "	<table>";
						   echo "<tr align='center'>";
							if($data['p_note'] == "New Arrival"):
								echo "<td><h1><font color=#1B9CF9>New Arrival</font></h1></td>";
							elseif($data['p_note'] == "Hot Selling"):
								echo "<td class=blink_me><h1><font color=#F01414>Hot Selling</font></h1></td";
							elseif($data['p_note'] == "Trending Item"):
								echo "<td class=blink_me><h1><font color=#56DB2F>Trending Item</font></h1></td";
							elseif($data['p_note'] == "Sales"):
								echo "<td class=blink_me><h1><font color=#FCED1D>Sales</font></h1></td";
							else:
								echo " ";
							endif;
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product ID: "
									. "<input type=text name=prod_id readonly style='border:none;' value=" .$data['id'] . 
								 " </td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Brand Name: " .$data['p_brand'] .  
								 "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product Name: " .$data['p_name'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Size: " .$data['p_size'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Price: RM " .$data['p_price'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td><input type=submit name=add value='Add To Cart'></td>";
						   echo "</tr>";						   
						echo "</table>";
					echo "</td>";
				echo "</tr>";
					echo "</tr>";
					echo "</form>";
					echo "</table>";
					echo "</div>";
				} 
	?>
    </div>
    <br>
     <a href="#womenDept" class="smoothScroll">Go to top</a>
   </div>
   <div id="akudesignClothing">
     <h2 id="akudesign"><img src="button/right.png" width="20px" height="20px"/>Akudesign Clothing</h2>
     <div id="items">
     <?php
	 $sql0 = "SELECT * FROM product WHERE p_brand = 'Akudesign' AND p_type = 'Women' ORDER BY id";
		$row0 = mysqli_query($dbconn, $sql0);
		while($data = mysqli_fetch_array($row0)){
		echo "<div id='productTable'>";	
			echo "<form action=addToCart.php method=post>";
		echo "<table align='center' cellpadding='5'>";
			    echo "<tr>";
					echo "<td colspan='8'> " .'<a href="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" rel="lightbox"/>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="200" height="250">' . " </td>";
					echo "<td>";
					echo "	<table>";
						   echo "<tr align='center'>";
							if($data['p_note'] == "New Arrival"):
								echo "<td><h1><font color=#1B9CF9>New Arrival</font></h1></td>";
							elseif($data['p_note'] == "Hot Selling"):
								echo "<td class=blink_me><h1><font color=#F01414>Hot Selling</font></h1></td";
							elseif($data['p_note'] == "Trending Item"):
								echo "<td class=blink_me><h1><font color=#56DB2F>Trending Item</font></h1></td";
							elseif($data['p_note'] == "Sales"):
								echo "<td class=blink_me><h1><font color=#FCED1D>Sales</font></h1></td";
							else:
								echo " ";
							endif;
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product ID: "
									. "<input type=text name=prod_id readonly style='border:none;' value=" .$data['id'] . 
								 " </td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Brand Name: " .$data['p_brand'] .  
								 "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product Name: " .$data['p_name'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Size: " .$data['p_size'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Price: RM " .$data['p_price'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td><input type=submit name=add value='Add To Cart'></td>";
						   echo "</tr>";						   
						echo "</table>";
					echo "</td>";
				echo "</tr>";
					echo "</tr>";
					echo "</form>";
					echo "</table>";
					echo "</div>";
				} 
	?>
    </div>
    <br>	
     <a href="#womenDept" class="smoothScroll">Go to top</a>
   </div>
   <div id="rareClothing">
     <h2 id="rare"><img src="button/right.png" width="20px" height="20px"/>RARE Clothing</h2>
     <div id="items">
     <?php
	 $sql0 = "SELECT * FROM product WHERE p_brand = 'Rare' AND p_type = 'Women' ORDER BY id";
		$row0 = mysqli_query($dbconn, $sql0);
		while($data = mysqli_fetch_array($row0)){
		echo "<div id='productTable'>";	
			echo "<form action=addToCart.php method=post>";
		echo "<table align='center' cellpadding='5'>";
			    echo "<tr>";
					echo "<td colspan='8'> " .'<a href="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" rel="lightbox"/>'.'<img src="data:image/jpeg;base64,'.base64_encode($data['p_image']).'" width="200" height="250">' . " </td>";
					echo "<td>";
					echo "	<table>";
						   echo "<tr align='center'>";
							if($data['p_note'] == "New Arrival"):
								echo "<td><h1><font color=#1B9CF9>New Arrival</font></h1></td>";
							elseif($data['p_note'] == "Hot Selling"):
								echo "<td class=blink_me><h1><font color=#F01414>Hot Selling</font></h1></td";
							elseif($data['p_note'] == "Trending Item"):
								echo "<td class=blink_me><h1><font color=#56DB2F>Trending Item</font></h1></td";
							elseif($data['p_note'] == "Sales"):
								echo "<td class=blink_me><h1><font color=#FCED1D>Sales</font></h1></td";
							else:
								echo " ";
							endif;
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product ID: "
									. "<input type=text name=prod_id readonly style='border:none;' value=" .$data['id'] . 
								 " </td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Brand Name: " .$data['p_brand'] .  
								 "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Product Name: " .$data['p_name'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Size: " .$data['p_size'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td>Price: RM " .$data['p_price'] . "</td>";
						   echo "</tr>";
						   echo "<tr>";
							echo "<td><input type=submit name=add value='Add To Cart'></td>";
						   echo "</tr>";						   
						echo "</table>";
					echo "</td>";
				echo "</tr>";
					echo "</tr>";
					echo "</form>";
					echo "</table>";
					echo "</div>";
				} 
	?>
   </div>
    <br>
     <a href="#womenDept" class="smoothScroll">Go to top</a>
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
