
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
    session_start();
    require_once('includes/functions.inc.php');
    if (check_login_status() == false) {
        redirect('login.php');
    }
    $uid= $_SESSION['uid'];
    require_once('includes/config.inc.php');

    if(!isset($_GET['id']))
                    $current = "1";
    else
        $current = $_GET['id'];

    $link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
    mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");

    $fetch = "SELECT * FROM personinfo";
    $result = mysqli_query($link, $fetch);

      $row_array=array();
    while ($row = mysqli_fetch_assoc($result)) {

      $row_array[] = $row;

    }


    header('Content-Type: application/json');

    echo json_encode($row_array);


?>
