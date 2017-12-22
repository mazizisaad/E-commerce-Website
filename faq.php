<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>FAQ</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery/smoothscroll.js"></script>
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
<div id="faqTitle">
 	<h1 id="faq">Frequently Ask Question</h1>
 </div>
 <div id="faqContent">
   <div id="list_nav">
   	<ul>
    	<li><a href="#ans1" class="smoothScroll">Question 1</a></li>
        <li><a href="#ans2" class="smoothScroll">Question 2</a></li>
        <li><a href="#ans3" class="smoothScroll">Question 3</a></li>
        <li><a href="#ans4" class="smoothScroll">Question 4</a></li>
        <li><a href="#ans5" class="smoothScroll">Question 5</a></li>
        <li><a href="#ans6" class="smoothScroll">Question 6</a></li>
        <li><a href="#ans7" class="smoothScroll">Question 7</a></li>
    </ul>
   </div>
   <div id="faqQuestion">
   	<h2 id="ans1" style=""><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
    <h2 id="ans2"><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
    <h2 id="ans3"><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
    <h2 id="ans4"><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
    <h2 id="ans5"><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
     <h2 id="ans6"><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
     <h2 id="ans7"><img src="button/right.png" width="20px" height="20px"/>Answer</h2>
    	<p>Lorem ipsum</p>
        <a href="#faq" class="smoothScroll">Go to top</a>
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
