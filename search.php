<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Search</title>
<link rel="stylesheet" href="jquery/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="jquery/lightbox.js"></script>
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
        	<input type="text" name="search" placeholder="Search" required>
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
<div id="searchTitle">
 	<h1>Search</h1>
 </div>
 <div id="searchContent">
 	<?php 
		if(isset($_POST['search_button']))
		{
			$search = $_POST['search'];
			
			$sql0 = "SELECT * FROM product WHERE p_name like '%" .  $search . "%' OR p_brand like '%" . $search . "%' OR p_type like '%" . $search . "%' OR p_note like '%" . $search . "%' ORDER BY p_type, p_name, p_brand ";
			$query = mysqli_query($dbconn, $sql0);
			$row = mysqli_num_rows($query);
			
			while($data=mysqli_fetch_array($query))
			{
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
							echo "<td>Type: " .$data['p_type'] . "</td>";
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
			}			
	?>
    </div>
</div>
</body>
</html>
<?php
	mysqli_close($dbconn);
?>
