<?php

session_start();

include "db_config.php";

//include"session_init1.php";

class Applicant

{

	 public $db;

	 public $stuff_arr;

	    public function __construct()

    {

        try{ 

		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);



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

public function mail_Hr($txtfirstname,$txtcourseofsudy,$txtphone,$txtemail){

   $to = "knusaibah@outsource.ng";

   $subject = "Toc Job Application Information";

   $body= "Application Form".PHP_EOL;

   $body.= "Hello HR Team, " . $txtfirstname ."  just applied".PHP_EOL;

   $body.= "Course of study: ". $txtcourseofsudy.PHP_EOL;

   $body.= "Phone Number: " . $txtphone .PHP_EOL;

   $body.= "Email: ". $txtemail .PHP_EOL;

   $body.= "Thanks".PHP_EOL;

   $headers = 'From: Outsource <Noreply@outsource.ng>'.PHP_EOL;

   $headers .= 'Bcc: peromosele@outsource.ng,ebere.Ezeronye@outsource.ng,Aisha.Sharyn@outsource.ng'.PHP_EOL;

   $headers .= 'Reply-To: Noreply@outsource.ng'.PHP_EOL;

   $headers .= "X-Mailer: PHP/".phpversion(); 

 if(mail($to,$subject,$body,$headers, "-fNoreply@outsource.ng")) {

  return true;

  } else {

 return false;

 }

 }

public function mail_Applicant($txtsurname,$seltitle,$txtemail){

 $to = $txtemail;

$subject = "Re:Job Application Status".PHP_EOL;

$message = "Dear ". $seltitle.". ". $txtsurname.",\n" .PHP_EOL;

$message.="Your Application is well recieved.".PHP_EOL;

$message .= "You will be contacted if you are considered for the position applied for.\n" .PHP_EOL;

$message .= "Thank you." .PHP_EOL;

$headers = 'From: Outsource <Noreply@outsource.ng>'.PHP_EOL;

$headers .= 'Bcc: peromosele@outsource.ng'.PHP_EOL;

$headers .= 'Reply-To: Noreply@outsource.ng'.PHP_EOL;

$headers .= "X-Mailer: PHP/".phpversion();



 if(mail($to,$subject,$message,$headers, "-fNoreply@outsource.ng")){

	 return true;

	

 }else{

	 return false;

 }

}



 public function log_Application($seltitle,$txtsurname,$txtfirstname,$txtothernames,$txtdateofbirth,$radmaritalstat,$txtnationality,$drpstate,$drplga,$txtCofResidence,$txtSofResidence,$txtHouseAddress,$txtcity,$txtphone,$drppreexperience,$drpprejoblocation,$txtpriedu,$txtpristartdate,$txtprienddate,$txtsecedu,$txtsecstartdate,$txtsecenddate,$txtuniedu,$txtunistartdate,$txtunienddate,$txtuniqualiobt,$txtpriqualiobt,$txtsecqualiobt,$txtskills,$txthobby,$txtemail,$txtpreworkexp,$txtcourseofsudy)

    {



$sql3 = "INSERT INTO employee_details SET serial= '', Title='$seltitle', Surname='$txtsurname', Firstname='$txtfirstname', Othernames='$txtothernames', Dob='$txtdateofbirth', maritalStatus='$radmaritalstat', Nationality='$txtnationality',State='$drpstate', lga='$drplga', CountryOfResidence='$txtCofResidence',StateofResidence='$txtSofResidence', house_Address='txtHouseAddress', City='$txtcity', PhoneNumber='$txtphone', PreviousExperience='$drppreexperience', PreLocation='$drpprejoblocation', PrimarySchool='$txtpriedu', PrimaryStart='$txtpristartdate', PrimaryEnd='$txtprienddate', SecondarySchool='$txtsecedu',SecStartDate='$txtsecstartdate', SecEnddate='$txtsecenddate', University='$txtuniedu', UniStartDate='$txtunistartdate', UniEnddate='$txtunienddate', UniQualification='$txtuniqualiobt', PrimaryQualification='$txtpriqualiobt', SecQualification='$txtsecqualiobt', Skills='$txtskills',Hobby='$txthobby',email='$txtemail',previous_work_exp='$txtpreworkexp',course_of_study='$txtcourseofsudy',status ='Fresh',application_date=now()";

        $result = mysqli_query($this->db, $sql3) or die(mysqli_connect_error() . "Data cannot be inserted. mysqli_error() .");

        if (!$result) {

   

        return false;

        }

		

else{

	

      $this->mail_Applicant($txtsurname,$seltitle,$txtemail);

	  $this->mail_Hr($txtfirstname,$txtcourseofsudy,$txtphone,$txtemail);

		  return true;

	  }

	}

	 public function get_applicant_entry()

    {

		

        $sql4 = "SELECT employee_details.Firstname,employee_details.Surname,employee_details.StateofResidence,employee_details.City,employee_details.PhoneNumber,employee_details.email,employee_details.course_of_study,employee_details.application_date,employee_details.status, states.name from employee_details INNER JOIN states ON states.state_id = employee_details.StateofResidence WHERE status = 'Fresh' or status = 'NoAnswer' or status =''";



        if ($result = mysqli_query($this->db, $sql4)) {

 

            if (mysqli_num_rows($result) > 0) {

				

				 echo "<div class='table-responsive'>";

				 echo "<div style='overflow-x:auto;'>";

                echo "<table class='table table-bordered' style='background-color:light green;'>";

                echo "<caption class='text-center'><strong><h4>Applicants Information</h4></strong></caption>";

                echo "<thead>";

                echo "<tr>";



                echo "<th>First Name</th>";

                echo "<th>Surname</th>";

                echo "<th>State of Residence</th>";

                echo "<th>Phone Number</th>";

                echo "<th>E-mail</th>";

				 echo "<th>Course of Study</th>";

				  echo "<th>Application Date</th>";

				   echo "<th>Status</th>";

				  echo "<th>Action <button type='submit' name='Export' class='btn btn-primary' id='log_application'>Export Report</button> </th>";



                echo "</tr>";

                echo "</thead>";

                echo "<tbody>";

                while ($row = mysqli_fetch_array($result)) {

                    echo "<tr class='table-hover success'>";

                    echo "<td>" . $row['Firstname'] . "</td>";

                    echo "<td>" . $row['Surname'] . "</td>";

                    echo "<td>" . $row['name'] . "</td>";

                    echo "<td>" . $row['PhoneNumber'] . "</td>";

					echo "<td>" . $row['email'] . "</td>";

					echo "<td>" . $row['course_of_study'] . "</td>";

				    echo "<td>" . $row['application_date'] . "</td>";

					  echo "<td>" .$row['status'] . "</td>";

					echo"<td>";					

					echo "<span class='badge'><a href=?name=Invited&id=".$row['email']."> Invited </a></span></br>";

					echo "<span class='badge'><a href=?name=NoAnswer&id=".$row['email']."> No Answer </a></span></br>";

					echo "<span class='badge'><a href=?name=Uninterested&id=".$row['email']."> Uninterested </a></span></br>";

					echo "<span class='badge'><a href=?name=Nocredentials&id=".$row['email']."> No credentials </a></span>";

                    echo "</td>";

                    echo "</tr>";

                }

                echo "</tbody>";

                echo "</table>";

				echo "</div>";

                echo "</div>";

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

		

        $sql5 = "SELECT employee_details.Firstname,employee_details.maritalStatus,employee_details.City,employee_details.Surname,employee_details.PhoneNumber,employee_details.email,employee_details.course_of_study,employee_details.application_date,states.name,employee_details.status from employee_details INNER JOIN states ON states.state_id = employee_details.StateofResidence WHERE employee_details.course_of_study = '$course' and employee_details.StateofResidence = '$location'";

	

	if ($res = mysqli_query($this->db, $sql5)) {

 

            if (mysqli_num_rows($res) > 0) {

				

				 echo "<div class='table-responsive'>";

				 echo "<div style='overflow-x:auto;'>";

                echo "<table class='table table-bordered' style='background-color:light green;'>";

                echo "<caption class='text-center'><strong><h4> Detail of applicants with Bsc in " . $course . " </h4></strong></caption>";

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

				   echo "<th>Status</th>";

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

					echo "<td>" . $row['status'] . "</td>";

					

					echo"<td>";					

					echo "<span class='badge'><a href=?name=Invited&id=".$row['email']."> Invited </a></span></br>";

					echo "<span class='badge'><a href=?name=NoAnswer&id=".$row['email']."> No Answer </a></span></br>";

					echo "<span class='badge'><a href=?name=Uninterested&id=".$row['email']."> Uninterested </a></span></br>";

					echo "<span class='badge'><a href=?name=Nocredentials&id=".$row['email']."> No credentials </a></span>";

                       echo "</td>";

                    echo "</tr>";

                }

                echo "</tbody>";

                echo "</table>";

                echo "</div>";

				 echo "</div>";

                // Free result set



                mysqli_free_result($res);



            } else {

				echo "No records matching your query were found.";

            }



        } else {



            echo "ERROR: Could not execute your Search ". mysqli_error($this->db);

        }

          

	}

	public function report($txtsrch_From, $txtsrch_To){

		$this->stuff_arr = array("Invited","NoAnswer","Uninterested","Nocredentials","Fresh");

		foreach($this->stuff_arr as $value){

			$sql_report = "SELECT  count(*) as total from employee_details WHERE status ='$value' and date_modified BETWEEN '$txtsrch_From'and '$txtsrch_To'";

			$result=mysqli_query( $this->db, $sql_report);

			 echo "<div class='table-responsive'>";

			 echo "<div style='overflow-x:auto;'>";

			echo "<table class='table table-sm table-bordered' style='background-color:light green;'>";

                echo "<caption class='text-center'><strong><h4> Report </h4></strong></caption>";

                echo "<thead>";

                echo "<tr>";

                echo "<th>Status</th>";

				echo "<th>value</th>";

                echo "</tr>";

                echo "</thead>";

		echo "<tbody>";		

          while($data=mysqli_fetch_object($result)){

			    echo "<tr class='table-hover success'>";

				echo "<td>" . $value . "</td>";

                echo "<td>". $data->total . "</td>";

				echo "</tbody>";

                echo "</table>";

				echo"</div>";

		    echo "</div>";

		  }

		}

	}

	public function report_specifics($txtsrch_From, $txtsrch_To,$txt_status){		

			$sql_report_specifics = "SELECT  Surname,Firstname,course_of_study,application_date,status from employee_details WHERE status ='$txt_status' and date_modified BETWEEN '$txtsrch_From'and '$txtsrch_To'";

			if ($result=mysqli_query( $this->db, $sql_report_specifics)) {

			if (mysqli_num_rows($result) > 0) {

				

				 echo "<div class='table-responsive'>";

				 echo "<div style='overflow-x:auto;'>";

                echo "<table class='table table-bordered' style='background-color:light green;'>";

               echo "<tr>";

                echo "<th>Surname</th>";

                echo "<th>First Name</th>";

                echo "<th>Course of study</th>";

                echo "<th>application date</th>"; 

				echo "<th>status</th>"; 

				echo "</tr>";

                echo "</thead>";

                echo "<tbody>";

                while ($row = mysqli_fetch_array($result)) {

                    echo "<tr class='table-hover success'>";

                    echo "<td>" . $row['Surname'] . "</td>";

					 echo "<td>" . $row['Firstname'] . "</td>";

                    echo "<td>" . $row['course_of_study'] . "</td>";

                    echo "<td>" . $row['application_date'] . "</td>";

                  	echo "<td>" . $row['status'] . "</td>";					

                    echo "</tr>";

                }

                echo "</tbody>";

                echo "</table>";

                echo "</div>";

				 echo "</div>";

                // Free result set



                mysqli_free_result($result);



            } else {

				echo "No records matching your query were found.";

            }



        } else {



            echo "ERROR: Could not execute your Search ". mysqli_error($this->db);

        }

		}

	

 public function UpdateAction($id,$action)

	{

		$sql6 = "UPDATE employee_details SET status ='".$action."', date_modified= now() WHERE email = '$id'";

        $result_update = mysqli_query($this->db, $sql6);		

        if(!$result_update) {  

	       echo 'unable to update record';				

       

        }else{

			  header("location:view_applicant.php");

			}

	}

			

			  /*** for login process ***/

    public function check_login($txtuser, $txtpass)

    {



        //$pass = md5($txtpass);

        $sql11 = "SELECT email,pass,name from login WHERE email='$txtuser' and pass='$txtpass'";



//checking if the username is available in the table

        $result = mysqli_query($this->db, $sql11);

        $user_data = mysqli_fetch_array($result);

        $count_row = $result->num_rows;



        if ($count_row >= 1) {

			// this login var will use for the session thing

			$_SESSION['login'] = true;

            $_SESSION['email'] = $user_data['email'];

            $_SESSION['pass'] = $user_data['pass']; 

            $_SESSION['name'] = $user_data['name'];			



            return true;

        } else {

            return false;

        }



    }

	public function logOut(){

 if(($_SESSION['login'])== true){

	   $_SESSION['login'] = false;

        session_destroy();

       

		//redirect the user to the home page

header("location:index.php");

}



		

	}



		  }



	



	$application_Log = new Applicant();	

	

	   



	   

?>