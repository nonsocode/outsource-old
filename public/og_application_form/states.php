<?php
require_once 'db_connect.inc';
//'Caller Tune charged but not downloaded';
//$_POST['depart'];
//$_POST['depart'];   // department id

$sql = "SELECT * FROM states";//.$departid;

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) < 1) {
    echo "Unable to display result";
} else {
    $users_arr = array();
    
    while ($row = mysqli_fetch_array($result)) {
        $state_id = $row['state_id'];
        $name = $row['name'];
        
        $users_arr[] = array("id" => $state_id, "name" => $name);
    }
    
    echo json_encode($users_arr);
}
?>