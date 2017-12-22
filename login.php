<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Login and Sign Up</title>
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
<div id="loginAndSignUpTitle">
 	<h1 id="loginTitle">Login and Sign Up</h1>
 </div>
 <div id="loginAndSignUpContent">
 	<div id="loginSide">
    	<table width="500" border="0">
          <form name="login" method="post" action="loginRegister.php">
        	<tr>
            	<td colspan="2" height="70"></td>
            </tr> 
            <tr>
            	<td width="200" height="20" align="right">Email: </td>
                <td width="300">
                	<input type="email" name="l_email" placeholder="Email" required>
                </td>
            </tr>
            <tr>
            	<td width="200" height="20" align="right">Password: </td>
                <td width="300"><input type="password" name="l_password" placeholder="Password" required></td>
            </tr>
            <tr>
            	<td colspan="2" height="20">
                	<input type="submit" name="login" value="Sign In">&nbsp;<input type="reset" value="Clear">
                </td>
            </tr>
          </form>
		</table>
    </div>
    <div id="signUpSide">
    	<form name="signUp" method="post" action="loginRegister.php">
        	<table width="500" border="0">
            	<tr>
                	<td colspan="2" height="70"></td>
                </tr>
                <tr>
                	<td width="200" height="20" align="right">Name: </td>
                    <td width="300" align="center"><input type="text" name="reg_name" placeholder="Name" autocomplete="off" required></td>
                </tr>
                <tr>
                	<td width="200" height="20" align="right">Email: </td>
                    <td width="300" align="center"><input type="email" name="reg_email" placeholder="Email" autocomplete="off" required></td>
                </tr>
                <tr>
                	<td width="200" height="20" align="right">Password: </td>
                    <td width="300" align="center"><input type="password" name="reg_password" placeholder="Password" required></td>
                </tr>
                <tr>
                	<td width="200" height="20" align="right">State: </td>
                    <td width="300" align="center">
                    	<select name="reg_state">
                        	<option value="None">Pick Your State</option>
                        	<option value="Kuala Lumpur">Kuala Lumpur</option>
                            <option value="Labuan">Labuan</option>
                            <option value="Putrajaya">Putrajaya</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Melaka">Melaka</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Pulau Pinang">Pulau Pinang</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                        </select>
                    </td>
                </tr>
                <tr>
            	<td colspan="2" height="20" align="center">
                	<input type="submit" name="register" value="Register">&nbsp;<input type="reset" name="clear" value="Clear">
                </td>
            </tr>
			</table>
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
	mysqli_close($dbconn);
?>
