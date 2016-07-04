
<?php

  

    $link =mysqli_connect(DB_HOSTNAME, DB_USERNAME,DB_PASSWORD) or die("Could not connect to host.");
    mysqli_select_db($link, DB_DATABASE)  or die("Could not find database.");

    if ($uid == 1)
    {
        $query = "SELECT p.firstname, p.lastname, p.id,c.number, c.issuer, c.exp, c.limit, c.currency FROM personinfo p INNER JOIN cardinfo c ON p.id = c.uid";
    }
    else
    {
        $query = "SELECT p.firstname, p.lastname, p.id,c.number, c.issuer, c.exp, c.limit, c.currency FROM personinfo p INNER JOIN cardinfo c ON p.id = c.uid WHERE id=".$uid.";";
    }


    $result = mysqli_query($link, $query) or die("Data not found");


?>
