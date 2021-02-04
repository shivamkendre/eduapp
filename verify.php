<?php
session_start();
if(isset($_POST['submit'])){
	if(isset($_POST["submit"])){
	$uotp = $_POST["otp"];
	$otp =   $_SESSION['otp'];
	if($uotp == $otp){
		?>
		<script>
			
			alert("OTP verified");
	    </script>
		<?php
        header("location: update.php");
    }
    else{
    	?>
		<script>
			
			alert("Invalid otp");
	    </script>
		<?php
    }
}
}
if(!isset($_POST['submit']) || isset($_POST['resend'])){
echo "otp is sent to your mail";
$conn = mysqli_connect("sql303.epizy.com", "epiz_27249243" , "SkvB70ilQzKd6Q", "epiz_27249243_chaloPadhe");
$email = $_SESSION["email"];
$_SESSION['otp'] = mt_rand(1000, 9999);
//echo $_SESSION['otp']."<br>";
require 'PHPMailerAutoload.php';
                define('EMAIL', 'chalopadhe.com@gmail.com');
                define('PASS', 'ChaloPadhe@123');
                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer;

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = EMAIL;                     // SMTP username
                    $mail->Password   = PASS;                               // SMTP password
                    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom(EMAIL, 'ChaloPadhe.com');
                    $mail->addAddress($email);     // Add a recipient
                   // $mail->addAddress('');               // Name is optional
                    $mail->addReplyTo(EMAIL);
                    /*$mail->addCC('cc@example.com');
                    $mail->addBCC('bcc@example.com');

                    // Attachments
                    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */   // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'OTP';
                    $mail->Body    = $_SESSION['otp'];
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    //echo 'Message has been sent';
                } catch (Exception $e) {
                    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>verify</title>
</head>
<body>
<form method = "POST">
<div>
	ENTER OTP: <input type = "text" name = "otp"/>
	<br>
	<br>
	<input type = "submit" value = "verify" name = "submit"/>
	<input type = "submit" value = "resend otp" name = "resend"/>
</div>
</form>
</body>
</html>