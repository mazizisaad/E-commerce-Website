<?php
	session_start();
	include("dbconn.php");	
?>
<html>
	<body>
    	<?php echo $_SESSION['id']?>
        <p>Tahniah Azizi, kamu hebat!</p>
        <?php if(isset($_SESSION['id'])):
				{
				$numID = $_SESSION['id'];
				$sumCart = "SELECT c.p_id
							FROM cart c join customer cus on c.c_id = cus.c_email
							WHERE c.pay_method like 'null'
							AND c.c_id like '$numID'";
				$queryCart = mysqli_query($dbconn,$sumCart) or die ("Error: " . mysqli_error($dbconn));
				$count = mysqli_num_rows($queryCart);
        		echo "<p><a href=cart.php>". $count ." item(s)</a></p>";
				}
				else:
				{
					echo "<p><a href=cart.php>0 item(s)</a></p>";
				}
				endif;
		?>
    </body>
</html>
<?php
	mysqli_close($dbconn);
?>