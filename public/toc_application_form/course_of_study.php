<?php
require_once 'db_connect.inc';

$sql = "SELECT * FROM program";//.$departid;



$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) < 1) {

echo "Unable to display result";

} else {

$users_arr = array();



while ($row = mysqli_fetch_array($result)) {

$course = $row['course'];

$course = $row['course'];



$users_arr[] = array("course" => $course, "course" => $course);

}



// encoding array to json format

echo json_encode($users_arr);

}