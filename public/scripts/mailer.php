<?php
if(isset($_POST)){
    //include the relevant classes
    require('../assets/PHPMailer/class.phpmailer.php');
    require('../assets/PHPMailer/class.smtp.php');

    //EMAIL SETTINGS
    $smtp_host = "mail.outsource.ng";
    $smtp_user = "automailer@outsource.ng";
    $smtp_password = "automailer*123#";
    $smtp_port = 465;
    $smtp_secure= "ssl";
    $receive_email= "info@outsourceglobal.com";
    $email_name= "Outsource Group";
    //POSTED VALUES
    $fullname= trim($_POST['contactName']);
    $send_to_email= trim($_POST['contactEmail']);
    $subject= trim($_POST['contactSubject']);
    $message= trim($_POST['contactMessage']);
    $template= '<div style="width: 610px;">
                    <div style="background-color: white; color: black; font-weight: bold;">
                        <span>From: '.$fullname.'</span>
                    </div>
                    <div style="background-color: white; color: black;">
                        <span>' . $message . '</span>
                    </div>
                </div>';
	$data= array();
	try {
		$mail = new PHPMailer(true);
		$mail->isSMTP();
		//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only. Comment out for AJAX requests
        $mail->Host = $smtp_host;
        $mail->Username = $smtp_user;
		$mail->Password = $smtp_password;
		$mail->Port = $smtp_port;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = $smtp_secure;
		$mail->From = $send_to_email;
		$mail->FromName = $email_name;
		$mail->addAddress($receive_email);
		$mail->isHTML(true);
		$mail->Subject = "$subject";
		$mail->AltBody = $message;
		$mail->Body = $template;

		if (!$mail->send())
            $data['success'] = false;
        else
        $data['success'] = true;
        echo json_encode($data);
    } catch (phpmailerException $e) {
        $data['success'] = false;
        echo json_encode($data);
        //echo $e->errorMessage(); //error messages from PHPMailer
    } catch (Exception $e) {
        $data['success'] = false;
        echo json_encode($data);
        //echo $e->getMessage();
    }
}
?>
