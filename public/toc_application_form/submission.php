<?php
session_start();
require_once "db_config.php";
Class agent{
	 public $conn;
	 public $stuff_arr;
	    public function __construct()
   {
  try{
	$this->conn = new PDO( "mysql:host=localhost; dbname=outsouu3_toc_application_formDB", "outsouu3_admin", "Pa55word17");  
	
      $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
	}
catch(Exception $e)  
{   
die( print_r( $e->getMessage() ) ); 
}
}
private function mail_Applicant($txtsurname,$seltitle,$txtemail){
 $to = $txtemail;
$subject = "Re:Job Application Status".PHP_EOL;
$message = "Dear ". $seltitle.". ". $txtsurname.",\n" .PHP_EOL;
$message.="Your Application is well recieved.".PHP_EOL;
$message .= "You will be contacted if you are considered for the position applied for.\n" .PHP_EOL;
$message .= "Thank you." .PHP_EOL;
$headers = 'From: Outsource <Noreply@outsourceglobal.com>'.PHP_EOL;
$headers .= 'Bcc: peromosele@outsourceglobal.com,hr@outsourceglobal.com'.PHP_EOL;
$headers .= 'Reply-To: Noreply@outsourceglobal.com'.PHP_EOL;
$headers .= "X-Mailer: PHP/".phpversion();

 if(mail($to,$subject,$message,$headers, "-fNoreply@outsourceglobal.com")){
	 return true;
	
 }else{
	 return false;
 }
}
private function mail_Hr($txtfirstname,$txtcourseofsudy,$txtphone,$txtemail){
   $to = "knusaibah@outsourceglobal.com";
   $subject = "Toc Job Application Information";
   $body= "Application Form".PHP_EOL;
   $body.= "Hello HR Team, " . $txtfirstname ."  just applied".PHP_EOL;
   $body.= "Course of study: ". $txtcourseofsudy.PHP_EOL;
   $body.= "Phone Number: " . $txtphone .PHP_EOL;
   $body.= "Email: ". $txtemail .PHP_EOL;
   $body.= "Thanks".PHP_EOL;
   $headers = 'From: Outsource <Noreply@outsourceglobal.com>'.PHP_EOL;
   $headers .= 'Bcc: peromosele@outsourceglobal.com,hr@outsourceglobal.com'.PHP_EOL;
   $headers .= 'Reply-To: Noreply@outsourceglobal.com'.PHP_EOL;
   $headers .= "X-Mailer: PHP/".phpversion(); 
 if(mail($to,$subject,$body,$headers, "-fNoreply@outsourceglobal.com")) {
  return true;
  } else {
 return false;
 }
 }
//check if email exist 
 private function check_record_existence($txtemail){
	$stmt = $this->conn->prepare("SELECT * FROM personal_info WHERE email = ?");
    $stmt->bindvalue(1, $txtemail);
    $stmt->execute();
	$get_count = $stmt->rowCount();
	//echo $get_count;
	if($get_count >=1){
		return true;
	} else {
		
		return false;
	}
	
}

 public function log_Application($seltitle,$txtsurname,$txtfirstname,$txtothernames,$txtdateofbirth,$radmaritalstat,$txtnationality,$drpstate,$drplga,$txtCofResidence,$txtSofResidence,$txtHouseAddress,$txtcity,$txtphone,$drppreexperience,$drpprejoblocation,$txtpriedu,$txtpristartdate,$txtprienddate,$txtsecedu,$txtsecstartdate,$txtsecenddate,$txtuniedu,$txtunistartdate,$txtunienddate,$txtuniqualiobt,$txtpriqualiobt,$txtsecqualiobt,$txtskills,$txthobby,$txtemail,$txtpreworkexp,$txtcourseofsudy)
    {
		//If the record exist spill something.
				if($this->check_record_existence($txtemail)){
			die('We already have your Information, you will be contacted shortly');
		}
		else{
			
		try{
	$application_date = date('Y-m-d');
   $this->conn->beginTransaction();
    // our SQL statements
    $this->conn->exec("INSERT INTO personal_info(title,surname,firstname,dob,maritalstatus,nationality,stateoforigin,othernames,lga,email,application_date) VALUES ('$seltitle','$txtsurname','$txtfirstname','$txtdateofbirth','$radmaritalstat','$txtnationality','$txtSofResidence','$txtothernames','$drplga','$txtemail','$application_date')");
    $this->conn->exec("INSERT INTO `contact_info`(`serial`, `countryofresidence`, `stateofresidence`, `city`, `phonenumber`, `houseaddress`, `email_contact`, `previousexperience`, `prelocation`) VALUES ('','$txtCofResidence','$txtSofResidence','$txtcity','$txtphone','$txtHouseAddress','$txtemail','$drppreexperience','$drpprejoblocation')");
    $this->conn->exec("INSERT INTO `rec_status`(`serial`, `status_email`, `Status`, `modified_date`) VALUES ('','$txtemail','Fresh','')");
	$this->conn->exec("INSERT INTO `academic_qualification`(primaryschool,PrimaryStart,PrimaryEnd,SecondarySchool,SecStartDate,SecEnddate,University,UniStartDate,UniEnddate,UniQualification,PrimaryQualification,SecQualification,Skills,Hobby,course_of_study,email) VALUES ('$txtpriedu','$txtpristartdate','$txtprienddate','$txtsecedu','$txtsecstartdate','$txtsecenddate','$txtuniedu','$txtunistartdate','$txtunienddate','$txtuniqualiobt','$txtpriqualiobt','$txtsecqualiobt','$txtskills','$txthobby','$txtcourseofsudy','$txtemail')");

    // commit the transaction
    if($this->conn->commit()){
		$this->mail_Applicant($txtsurname,$seltitle,$txtemail);
		$this->mail_Hr($txtfirstname,$txtcourseofsudy,$txtphone,$txtemail);
    echo "Thank you for submitting your application. It will be reviewed by our HR team soon.";
	    }
		}
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $this->conn->rollback();
    echo "Error: " . $e;
    }

$this->conn = null;
	}
	}
}

$txtemail = false;
if(isset($_POST['txtemail'])){
@$seltitle = $_POST['seltitle'];
@$txtsurname = $_POST['txtsurname'];
@$txtfirstname = $_POST['txtfirstname'];
@$txtothernames = $_POST['txtothernames'];
@$txtdateofbirth = $_POST['Dob'];
@$radmaritalstat = $_POST['radmaritalstat'];
@$txtnationality = $_POST['txtnationality'];
@$drpstate = $_POST['state'];
@$drplga = $_POST['drplga'];
@$txtCofResidence = $_POST['txtCofResidence'];
@$txtSofResidence = $_POST['txtSofResidence'];
@$txtHouseAddress = $_POST['txtHouseAddress'];
@$txtcity = $_POST['txtcity'];
@$txtphone =$_POST['txtphone'];
@$drppreexperience = $_POST['drppreexperience'];
@$drpprejoblocation = $_POST['drpprejoblocation'];
@$txtpriedu = $_POST['txtpriedu'];
@$txtpristartdate = $_POST['txtpristartdate'];
@$txtprienddate = $_POST['txtprienddate'];
@$txtsecedu = $_POST['txtsecedu'];
@$txtsecstartdate =$_POST['txtsecstartdate'];
@$txtsecenddate = $_POST['txtsecenddate'];
@$txtuniedu = $_POST['txtuniedu'];
@$txtunistartdate = $_POST['txtunistartdate'];
@$txtunienddate = $_POST['txtunienddate'];
@$txtuniqualiobt = $_POST['txtuniqualiobt'];
@$txtpriqualiobt = $_POST['txtpriqualiobt'];
@$txtsecqualiobt = $_POST['txtsecqualiobt'];
@$txtskills = $_POST['txtskills'];
@$txthobby = $_POST['txthobby'];
@$txtemail = $_POST['txtemail'];
@$txtpreworkexp =  $_POST['txtpreworkexp'];
@$txtcourseofsudy = $_POST['txtcourseofsudy'];  
 //echo "my country is : " . $txtCofResidence  .'</br>';
 //echo "my state is : " . $drpstate  .'</br>';
$agents = new Agent();
$agents->log_Application($seltitle,$txtsurname,$txtfirstname,$txtothernames,$txtdateofbirth,$radmaritalstat,$txtnationality,$drpstate,$drplga,$txtCofResidence,$txtSofResidence,$txtHouseAddress,$txtcity,$txtphone,$drppreexperience,$drpprejoblocation,$txtpriedu,$txtpristartdate,$txtprienddate,$txtsecedu,$txtsecstartdate,$txtsecenddate,$txtuniedu,$txtunistartdate,$txtunienddate,$txtuniqualiobt,$txtpriqualiobt,$txtsecqualiobt,$txtskills,$txthobby,$txtemail,$txtpreworkexp,$txtcourseofsudy);
}	
?>