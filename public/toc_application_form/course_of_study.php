<?php
require_once 'db_connect.inc';
$con = mysql_connect($host, $user, $password)

or die("Unable to connect");

$db = mysql_select_db($dbname, $con) or die("Database not found");

$departid = @$_POST['state'];

//'Caller Tune charged but not downloaded';

//$_POST['depart'];

//$_POST['depart'];   // department id



$sql = "SELECT * FROM program";//.$departid;



$result = mysql_query($sql);

if (mysql_num_rows($result) < 1) {

echo "Unable to display result";

} else {

$users_arr = array();



while ($row = mysql_fetch_array($result)) {

$course = $row['course'];

$course = $row['course'];



$users_arr[] = array("course" => $course, "course" => $course);

}



// encoding array to json format

echo json_encode($users_arr);

}