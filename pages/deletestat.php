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
        
$link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");


$transno = $_REQUEST['id'];

$result=mysqli_query($link, "DELETE FROM `dbproject`.`cardstatement` WHERE `cardstatement`.`transno` = '". $transno ."'");

// if successfully deleted
if($result){
header("location:cardstate.php");
}

else {
echo "ERROR";
}

?>
