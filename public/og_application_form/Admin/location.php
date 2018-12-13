<?php
require_once '../db_connect.inc';
$departid = @$_POST['state'];
//'Caller Tune charged but not downloaded';
//$_POST['depart'];
//$_POST['depart'];   // department id

$sql = "SELECT DISTINCT employee_details.StateofResidence, states.name FROM employee_details INNER JOIN states ON states.state_id = employee_details.StateofResidence";//.$departid;

$result = mysql_query($sql);
if (mysql_num_rows($result) < 1) {
echo "Unable to display result";
} else {
$users_arr = array();

while ($row = mysql_fetch_array($result)) {
$id = $row['StateofResidence'];
$name = $row['name'];

$users_arr[] = array("state_name" => $name, "id" => $id);
}

// encoding array to json format
echo json_encode($users_arr);
}
//if(isset($_POST['state_id'])) {
    
?>