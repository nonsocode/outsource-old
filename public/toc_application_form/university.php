<?php
require_once 'db_connect.inc';
$departid = @$_POST['state'];
//'Caller Tune charged but not downloaded';
//$_POST['depart'];
//$_POST['depart'];   // department id

$sql = "SELECT * FROM university";//.$departid;

$result = mysql_query($sql);
if (mysql_num_rows($result) < 1) {
echo "Unable to display result";
} else {
$users_arr = array();

while ($row = mysql_fetch_array($result)) {
$university = $row['university'];
$university = $row['university'];

$users_arr[] = array("university" => $university, "university" => $university);
}

// encoding array to json format
echo json_encode($users_arr);
}