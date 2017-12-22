<!doctype html>
<?php
	session_start();
	include("dbconn.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Goods Return Policy</title>
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
<div id="goodsReturnPolicyTitle">
 	<h1 id="goodsTitle">Goods Return Policy</h1>
    <ul>
    	<li><a href="#goodsPolicy" class="smoothScroll">Policy/</a></li>
        <li><a href="#goodsRefund" class="smoothScroll">Refund</a></li>

    </ul>
 </div>
 <div id="goodsReturnPolicyContent">
 	<h2 id="goodsPolicy"><img src="button/right.png" width="20px" height="20px"/>Goods Return Policy</h2>
    	<p><dt id="faq-return-ans"><a><span><b>How do I return an item?</b></span></a></dt>
                            <dd class="faq-content">
                                <p>Before returning an item, check our <a id="anchor"><strong>Tempatan Brand Outlets</strong></a> to make sure your item is eligible for return.</p>
                                <p>If your return meets all requirements, return can be initiated via the Online Returns Form (recommended for a faster processing). If you are unable to access the Online Return Form, contact our <strong>Customer Service</strong>. We are happy to help you with your return.</p>
                                <p>Please follow the  steps below:<br/>
                                    <img src="image/1.jpg" width="50%" />
                                </p>
                                <p style="font-size:10px;">** If you are unable to print the form, please write the RA code on the physical box of the product. The RA code can be found on the Online Return Form (format-RNXXXXXXXXXXXX).</p>
                                <p><strong>Note</strong>: You can ship your return item using any courier service and your courier fee will be reimbursed if is a valid return (Please refer to our return policy). 
                               
                                <p>You can also track your return status via the Order Tracking Tool.</p>              
                                <div id="lower-div"></div>      
                            </dd>

                            <!-- Question -->
                            <dt id="faq-return-ans"><a><span><b>What is the Tempatan Brand Outlets Returns policy?</b></span></a></dt>
                            <dd class="faq-content">
                                <p>All items sold on Tempatan Brand Outlets are covered under the <strong>100% Buyer Protection</strong> and/or <strong>Satisfaction Guaranteed</strong>.  The logo(s) of the return policy for each item can be found  on the item’s page</p>
                            <table align="left" class="font-table">
                                
                                <tr>
                                    <td style="border-top:0px solid; border-bottom:0px solid; border-left:0px solid;"> </td>
                                    <td align="center"><strong>100% Buyer Protection (BP)</strong></td>
                                    <td align="center" class="SG-resize"><strong>Satisfaction Guaranteed (SG)</strong></td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px solid; border-bottom:0px solid; border-left:0px solid;" title="Calendar days from date of delivery">Coverage of return policy</td>
                                    <td align="center">7 calendar days</td>
                                    <td align="center">14 calendar days</td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px solid; border-bottom:0px solid; border-left:0px solid;">Change of mind</td>
                                    <td align="center">Not Available</td>
                                    <td align="center">Available</td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px solid; border-bottom:0px solid; border-left:0px solid;">Money back guarantee</td>
                                    <td align="center">Yes</td>
                                    <td align="center">Yes</td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px solid; border-bottom:0px solid; border-left:0px solid;">Our verified-service of sellers</td>
                                    <td align="center">Yes</td>
                                    <td align="center">Yes</td>
                                </tr>
                            </table>
                            <br><br>
                            <p>Depending on the applied Return policy, you may return your item to us within 7 or 14 calendar days. Countdown starts from the date you received the item to the post stamp date on the return parcel.</p>
                            <br/><strong>Requirements for a valid return:</strong>
                            <ul>
                                <li>Proof of purchase (order number, tax invoice, etc)</li>
                                <li>Bank details in Return Form if original payment is made via iPay88</li>
                                <li>Include printed Return Form and Lazada Tax Invoice in each return package box</li>
                                <li>Reason for return has to be valid and return acceptance conditions met (check out below)</li>
                            </ul>
                            <p>Should there be any item damage due to our transportation, please contact our customer service within 24 hours for claim purposes.</p>                         
                            </dd>
                            
                            <!-- Question -->
                            <dt id="faq-trackreturn-ans"><a><span></span><b>For which reasons can I return an item?</b></span></a></dt>
                            <dd class="faq-content">
                                <p>You may want to return your item due to any of the following reasons:</p>
                                <p><strong style="color:#F00">x : Not Required | ✓: Required</strong></p>
                                <table width="100%" class="font-small" style="border:2px solid;">
                                    <tr align="center" valign="middle">
                                        <td rowspan="2" style="border-right:2px solid;" width="30%"><strong>Reasons for return</strong></td>
                                        <td colspan="5"><strong style="color:#F00">YOUR RETURN MUST BE : </strong></td>
                                    </tr>
                                    <tr align="center">
                                        <td title="For electronics items, they must not have been used or installed or had any data inputted."><strong>New condition</strong></td>
                                        <td title="Seal must not be opened and warranty not activated" width="22%"><strong>Sealed condition</strong></td>
                                        <td title="Complete set in its original packaging, including free gifts and accessories"><strong>Complete (free gifts, accessories, original packaging)</strong></td>
                                        <td title="Item and packaging must not be damaged"><strong>Not damaged</strong></td>
                                        <td><strong>Tags & labels attached</strong></td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" title="Received wrong product (e.g. wrong size or wrong colour)" style="border-right:2px solid;">Delivery - Wrong Product</td>
                                        <td>✓</td>
                                        <td>✓<br>
                                        <p>Product sealed should not be broken EXCEPT for item type that cannot be differentiated visually based on information provided on the box / packaging only</p>
                                        </td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Quality - Damaged Product</td>
                                        <td>x</td>
                                        <td>x</td>
                                        <td>✓</td>
                                        <td>x</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Quality - Defective</td>
                                        <td>x</td>
                                        <td>x</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Quality - Product Condition</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Delivery - Parts Missing</td>
                                        <td>✓</td>
                                        <td>x</td>
                                        <td>x</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Website - Incorrect Content</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Product - Does Not Fit (Not applicable to fashion items from overseas sellers)</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Customer - Change of Mind (not applicable for items from overseas)</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                    <tr align="center">
                                        <td align="left" style="border-right:2px solid;">Not As Expected</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                        <td>✓</td>
                                    </tr>
                                </table>
                                <br>
                                <p><strong>NOTE:</strong> In the unlikely event that your return does not meet requirement(s), our Customer Service will notify you before sending it back to you. In this instance, your return courier/postal fee will not be reimbursed. Returns are not applicable for all under garments due to hygiene purposes</p>
                            </dd>                       
                            
                            <!-- Question -->
                            <dt id="faq-returnafter14days-ans"><a><span><b>Can I return an item after the return policy coverage  days?</b></span></a></dt>
                            <dd class="faq-content">
                                <p>Your item cannot be returned after 7 calendar days for items under 100% Buyer Protection and 14 calendar days for items under Tempatan Brand Outlets’ Satisfaction Guaranteed.</p>
                                <p>After this period, if the item is covered by a manufacturer’s warranty, please contact the manufacturer directly for assistance and return.</p>
                                <p>You can also find the warranty center contact information for your item on the warranty card in  the package.</p>
                                
                            </dd>
                            
                            <!-- Question -->
                            <dt id="faq-trackreturn-ans"><a><span><b>How do I track my return status?</b></span></a></dt>
                            <dd class="faq-content">
                                <p>You can track return status using the tracking number provided to you by our logistics partner or via our <a href="http://www.lazada.com.my/order-tracking" target="_blank">Order Tracking tool.</a></p>
                            </dd>
                            
                            <!-- Question -->
                            <dt id="faq-qualityevaluation-ans"><a><span><b>How long is the quality evaluation process</b>?</span></a></dt>
                            <dd class="faq-content">
                                <p>Replacement process only begins after we have completed evaluating your returned item. 
                                <p>This quality evaluation process may take up to 2 - 3 business days.</p>
                            </dd>
                            
                            <!-- Question -->
                            <dt id="faq-wherereturn-ans"><a><span><b>Where to return?</b></span></a></dt>
                            <dd class="faq-content">
                                <p>Kindly have your returns shipped to our <strong> NEW Returns Mailing Address:</strong></strong></p>
                                <p><strong>Tempatan Brand Outlets Sdn. Bhd.</p>
                                <p>Returns department</p>
                                <p>Lot 2611 & 2612, Jalan Subang 7</p>
                                <p>Kompleks PKNS Shah Alam, Selangor</p>
                                <p>Malaysia</strong></p>
                                 
</p>
        <a href="#goodsTitle" class="smoothScroll">Go to top</a>
    <h2 id="goodsRefund"><img src="button/right.png" width="20px" height="20px"/>Goods Refund</h2>
    	<dt id="faq-refund-ans"><a><span><p>How soon will I receive my refund?</p></span></a></dt>
	<dd class="faq-content">
	<p>Refund can be processed in case of return or cancellation. For your convenience, we offer different refund options for you to choose from, basing on your payment method at the time of purchase.</p>
	<p>We will update you via email once your refund has been initiated. You will be able to see the credited amount on your statement <strong>as per the lead time listed in the table below for each of the refund channels</strong>.</p>
	<p>If the refund does not arrive after the next two months’ statements, please contact your issuing bank or party directly for support.</p>
	<table border="1">
	<tr>
	<th width="262">Payment Method (at the time of purchase)</th>
	<th width="244">Refund Method</th>
	<th width="264">Processing time (after return has been evaluated/cancellation has been done)</th>
	<th width="264">Bank processing Time (after refund has been processed)
	</tr>
	<tr>
	<td>Credit card/Debit card</td>
	<td>Credit card</td>
	<td>1 - 3 working days</td>
	<td>5 - 15 working days (depending on your bank)</td>
	</tr>
	<tr>
	<tr>
	<tr>
	<td>Bank transfer</td>
	<td>Ipay88 reversal refund</td>
	<td>1 - 3 working days</td>
	<td>5 – 14 working days (depending on your bank)</td>
	</tr>
	</table>
	<br> 
	<p>Note: Any postage fee incurred during the returns, please send us your postage fee with receipt for us to refund to you. Processing time will be the same as bank transfer method.</p>
	</dd>

        <a href="#goodsTitle" class="smoothScroll">Go to top</a>

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
