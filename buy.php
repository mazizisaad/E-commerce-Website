<?php
	include("dbconn.php");
	
	if(isset($_POST['buy'])):
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
		$p_brand = $_POST['brand'];
		$price = $_POST['price'];
		$input_xs = $_POST['xs'];
		$input_s = $_POST['s'];
		$input_m = $_POST['m'];
		$input_l = $_POST['l'];
		$input_xl = $_POST['xl'];
		$input_xxl = $_POST['xxl'];
		$grand_total = $_POST['grand_total'];
		
		$cc_name = $_POST['b_name'];
		$cc_num = $_POST['b_card_num'];
		$cc_cvc = $_POST['b_cvc'];
		$cc_expirate_month = $_POST['b_month'];
		$cc_expirate_year = $_POST['b_year'];
		
		$cc_resit_num = $_POST['b_resit'];
		
		$cc_password = $_POST['b_password'];
		
		$tracking = "null";
		
		date_default_timezone_set("asia/Kuala_Lumpur");
		$pay_date = date('Y/m/d H:i:s');
		$delivery_date = "null";
		
		$sql0 = "INSERT INTO payment VALUES ('". $ref ."','". $name ."','". $ic_num ."','". $contact ."','". $email ."','". $address ."','". $method ."','". $bank ."','". $delivery ."','". $p_id ."','". $p_name ."','". $p_brand ."','". $price ."','". $input_xs ."','". $input_s ."','". $input_m ."','". $input_l ."','". $input_xl ."','". $input_xxl ."','". $grand_total ."','". $cc_name ."','". $cc_num ."','". $cc_cvc ."','". $cc_expirate_month ."','". $cc_expirate_year ."','". $cc_resit_num ."','". $cc_password ."','". $tracking ."','". $pay_date ."','". $delivery_date ."')";
		
		$sql1 = "UPDATE cart SET status = 1 WHERE cartID = '$ref'";
		$query1 = mysqli_query($dbconn,$sql1);
		
		$query0 = mysqli_query($dbconn,$sql0);
		echo "<script type=text/javascript>";
		echo "alert('Payment Completed! Thank You For Trusting Our Product');";
		//echo "location.href='index.php'";
		echo "</script>";
		?>
        <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Checkout Receipt </title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
 <div id="body">
 <div id="aboutUsContent">
 	<div id="summaryTable">
    	<form method="post" action="payment.php">   
        	<fieldset>
            <legend align="center">Tempatan Brands Outlet Official Receipt</legend>
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
                    	<input type="email" name="email" size="30" value="<?php echo $email; ?>" style='border:none' readonly>
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
                    	Pay Date:
                    </td>
                    <td>
                    	<input name="pay" type="text" value="<?php echo $pay_date; ?>" style='border:none' readonly>
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
            			<input type="button" name="print" value="Print" onClick="window.print();"> &nbsp; <input type="button" name="back" value="Back" onClick="location.href='index.php';">
                    </td>
                </tr>
              </table>
            </fieldset>
        </form>
    </div>
 </div>
 </div>
</div>
</body>
</html>
        <?php
	}
	else:
		echo "Database Error!";
	endif;
	
	mysqli_close($dbconn);
?>