<?php
require_once 'db_connect.inc';

$sql = "SELECT * FROM university";//.$departid;

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) < 1) {
echo "Unable to display result";
} else {
$users_arr = array();

while ($row = mysqli_fetch_array($ $result)) {
$university = $row['university'];
$university = $row['university'];

$users_arr[] = array("university" => $university, "university" => $university);
}

// encoding array to json format
echo json_encode($users_arr);
}