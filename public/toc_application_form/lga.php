<?php
require_once 'db_connect.inc';

        $state_id = mysql_real_escape_string($_POST['state_id']);

        $sql = "SELECT local_name, local_id FROM locals WHERE 	state_id = $state_id";//.$departid;

        $result = mysql_query($sql);
        if (mysql_num_rows($result) < 1) {
            echo "Unable to display result";
        } else {
            $lga_arr = array();

            while ($row = mysql_fetch_array($result)) {
                $lga_id = $row['local_id'];
                $lga_name = $row['local_name'];

                $lga_arr[] = array("local_id" => $lga_id, "local_name" => $lga_name);
                // array_push($lga_arr,$lga_arr);
            }

// encoding array to json format

            echo json_encode($lga_arr);
        }

?>