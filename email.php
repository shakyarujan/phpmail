<?php
// require 'PHPMailer-master/PHPMailerAutoload.php';

if(isset($_POST['email'])) {
 
//     // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "rujanshakya3@live.com";
    $email_subject = "testing message";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
//     // validation expected data exists
    if(!isset($_POST['email']) ||
        !isset($_POST['comment'])){
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $email_from = $_POST['email']; // required
    $comments = $_POST['comment']; // not required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";

     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

$test = @mail($email_to, $email_subject, $email_message, $headers);
if($test){
	echo "message has been sent";
}  
else{
	echo "no sent";
}
}


   // // $mailto = $_POST['email']; // required
   // // $mailMsg = $_POST['comment'];

   // $mail = new PHPMailer();
   // $mail ->IsSmtp();
   // $mail ->SMTPDebug = 0;
   // $mail ->SMTPAuth = true;
   // $mail ->SMTPSecure = 'ssl';
   // $mail ->Host = "smtp.gmail.com";
   // $mail ->Port = 587; // or 587
   // $mail ->IsHTML(true);
   // $mail ->Username = "rujanshakya3@live.com";
   // $mail ->Password = "avatar1995";
   // $mail ->SetFrom("rujanshakya3@live.com",'rujan');
   // $mail ->Body = $comments;
   // $mail ->AddAddress($email_from);

   // if(!$mail->Send())
   // {
   //     echo "Mail Not Sent";
   // }
   // else
   // {
   //     echo "Mail Sent";
   // }

?>

<html>
	<head>
		<title>test email</title>
			<style>

				body {
					background-color: #f5f5f5;

				}
				.container {
					width: 35%;
					height: 40vh;
					margin: 100px 500px;
					background-color: rgba(0,0,0,0.1); 
					border-radius: 10px;
					box-shadow: inset 0 60px rgba(255,255,255,0.2),
					inset 0 160px rgba(255,255,220,0.2), 
		            inset 0 -15px 30px rgba(0,0,0,0.4),
		                   0 5px 10px rgba(0,0,0,0.5);


				}

				.form{
					margin-left: 20px;
				}

				.email {
					width: 60%; 
					height: 35px;
					margin-top: 20px;
					margin-bottom: 20px;
					border: 1px solid #FFFFFF;
					box-shadow: inset 0 0 6px #000000;
				}

				.comment {
					margin-bottom: 10px;
					border: 1px solid #FFFFFF;
					box-shadow: inset 0 0 10px #000000;
				}

				.feedback {
					width: 20%;
					height: 18%;
					font-family: "PT Sans", arial, serif;
					font-size: 15px;
					letter-spacing: 1;
					background-color: #0000ff;
					color: #ffffff;
				    border-radius: 2px;
				    box-shadow: inset 0 0 10px #000000,
				    		 inset 0 8px 6px -6px #000000;
				    font-weight: bold;				    
				}

			</style>
	</head>
	<body>
		<div class="container">
			<form action="email.php" method="post" class="form">
				<input type="email" class="email" placeholder=" Email_ID" name="email">
				<textarea class="comment" placeholder="Comment......." rows="5" cols="50" name="comment"></textarea> <br/>
				<input type="submit" class="feedback" value="feedback">
			</form>
		</div>
	</body>
</html>

