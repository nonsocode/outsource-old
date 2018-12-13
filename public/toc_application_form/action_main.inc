<?php
include "db_config.php";
class Applicant
{
	 public static $db;
    public function __construct()
    {
        try{ 
		Self::db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
	}
		}
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) ); 
}
}
 public function log_Appilication($seltitle,$txtsurname,$txtfirstname,$txtothernames,$txtdateofbirth,$radmaritalstat,$txtnationality,$drpstate,$drplga,$txtCofResidence,$txtSofResidence,
 $txtcity,$txtphone,$drppreexperience,$drpprejoblocation,$txtpriedu,$txtpristartdate,$txtprienddate,$txtsecedu,$txtsecstartdate,$txtsecenddate,$txtuniedu,$txtunistartdate,$txtunienddate,$txtuniqualiobt,$txtpriqualiobt,$txtsecqualiobt,$txtskills,$txthobby,$txtemail,$txtpreworkexp,$txtcourseofsudy)
    {

$sql_personal_info = "INSERT INTO employee_details SET title='$seltitle', surname='$txtsurname', firstname='$txtfirstname',dob='$txtdateofbirth', maritalStatus='$radmaritalstat', nationality='$txtnationality', stateoforigin='$drpstate', othernames='$txtothernames', lga='$drplga', email='$txtemail', application_date=now()";
$sql_contact_info = CountryOfResidence='$txtCofResidence',StateofResidence='$txtSofResidence', City='$txtcity', PhoneNumber='$txtphone', PreviousExperience='$drppreexperience', PreLocation='$drpprejoblocation', PrimarySchool='$txtpriedu', PrimaryStart='$txtpristartdate', PrimaryEnd='$txtprienddate', SecondarySchool='$txtsecedu',SecStartDate='$txtsecstartdate', SecEnddate='$txtsecenddate', University='$txtuniedu', UniStartDate='$txtunistartdate', UniEnddate='$txtunienddate', UniQualification='$txtuniqualiobt', PrimaryQualification='$txtpriqualiobt', SecQualification='$txtsecqualiobt', Skills='$txtskills',Hobby='$txthobby',previous_work_exp='$txtpreworkexp',course_of_study='$txtcourseofsudy',
        $result = mysqli_query(Self::db, $sql3) or die(mysqli_connect_errno() . "Data cannot be inserted");
        if (!$result) {
   
          echo 'Unable to submit your details!!!...Contact HR on ';
        }
		
else{
	return false;
}
	}
	 public function get_applicant_entry()
    {
		
        $sql4 = "SELECT Firstname,maritalStatus,StateofResidence,City,PhoneNumber,email,course_of_study,application_date from employee_details";// WHERE application_date >= CURDATE()

        if ($result = mysqli_query(Self::db, $sql4)) {
 
            if (mysqli_num_rows($result) > 0) {

                echo "<table class='table table-sm table-bordered' style='background-color:light green;'>";
                echo "<caption class='text-center'><strong><h4>Applicants Information</h4></strong></caption>";
                echo "<thead>";
                echo "<tr>";

                echo "<th>First Name</th>";

                echo "<th>Marital Status</th>";

                echo "<th>State of Residence</th>";
                echo "<th>City</th>";
                echo "<th>Phone Number</th>";
                echo "<th>E-mail</th>";
				 echo "<th>Course of Study</th>";
				  echo "<th>Application</th>";
				  echo "<th>Action <button type='submit' name='Export' class='btn btn-primary' id='log_application'>Export Report</button> </th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='table-hover success'>";
                    echo "<td>" . $row['Firstname'] . "</td>";
                    echo "<td>" . $row['maritalStatus'] . "</td>";
                    echo "<td>" . $row['StateofResidence'] . "</td>";
                    echo "<td>" . $row['City'] . "</td>";
                    echo "<td>" . $row['PhoneNumber'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['course_of_study'] . "</td>";
				    echo "<td>" . $row['application_date'] . "</td>";
					echo"<td>";					
					echo "<a href=?name=Invited&id=".$row['email']."> Invited </a>";
					echo "<a href=?name=NoAnswer&id=".$row['email']."> No Answer </a>";
					echo "<a href=?name=Uninterested&id=".$row['email']."> Uninterested </a>";
					echo "<a href=?name=Nocredentials&id=".$row['email']."> No credentials </a>";
                       echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                // Free result set

                mysqli_free_result($result);

            } else {

                echo "No records matching your query were found.";
            }

        } else {

            echo "ERROR: Could not able to execute $sql4. " . mysqli_error($this->db);
      
   
	}

	}
 public function search_applicant($location, $course)
    {
		
        $sql5 = "SELECT employee_details.Firstname,employee_details.maritalStatus,employee_details.City,employee_details.Surname,employee_details.PhoneNumber,employee_details.email,employee_details.course_of_study,employee_details.application_date,states.name from employee_details INNER JOIN states ON states.state_id = employee_details.StateofResidence WHERE employee_details.course_of_study = '$course' and employee_details.City = '$location'";
	
	if ($res = mysqli_query($this->db, $sql5)) {
 
            if (mysqli_num_rows($res) > 0) {

                echo "<table class='table table-sm table-bordered' style='background-color:light green;'>";
                echo "<caption class='text-center'><strong><h4> Detail of applicants with Bsc in " . $course . " From " . $location . " </h4></strong></caption>";
                echo "<thead>";
                echo "<tr>";

                echo "<th>First Name</th>";
                echo "<th>Surname</th>";
                echo "<th>Marital Status</th>";
                echo "<th>State of Residence</th>";
                echo "<th>City</th>";
                echo "<th>Phone Number</th>";
                echo "<th>E-mail</th>";
				 echo "<th>Course of Study</th>";
				  echo "<th>Date</th>";
				  echo "<th>Action <button type='submit' name='export' class='btn btn-primary' id='log_application'>Export result</button> </th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_array($res)) {

                    echo "<tr class='table-hover success'>";
                    echo "<td>" . $row['Firstname'] . "</td>";
					 echo "<td>" . $row['Surname'] . "</td>";
                    echo "<td>" . $row['maritalStatus'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['City'] . "</td>";
                    echo "<td>" . $row['PhoneNumber'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['course_of_study'] . "</td>";
					echo "<td>" . $row['application_date'] . "</td>";
					echo"<td>";					
					echo "<a href=?name=Invited&id=".$row['email']."> Invited </a>";
					echo "<a href=?name=NoAnswer&id=".$row['email']."> No Answer </a>";
					echo "<a href=?name=Uninterested&id=".$row['email']."> Uninterested </a>";
					echo "<a href=?name=Nocredentials&id=".$row['email']."> No credentials </a>";
                       echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                // Free result set

                mysqli_free_result($res);

            } else {
				echo "No records matching your query were found.";
            }

        } else {

            echo "ERROR: Could not execute your Search ". mysqli_error($this->db);
        }
          
	}
 public function UpdateAction()
	{
		$id = $_GET['id'];
		$action =$_GET['name'];
		 $sql6 = "SELECT status_email FROM rec_status WHERE status_email = '$id'";	
	       $res = mysqli_query($this->db, $sql6);
          $count_rec = mysqli_num_rows($res);
		  if( $count_rec < 0){
			  $sql7 = "INSERT INTO rec_status SET serial= '', status_email='$id', Status ='$action', modified_date= now()";
        $result = mysqli_query($this->db, $sql7);		
        if(mysqli_affected_rows($result) > 0) {   
         echo 'Successfully Updated';
		        } 
			}else{
				$sql8 = "UPDATE  rec_status SET Status ='$action', modified_date= now() WHERE status_email = '$id' ";
        $result = mysqli_query($this->db, $sql8);		
        if(mysqli_affected_rows($this->db) < 0) {   
          echo 'Unable Updated Record';
        }else{
			echo 'Successfully Updated';
			
			}
	}
			}
			  /*** for login process ***/
    public function check_login($txtuser, $txtpass)
    {

        //$pass = md5($txtpass);
        $sql11 = "SELECT email,pass from login WHERE email='$txtuser' and pass='$txtpass'";

//checking if the username is available in the table
        $result = mysqli_query($this->db, $sql11);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if ($count_row == 1) {
// this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['pass'] = $user_data['pass'];
            

            return true;
        } else {
            return false;
        }

    }

		  }

	

	$application_Log = new Applicant();	
	
	   

	   
?>