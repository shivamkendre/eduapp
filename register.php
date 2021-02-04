<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="style.css">
	  <style>
	  	h2#warning{
	      color: red; 
	      text-align: center;
	      display: none;
	      }
        *{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}
html{
    background-image: url(img2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
}
a.btn{
  border-radius: 20px;
    background-color: white;
  border: 2px solid white;
  width: 45%;
  display: inline-block;
  text-align: center;
  line-height: 250%;
  text-decoration: none;
  color: rgba(89, 20 , 47, 1);
  border: 2px solid green;
  margin: 5px;
}
div.container{
  display: flex;
  height: 20vh;
  background-color: rgba(89, 20 , 47, 0.4); 
  justify-content: space-between;
  
}
div#buttons{
  /*margin-left: auto;*/
  background: none;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 20vw;}
  div#logo img{
  height: 20vh;
  width: 12vw;
}
@media only screen and (max-width: 600px){
  html{
    background-image: url('backimg.jpeg');
  }
  div#buttons{
  /*margin-left: auto;*/
  background: none;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 35vw;}
  div.content:hover{
  color: white;
}
div#buttons:hover{

}
  div#logo img{
  height: 15vh;
  width: 12vw;
}
div.content{
  line-height: 15vh;
  color: yellow;
  font-size: 1em;
  font-family: 'Itim', cursive;
}
div.container{
  height: 15vh;
}
div.container-form{
  display: grid;
  grid-template-columns: 80%;
  grid-row-gap: 3vh;
  /*justify-content: end;*/
  align-items: center;
  margin-top: 3vh;
}
div.container-form input, select{
  width: 80%;
  height: 4vh;
  background-color: rgba(255, 255, 255, 0.6);
  color: black;
  font-weight: bold;
  border: none;
  text-align: center;
  font-family: 'Roboto Slab', serif;
  margin: auto auto;
}
form div.container-form input.register{
  width: 60%;
  border-radius: 20px;
  background-color:#0b0b5e;
  color: red;
  font-size: 15px;
  height: 5vh;
}
/*form div.container-form input.register:hover{
  background-color: #0b5e2f;
  color: white;
}*/
}
	  </style>
</head>
<body>
	<script src = "validate.js"></script>
      <div class="container" >
      	<div id="logo">
      		<img src = "logo.jpg"/>
      	</div>
      	<div class="content">
      		<h3>Chalo Padhe</h3>
      	</div>
      	<div id = "buttons">
      	<a class = "btn" href = "index.php">login</a>
      	<a class="btn"  href = "register.php">register</a>
      </div>
      </div>
      <div class="form">
      	 <h1 id="header">Register</h1>
      </div>
            	<h2 id = "warning">All fields are mandatory. please fill all the fields!</h2>

      	<form method = "POST" onsubmit = "return isValid()">
      		<div class="container-form">
      			<input type = "text" name = "name" placeholder= "Enter Your Name" required onchange = "hideWarning(this)" value = "<?php if(isset($_POST["name"])) echo $_POST["name"] ?>"/>
      			<input type = "text" name = "email" placeholder= "Enter Your Email-Id" required onchange = "hideWarning(this)" value = "<?php if(isset($_SESSION["email"])) echo $_SESSION["email"] ?>"/>
      		</div>
      		<div class="container-form">
      			<input type = "text" name = "mobile" placeholder= "Enter Your Mobile-No" required onchange = "hideWarning(this)" value = "<?php if(isset($_POST["mobile"])) echo $_POST["mobile"] ?>"/>
      			<input type = "password" name = "password" placeholder= "Set the Password" required onchange = "hideWarning(this)" value = "<?php if(isset($_SESSION["password"])) echo $_SESSION["password"] ?>"/>
      		</div>
      		<div class="container-form">
      			<select name = "branch" required onchange = "hideWarning(this)" value = "<?php if(isset($_POST["branch"])) echo $_POST["branch"] ?>">
      				<option value = "Enter your Branch" disabled selected>Enter your Brach</option>
      				<option value = "computer">Computer</option>
      				<option value = "it">IT</option>
      				<option value = "ertc">Electronics</option>
      				<option value = "extc">Extc</option>
      			</select>
      			<select name = "year" required onchange = "hideWarning(this)" value = "<?php if(isset($_POST["year"])) echo $_POST["year"]?>">
      				<option value = "Enter your Year" disabled selected>Enter your Year</option>
      				<option value = "fe">FE</option>
      				<option value = "it">SE</option>
      				<option value = "TE">TE</option>
      				<option value = "BE">BE</option>
      			</select>
      		 </div>
      			<div class="container-form">
      			<input type = "submit" name = "submit" placeholder= "Enter Your Name" class = "register" value = "register" onclick = "checkMe()"/>
      		</div>
      	</form>
      	 <?php
      	     $conn = mysqli_connect("sql303.epizy.com", "epiz_27249243" , "SkvB70ilQzKd6Q", "epiz_27249243_chaloPadhe");
      	     if(isset($_POST["submit"])){
      	     	$name = $_SESSION["name"] = $_POST["name"];
      	     	$email = $_SESSION["email"] = $_POST["email"];
      	     	$mobile = $_SESSION["mobile"] = $_POST["mobile"];
      	     	$password = $_SESSION["password"] = $_POST["password"];
      	     	$branch = $_SESSION["branch"] = $_POST["branch"];
      	     	$year = $_SESSION["year"] = $_POST["year"];
                $query = "INSERT INTO users VALUES('$email', '$password', '$name', '$mobile', '$branch', '$year')";
                if(mysqli_query($conn, $query)) {
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
                    $mail->addReplyTo('iamsohinighosh84@gmail.com');
                    /*$mail->addCC('cc@example.com');
                    $mail->addBCC('bcc@example.com');

                    // Attachments
                    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */   // Optional name

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Registered Succesfully';
                    $mail->Body    = '<div>Congratulations!! you have succesfully registered on ChaloPadhe.com<br>if you have any complain you can contact us at iamsohinighosh84@gmail.com <br></div>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    //echo 'Message has been sent';
                    ?> -->
                    <script>
                    alert("Registered Succesfully!!");
                    </script>
                   <?php
                } catch (Exception $e) {
                    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
        	     }
                else
                {
       	           ?>
       	            <script>
        	         	alert("This email already exist");
        	         </script>
       	           <?php
                }
      	     }
      	?>
</body>
</html>