<?php
require_once '../db_connect.inc';

       @$id = mysql_real_escape_string($_POST['id']);

        $sql = "SELECT DISTINCT course_of_study FROM employee_details WHERE StateofResidence = $id";//.$departid;

        $result = mysql_query($sql);
        if (mysql_num_rows($result) < 1) {
            echo  'Contact Admin';
        } else {
            $course = array();

            while ($row = mysql_fetch_array($result)) {
               $course_study = $row['course_of_study'];

                $course[] = array("course" => $course_study);
                // array_push($lga_arr,$lga_arr);
            }

// encoding array to json format

            echo json_encode($course);
        }

?>