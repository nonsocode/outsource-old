<?php

$host = "localhost";    /* Host name */

$user = "outsouu3_admin";         /* User */

$password = "Pa55word17";         /* Password */

$dbname = "outsouu3_toc_application_formDB";   /* Database name */



$con = mysql_connect($host, $user, $password)

or die("Unable to connect");

$db = mysql_select_db($dbname, $con) or die("Database not found");

?>