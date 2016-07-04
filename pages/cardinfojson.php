
<?php

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

    $fetch = "SELECT cardinfo.uid, personinfo.firstname, cardinfo.number, cardinfo.issuer, cardinfo.exp, cardinfo.limit, cardinfo.currency FROM cardinfo INNER JOIN personinfo ON personinfo.id = cardinfo.uid";

    $result = mysqli_query($link, $fetch);
      $row_array=array();
    while ($row = mysqli_fetch_assoc($result)) {
      $row_array[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($row_array);


?>
