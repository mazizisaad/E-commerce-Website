<!doctype html>
<?php
	session_start();
	include("dbconn.php");
	
	$qKB = "SELECT * FROM product WHERE p_brand = 'Empayar Kuku Besi'";
	$sKB = "SELECT * FROM payment WHERE p_brand = 'Empayar Kuku Besi'";
	$query_qKB = mysqli_query($dbconn,$qKB);
	$count_qKB = mysqli_num_rows($query_qKB);
	$query_sKB = mysqli_query($dbconn,$sKB);
	
	$totalKB = 0;
	$totalProfitKB = 0;
	while($row1 = mysqli_fetch_array($query_sKB))
	{
  		$tKB = $row1['xs'] + $row1['s'] + $row1['m'] + $row1['l'] + $row1['xl'] + $row1['xxl'];
  		$totalKB += $tKB;
		
		$pKB = $tKB * $row1['price'];
		$totalProfitKB += $pKB;
	}
	
	$qAB = "SELECT * FROM product WHERE p_brand = 'Abstrax'";
	$sAB = "SELECT * FROM payment WHERE p_brand = 'Abstrax'";
	$query_qAB = mysqli_query($dbconn,$qAB);
	$count_qAB = mysqli_num_rows($query_qAB);
	$query_sAB = mysqli_query($dbconn,$sAB);
	
	$totalAB = 0;
	$totalProfitAB = 0;
	while($row2 = mysqli_fetch_array($query_sAB))
	{
  		$tAB = $row2['xs'] + $row2['s'] + $row2['m'] + $row2['l'] + $row2['xl'] + $row2['xxl'];
  		$totalAB += $tAB;
		
		$pAB = $tAB * $row2['price'];
		$totalProfitAB += $pAB;
	}
	
	$qLG = "SELECT * FROM product WHERE p_brand = 'Legit'";
	$sLG = "SELECT * FROM payment WHERE p_brand = 'Legit'";
	$query_qLG = mysqli_query($dbconn,$qLG);
	$count_qLG = mysqli_num_rows($query_qLG);
	$query_sLG = mysqli_query($dbconn,$sLG);
	
	$totalLG = 0;
	$totalProfitLG = 0;
	while($row3 = mysqli_fetch_array($query_sLG))
	{
  		$tLG = $row3['xs'] + $row3['s'] + $row3['m'] + $row3['l'] + $row3['xl'] + $row3['xxl'];
  		$totalLG += $tLG;
		
		$pLG = $tLG * $row3['price'];
		$totalProfitLG += $pLG;
	}
	
	$qAK = "SELECT * FROM product WHERE p_brand = 'Akudesign'";
	$sAK = "SELECT * FROM payment WHERE p_brand = 'Akudesign'";
	$query_qAK = mysqli_query($dbconn,$qAK);
	$count_qAK = mysqli_num_rows($query_qAK);
	$query_sAK = mysqli_query($dbconn,$sAK);
	
	$totalAK = 0;
	$totalProfitAK = 0;
	while($row4 = mysqli_fetch_array($query_sAK))
	{
  		$tAK = $row4['xs'] + $row4['s'] + $row4['m'] + $row4['l'] + $row4['xl'] + $row4['xxl'];
  		$totalAK += $tAK;
		
		$pAK = $tAK * $row4['price'];
		$totalProfitAK += $pAK;
	}
	
	$qRR = "SELECT * FROM product WHERE p_brand = 'Rare'";
	$sRR = "SELECT * FROM payment WHERE p_brand = 'Rare'";
	$query_qRR = mysqli_query($dbconn,$qRR);
	$count_qRR = mysqli_num_rows($query_qRR);
	$query_sRR = mysqli_query($dbconn,$sRR);
	
	$totalRR = 0;
	$totalProfitRR = 0;
	while($row5 = mysqli_fetch_array($query_sRR))
	{
  		$tRR = $row5['xs'] + $row5['s'] + $row5['m'] + $row5['l'] + $row5['xl'] + $row5['xxl'];
  		$totalRR += $tRR;
		
		$pRR = $tRR * $row5['price'];
		$totalProfitRR += $pRR;
	}
	
	$countItems = 0;
	$countItems = $count_qKB + $count_qAB + $count_qLG + $count_qAK + $count_qRR;
	
	$countSold = 0;
	$countSold = $totalKB + $totalAB + $totalLG + $totalAK + $totalRR;
	
	$countProfit = 0;
	$countProfit = $totalProfitKB + $totalProfitAB + $totalProfitLG + $totalProfitAK + $totalProfitRR;
	
	$sqlPostage = "SELECT * FROM payment WHERE delivery = 'Postage' AND tracking = 'null'";
	$queryPostage = mysqli_query($dbconn,$sqlPostage);
	$countPostage = mysqli_num_rows($queryPostage);
	
	$sqlPickup = "SELECT * FROM payment WHERE delivery = 'Self Pickup' AND tracking = 'null'";
	$queryPickup = mysqli_query($dbconn,$sqlPickup);
	$countPickup = mysqli_num_rows($queryPickup);
	
	
?>
<html>
<head>
<meta charset="utf-8">
<title>Admin Home</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<link href="css/style2.css" rel="stylesheet" type="text/css">

<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
		// Load the Visualization API and the chart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
	  
	  // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(ItemsChart);
	  google.setOnLoadCallback(SoldChart);
	  google.setOnLoadCallback(SalesChart);
	  
	  // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function ItemsChart() {

      // Create the data table.
      var items = new google.visualization.DataTable();
      items.addColumn('string', 'Brand Name');
      items.addColumn('number', 'Total Items');
      items.addRows([
        ['Empayar Kuku Besi', <?php echo $count_qKB;?>],
        ['Abstrax', <?php echo $count_qAB;?>],
        ['Legit', <?php echo $count_qLG;?>], 
        ['Akudesign', <?php echo $count_qAK;?>],
        ['Rare', <?php echo $count_qRR;?>]
      ]);

      // Set chart options
      var options = {'title':'Total Items Registered In System',
                     'width':400,
                     'height':300};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(items, options);
	  }
	  
	  function SoldChart() {

      // Create the data table.
      var sold = google.visualization.arrayToDataTable([
        ['Brand Name', 'Total Items Sold', { role: 'style' } ],
        ['Empayar Kuku Besi', <?php echo $totalKB; ?>, 'color: gray'],
        ['Abstrax', <?php echo $totalAB; ?>, 'color: #76A7FA'],
        ['Legit', <?php echo $totalLG; ?>, 'opacity: 0.2'],
        ['Akudesign', <?php echo $totalAK; ?>, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['Rare', <?php echo $totalRR; ?>, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);

      // Set chart options
      var options = {'title':'Total Items Sold',
                     'width':400,
                     'height':300};

      // Instantiate and draw our chart, passing in some options.
      var column = new google.visualization.ColumnChart(document.getElementById('column_div'));
      column.draw(sold, options);
    }
	
	function SalesChart() {

      // Create the data table.
      var sale = new google.visualization.DataTable();
      sale.addColumn('string', 'Brand Name');
      sale.addColumn('number', 'Total Items');
      sale.addRows([
        ['Empayar Kuku Besi', <?php echo $totalProfitKB;?>],
        ['Abstrax', <?php echo $totalProfitAB;?>],
        ['Legit', <?php echo $totalProfitLG;?>], 
        ['Akudesign', <?php echo $totalProfitAK;?>],
        ['Rare', <?php echo $totalProfitRR;?>]
      ]);

      // Set chart options
      var options = {'title':'Total Sales',
                     'width':400,
                     'height':300};

      // Instantiate and draw our chart, passing in some options.
      var bar = new google.visualization.BarChart(document.getElementById('bar_div'));
      bar.draw(sale, options);
	  }
	</script>
</head>
<body>
	<div id="wrapper">
   	  <div id="header">
      	<div id="upper">
        	<ul>
            	<li><a href="admLogout.php"><?php echo $_SESSION['AdmName']?>[Logout]</a></li>
            </ul>
        </div>
        <div id="lower">
        	<ul>
            	<li><a href="admHome.php">Home</a></li>
                <li><a href="productReg.php">Upload</a></li>
                <li><a href="updatePanel.php">Update</a></li>
                <li><a href="admCheckout.php">Checkout</a></li>
                <li><a href="delivery.php">Delivery</a></li>
            </ul>
        </div>
      </div>
      <div id="body">
      <div id="stat">
      	<table align="center" height="500">
        	<tr>
            	<td width="300">
                    <table align="center">
                    	<tr>
                        	<td>
                        		<!--Div that will hold the pie chart-->
            					<div id="chart_div" style="width:400; height:300"></div>
                            </td>
                        </tr>
                        <tr>
                        	<td align="right" bgcolor="#C0C0C0">
                    			<b>Overall Total Items Registered In The System:</b> 
                            	<b><?php echo $countItems; ?></b>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="300">
                    <table align="center">
                    	<tr>
                        	<td>
                        		<!--Div that will hold the column chart-->
            					<div id="column_div" style="width:400; height:300"></div>
                             </td>
                        </tr>
                        <tr>
                        	<td align="right" bgcolor="#C0C0C0">
                    			<b>Total Items Sold:</b> 
                            	<b><?php echo $countSold; ?><b>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="300">
                    <table align="center">
                    	<tr>
                        	<td>
                            	<!--Div that will hold the bar chart-->
            					<div id="bar_div" style="width:400; height:300"></div>
                            </td>
                        </tr>
                        <tr>
                        	<td align="right" bgcolor="#C0C0C0">
                    			<b>Total Profit: RM</b> 
                               	<b><?php echo $countProfit; ?></b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td width="300">
                </td>
                <td width="300">
                	<h3 align="center">Items Need To Be Delivered:</h3>
                    <p align="center"><b><?php echo $countPostage; ?></b></p>
                    <h3 align="center">Items Need For Self Pickup:</h3>
                    <p align="center"><b><?php echo $countPickup; ?></b></p>
                </td>
                <td width="300">
                </td>
            </tr>
        </table>
       </div>
      </div>
	  <div id="footer">
   		<p>&copy; 2016 Tempatan Brands Outlet Official</p>
      </div>
    </div>
</body>
</html>
<?php
	mysqli_close($dbconn);
?>