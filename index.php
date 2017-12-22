<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Tempatan Brand Outlets</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<script type="text/javascript" src="animate.css"></script>
<script type="text/javascript" src="jquery/jquery-1.12.2.js"></script>
<script type="text/javascript" src="http://malsup.github.io/jquery.cycle.all.js"></script>
<script type="text/javascript">
$('#trending_slider').cycle({ 
    fx:     'scrollHorz', 
    speed:  'slow',  
    next:   '#next', 
    prev:   '#prev' 
});
</script>
<script type="text/javascript">
	$('#header_pic').cycle({ 
    fx:    'fade', 
    pause:  1 
});
</script>

</head>
<body>
<div id="logo"> <img src="image/logo.png" width="180" height="180" alt=""/> </div>
<div id="wrapper">
  <div id="nav">
  	<div id="upper">
   	  <div id="login">
      	<ul>
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
<div id="header">
 	<div id="header_pic">
   	  <img src="image/slider1.jpg" width="1070" height="500" alt=""/>
      <img src="image/slider2.jpg" width="1070" height="500" alt=""/>
      <img src="image/slider3.jpg" width="1070" height="500" alt=""/>
    </div>
 </div>
 <div id="category">
 	<div id="category_title">
    	<img src="image/category.png" width="200" height="72" alt=""/> </div>
    <div id="women">
    	<a href="women.php"><img src="image/women.jpg" width="580" height="707" title="Women Department"/></a>
    </div>
	<div id="men">
    	<a href="men.php"><img src="image/men.jpg" width="500" height="270" title="Men Department"/></a> 
    </div>
    <div id="kids"> 
    	<a href="kids.php"><img src="image/kids.jpg" width="500" height="270" title="Kids Department"/></a>
    </div>
    <div id="LocalTrending">
    	<h1>Local & Trending</h1>
        <p>New shirts and fresh designs is our priority. Our shirt is designed by fantastic local designer who want to share and express their ideas about
        our country. You will never regret it. Grab one now!</p>
    </div>
 </div>
 <div id="trending">
 	<div id="trending_title">
   		<img src="image/hot.png" width="300" height="72" alt=""/>    
    </div>
    <div id="trending_container">
   	  <div class="controller" id="prev"></div>
      <div id="trending_slider">
   	  	<img src="image/trending1.jpg" width="1070" height="500" alt=""/> 
   	  	<img src="image/trending2.jpg" width="1070" height="500" alt=""/> 
        <img src="image/trending3.jpg" width="1070" height="500" alt=""/> 
       </div>
      <div class="controller" id="next"></div>
    </div>
 </div>
 <div id="company">
 	<div id="company_list">
    	<ul>
        	<li><img src="image/kukubesi.png" width="100" height="50" alt="Kukubesi"/></li>
            <li><img src="image/abstrax.png" width="100" height="50" alt="Abstrax"/></li>
            <li><img src="image/legit.png" width="100" height="50" alt="Legit"/></li>
            <li><img src="image/akudesign.png" width="100" height="50" alt="Akudesign"/></li>
            <li><img src="image/rare.png" width="100" height="50" alt=""/></li>
        </ul>
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
            <table>
            	<tr>
                	<td><a href=""><img src="button/fb.png" width="30" height="30" title="Tempatan Brands Outlet Facebook page"/></a></td>
                    <td><a href=""><img src="button/twitter.png" width="30" height="30" title="Tempatan Brands Outlet Twitter"/></a></td>
                    <td><a href=""><img src="button/instagram.png" width="30" height="30" title="Tempatan Brands Outlet Instagram"/></a></td>
                </tr>
            </table>
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
                <li style=""><a href="customerService.php">Customer Service</a></li>
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
                <input type="email" name="email" placeholder="Place Your Email Here" autocomplete="off" required>
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
