<?php

// Start session
session_start();
// Include required functions file
require_once('includes/functions.inc.php');
// Check login status... if not logged in, redirect to login screen
if (check_login_status() == false) {
redirect('login.php');
}

require_once('includes/config.inc.php');
$link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");

$price = $_POST['price'];
$product = $_POST['product'];
$seller = $_POST['sellerno'];
$transno = $_POST['transno'];

$link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");


$query = "UPDATE cardstatement SET sellerno='".$seller."', product='".$product."', price='".$price."'  WHERE transno='".$transno."'";
$result = mysqli_query($link, $query) or die("Data not found");

header("location:cardstate.php?id=".$transno);


?>
