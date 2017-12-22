<?php
/* php & mysql db connection file */
$user = "root"; //mysql username
$pass = ""; //mysql password
$host = "localhost"; //server name or ip address
$dbname = "tempatanbrandsoutlet"; //your db name

$dbconn = mysqli_connect($host, $user, $pass, $dbname) or die("<center>Error: " .mysqli_error($dbname) . "</center>");
?>