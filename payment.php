<?php
	session_start();
	include("dbconn.php");
	
	if(isset($_POST['continue'])):
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Payment</title>
</head>

<body>
	<div id="payment">
   	  <div id="header">
      	<?php
			if($bank == "Affin Bank"):
		?>
        	<center><img src="bank/affin.png" width="450" height="110"></center>
         <?php
		 	elseif($bank == "Alliance Bank"):
		 ?>
         	<center><img src="bank/alliance.jpg" width="450"></center>
         <?php
		 	elseif($bank == "AmBank"):
		 ?>
         	<center><img src="bank/ambank.jpg" width="450"></center>
        <?php
		 	elseif($bank == "CIMB Bank"):
		 ?>
         	<center><img src="bank/cimb.jpg" width="450"></center>
        <?php
		 	elseif($bank == "EON Bank"):
		 ?>
         	<center><img src="bank/eon.png" width="450"></center>
        <?php
		 	elseif($bank == "Hong Leong Bank"):
		 ?>
         	<center><img src="bank/hongleong.png" width="450"></center>
        <?php
		 	elseif($bank == "MayBank"):
		 ?>
         	<center><img src="bank/maybank.jpg" width="450"></center>
         <?php
		 	elseif($bank == "Public Bank"):
		 ?>
         	<center><img src="bank/public.png" width="450"></center>        
         <?php
		 	elseif($bank == "RHB Bank"):
		 ?>
         	<center><img src="bank/rhb.png" width="450"></center>
         <?php
		 	elseif($bank == "Citibank"):
		 ?>
         	<center><img src="bank/citibank.png" width="450"></center>
         <?php
		 	elseif($bank == "HSBC Bank"):
		 ?>
         	<center><img src="bank/hsbc.jpg" width="450"></center>
         <?php
		 	elseif($bank == "OCBC Bank"):
		 ?>
         	<center><img src="bank/ocbc.png" width="450"></center>
         <?php
		 	elseif($bank == "UOB"):
		 ?>
         	<center><img src="bank/uob.jpg" width="450"></center>
         <?php
		 	elseif($bank == "CIMB Bank"):
		 ?>
         	<center><img src="bank/cimb.jpg" width="450"></center>
         <?php
		 	elseif($bank == "Bank Islam"):
		 ?>
         	<center><img src="bank/bankislam.jpg" width="450"></center>
         <?php
		 	elseif($bank == "Bank Muamalat"):
		 ?>
         	<center><img src="bank/muamalat.jpg" width="450"></center>
         <?php
		 	elseif($bank == "Bank BSN"):
		 ?>
         	<center><img src="bank/bsn.png" width="450"></center>
         <?php
		 	elseif($bank == "Paypal"):
		 ?>
         	<center><img src="bank/paypal.jpg" width="450"></center>                                  
        <?php
		
			endif;
        ?>
      </div>
      <div id="details">
      <form method="post" action="buy.php">
      
      <!-- passing variables -->
        <input type="hidden" name="ch_id" value="<?php echo $ref; ?>">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="ic_num" value="<?php echo $ic_num; ?>">
        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="address" value="<?php echo $address; ?>">	
        <input type="hidden" name="method" value="<?php echo $method; ?>">
        <input type="hidden" name="bank" value="<?php echo $bank; ?>">
        <input type="hidden" name="delivery" value="<?php echo $delivery; ?>">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
        <input type="hidden" name="p_name" value="<?php echo $p_name; ?>">
        <input type="hidden" name="brand" value="<?php echo $p_brand; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="hidden" name="xs" value="<?php echo $input_xs; ?>">
        <input type="hidden" name="s" value="<?php echo $input_s; ?>">
        <input type="hidden" name="m" value="<?php echo $input_m; ?>">
        <input type="hidden" name="l" value="<?php echo $input_l; ?>">
        <input type="hidden" name="xl" value="<?php echo $input_xl; ?>">
        <input type="hidden" name="xxl" value="<?php echo $input_xxl; ?>">
        <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
        <!-- end of passing variables -->
      
      <?php
	  	if($method == "Credit/Debit"):
		{
	  ?>
      	<table align="center" border="0">
        	<tr>
            	<td align="right">
                	Name: 
                </td>
                <td align="left">
                	<input type="text" name="b_name">
                </td>
            </tr>
            <tr>
            	<td align="right">
                	Card Number:
                </td> 
                <td>
                	<input type="text" name="b_card_num" autocomplete="off"> 
                    CVC: &nbsp; <input type="text" name="b_cvc" autocomplete="off">
                </td>
            </tr>
            <tr>
            	<td align="right">
                	Expiration Date: 
                </td>
                <td>
                	<select name="b_month">
                    	<option value="Jan">January
                        <option value="Feb">February
                        <option value="Mar">March
                        <option value="Apr">April
                        <option value="May">May
                        <option value="June">June
                        <option value="July">July
                        <option value="Aug">August
                        <option value="Sep">September
                        <option value="Oct">October
                        <option value="Nov">November
                        <option value="Dec">December
                    </select>
                	<input type="number" name="b_year" autocomplete="off" size="4" min="2016" max="2030">
                    <input type="hidden" name="b_resit" value="null">
                    <input type="hidden" name="b_password" value="null">
                </td>
            </tr>
            <tr>
            	<td colspan="2" align="right">
                	<input type="submit" name="buy" value="Buy">
                </td>
            </tr>
        </table>
        <?php
		}
		elseif($method == "Fund Transfer"):
		{
		?>
        	<table align="center">
            	<tr>
                	<td>
                    	Holder Name: 
                    </td>
                    <td>
                    	<input type="text" name="b_name" autocomplete="off">
                    </td>
                </tr>
                <tr>
                	<td>
                    	Resit Reference Number: 
                    </td>
                    <td>
                    	<input type="text" name="b_resit">
                        <input type="hidden" name="b_card_num" value="null">
                        <input type="hidden" name="b_cvc" value="null">
                        <input type="hidden" name="b_month" value="null">
                        <input type="hidden" name="b_year" value="0">
                        <input type="hidden" name="b_password" value="null">
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="right">
                    	<input type="submit" name="buy" value="Buy">
                    </td>
                </tr>
            </table>
        <?php
		}
		elseif($method == "Internet Banking"):
		{
		?>
            <table align="center">
                <tr>
                	<td>
                    	Internet Banking ID:
                    </td>
                	<td>
                    	<input type="text" name="b_name">
                        <input type="hidden" name="b_resit" value="null">
                        <input type="hidden" name="b_card_num" value="null">
                        <input type="hidden" name="b_cvc" value="null">
                        <input type="hidden" name="b_month" value="null">
                        <input type="hidden" name="b_year" value="0">
                        <input type="hidden" name="b_resit" value="null">
                        <input type="hidden" name="b_password" value="null">
                    </td>
                	<td colspan="2" align="right">
                    	<input type="submit" name="buy" value="Buy">
                    </td>
                </tr>
            </table>
            
         <?php
		}
		endif;
		?>
        </form>
      </div>
    </div>
</body>
</html>
<?php
}
	endif;
	
	mysqli_close($dbconn);
?>