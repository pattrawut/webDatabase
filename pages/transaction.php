<?php
session_start();
    require_once('includes/functions.inc.php');
    if (check_login_status() == false) {
        redirect('mylogin.php');
    }
    $uid= $_SESSION['uid'];
    require_once('includes/config.inc.php');

    if(!isset($_GET['id']))
                    $current = "1";
    else
        $current = $_GET['id'];

header('Content-Type: text/xml');
$dom = new DOMDocument();
$response  = $dom->createElement('response');
$dom->appendChild($response);
$transactions  = $dom->createElement('transactions');
$response->appendChild($transactions);
$link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");
if ($uid == 1){
	$query = "SELECT * FROM cardstatement";
}else
{
	$query = "SELECT * FROM cardstatement WHERE uid = ".$uid;
}
$result = mysqli_query($link, $query) or die("Data not found");
while($row = mysqli_fetch_array($result))
{
	$transno = $dom->createElement('transno');
	$transnoText = $dom->createTextNode($row['transno']);
	$transno->appendChild($transnoText);
	$uid= $dom->createElement('uid');
	$uidText = $dom->createTextNode($row['uid']);
	$uid->appendChild($uidText);
	$date= $dom->createElement('date');
	$dateText = $dom->createTextNode($row['date']);
	$date->appendChild($dateText);
	$sellerno= $dom->createElement('sellerno');
	$sellernoText = $dom->createTextNode($row['sellerno']);
	$sellerno->appendChild($sellernoText);
	$product= $dom->createElement('product');
	$productText = $dom->createTextNode($row['product']);
	$product->appendChild($productText);
	$price= $dom->createElement('price');
	$priceText = $dom->createTextNode($row['price']);
	$price->appendChild($priceText);
	$number= $dom->createElement('number');
	$numberText = $dom->createTextNode($row['number']);
	$number->appendChild($numberText);
	$transaction = $dom->createElement('transaction');
		$transaction->appendChild($transno);
		$transaction->appendChild($uid);
		$transaction->appendChild($date);
		$transaction->appendChild($sellerno);
		$transaction->appendChild($product);
		$transaction->appendChild($price);
		$transaction->appendChild($number);
	$transactions->appendChild($transaction);
}
$xmlString = $dom->saveXML();
echo $xmlString;
?>
