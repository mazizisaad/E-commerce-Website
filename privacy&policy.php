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
 	<h1>Privacy Policy</h1>
 </div>

   	<h1>Privacy Policy</h1>
<br/>
<h3>We take our customer’s privacy seriously and we will only collect, record, hold, store and use your personal information as outlined below.</h3>
<p>Data protection is a matter of trust and your privacy is important to us. We shall therefore only process your name and other information which relates to you in the manner set out in this Privacy Policy. We will only collect information where it is necessary for us to do so and we will only collect information if it is relevant to our dealings with you. We will only keep your information for as long as we are either required to by law or as is relevant for the purposes for which it was collected.</p>
<p>You can visit our website and browse without having to provide your personal details. During your visit to our website, you may remain anonymous and at no time would we be able to identify you unless you have registered an account with us on our website and have logged on with your user name and password.</p>
</p>If you have any comments or suggestions, we would be pleased to receive them at our address or by contacting our <u>Customer Service</u></a>.</p>
<br/>
<div class="left_col">
</div>

<div class="right_col">

<h3 id="introduction">Collection of Personal Information</h3>
<p>We does not sell, share or trade customer’s personal information collected online with third parties.</p>
<p>Personal information collected online will only be disclosed within our corporate group and to third parties for the purposes for which it was collected, as authorised and consented by you.  For example, the conduct of a sales transaction of a product of your choice on our website.</p>
<p>When you register an account, the personal information we collect may include your:</p>
<ul>
<li>Name</li>
<li>Delivery Address</li>
<li>Email Address</li>
<li>Date of Birth (Optional)</li>
<li>Gender (Optional)</li>
</ul>
<p>When you make a purchase on the website, the additional personal information we collect may include:</p>
<ul>
<li>Telephone Number</li>
<li>Mobile Number</li>
<li>Delivery Address</li>
<li>Credit card details (optional) and payment methodology</li>
</ul>

<p>The mandatory personal information we collect from you will be used and or shared within our corporate group and to third parties for one or the following purposes:</p>
<ul>
<li>To deliver products that you purchase from our website. For example, we may pass your name and address on to a third party such as our courier service company or supplier of choice in order to make delivery of the product to you;</li>
<li>To inform and update you on the delivery of the product and for customer support purposes;</li>
<li>To provide you with relevant product information such as SKUs;</li>
<li>To process your orders and to provide you with the services and information offered through our website and which you may request;</li>
<li>To allow us to administer your registered account with us;</li>
<li>To verify and carry out financial transactions in relation to payments you may make online.  For example, payments that you make through our website will be processed by our appointed agent. Disclosure to these data processing agents such as that of our appointed agent in this context is necessary for the purpose of conducting the sales transaction that you have opted for.  </li>
<li>The non-mandatory personal information such as date of birth and gender are used to carry out research/es on our users’ demographics and for us to send you suggestion or information in the form of promotional emails which we think you may find useful, thereby, enhancing your experience when you visit our website.  By providing us these non-mandatory personal information, you are deemed to have consented to be part of our research/es and to receiving suggestions or information as outlined above.</li>
</ul>

<p><u>Subscription to our marketing and promotional materials</u> </p>
<p>In addition to the personal information outlined above, when you register an account with us, you shall be asked if you would like to subscribe to our marketing and or promotional materials from time to time. These marketing and or promotional materials may come from within our corporate group wholly or through affiliation with third parties. If you choose to so subscribe, you are deemed to have consented to us processing within our corporate group and or third parties your personal information for this purpose. You can always choose to unsubscribe from marketing information at any time by opting for the unsubscribe function within the electronic marketing material. </p>
<p><u>Accessing Actual Orders</u> </p>
<p> Your actual order details may be stored with us but for security reasons, cannot be retrieved directly by us. However, you may access this information by logging into your account on the website. Here, you can view the details of your orders that have been completed, those which are open and those which are to be dispatched as well as administer your address details, bank details and any newsletter to which you may have subscribed. You undertake to treat the personal access data confidentially and not make it available to unauthorised third parties. We cannot assume any liability for any misuse of passwords unless this misuse is through our own fault. </p>
<h3 id="status">Accessing and Updating Your Personal Information</h3>
<p>You can access and update your personal information anytime by accessing your account on our website.</p>

<p>The tracking we implemented is based on Display Advertising (e.g., Remarketing, Google Display Network Impression Reporting, the DoubleClick Campaign Manager integration, or Google Analytics Demographics and Interest Reporting) and can collect information such as age, gender, interests and interaction with ads impressions.</p>

<p>Using the <a href="https://www.google.com/settings/ads">Ads Settings</a>, visitors can opt-out of Google Analytics for Display Advertising and customize Google Display Network ads.</p>

<p>Tempatan Brands Outlet and third-party vendors, including Google, use first-party cookies (such as the Google Analytics cookie) and third-party cookies (such as the DoubleClick cookie) together to inform, optimize, and serve ads based on someone's past visits to your website and across the Internet</p>

<h3 id="effect">Security of Your Personal Information</h3>
<p>We ensures that all information collected will be safely and securely stored. We protect your personal information by:</p>
<ul>
<li> Allowing access to personal information only via passwords; </li>
<li> Maintaining technology products to prevent unauthorised computer access; and </li>
<li> Securely destroying your personal information when it is no longer needed for our record retention purposes </li>
</ul>
<p>Tempatan Brands Outlet uses 128-bit SSL (Secure Sockets Layer) encryption technology when processing your financial details. 128-bit SSL encryption is approximated to take at least one trillion years to break, and is the industry standard.</p>

<h3 id="how">Disclosure of Personal Information</h3>
<p> We will not share your information with any other organisations other than our corporate group and those third parties directly related to and necessary for the purchase of products, delivery of the same and purpose for which you have authorised. In exceptional circumstances, Tempatan Brands Outlet may be required to disclose personal information, such as when there are grounds to believe that the disclosure is necessary to prevent a threat to life or health, or required by the law. Tempatan Brands Outlet is committed to complying with the Personal Data Protection Act 2010,in particular, its policies as well as corresponding guidelines and orders. </p>
<p>If you believe that your privacy has been breached by Tempatan Brands Outlet please contact <u>Customer Service</u></a> and we will resolve the issue.</p>

<h3 id="delivery">Collection of Computer Data not necessarily Personal Information</h3>
<p> When you visit Tempatan Brands Outlet, our company servers will automatically record information that your browser sends whenever you visit a website. This data may include: </p>
<ul>
  <li> Your computer's IP address </li>
  <li> Browser type </li>
  <li> Webpage you were visiting before you came to our website </li>
  <li> The pages within that you visit </li>
  <li> The time spent on those pages, items and information searched for on our site, access times and dates, and other statistics </li>
  </ul>
<p> This information is collected for analysis and evaluation in order to help us improve our website and the services and products we provide. This data will not be used in association with any other personal information. </p>

<h3 id="cancellation">Changes to the Privacy Policy</h3>
<p> We reserves the right to modify and change the Privacy Policy at any time. Any changes to this policy will be published on our website. You should check this Policy each time you access our website so as to be aware of the most recent applicable version of the Policy. </p>
<h3 id="complaints">Complaints about breaches of privacy</h3>
<p>If you are not satisfied with the way in which we handle your enquiry or complaint, please don't hesitate to contact <a href="http://www.lazada.com.my/contact"><u>Customer Service</u></a>.</p>
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
