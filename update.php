<?php
session_start();
$conn = mysqli_connect("sql303.epizy.com", "epiz_27249243" , "SkvB70ilQzKd6Q", "epiz_27249243_chaloPadhe");
$email = $_SESSION["email"];
if(isset($_POST["update"])){
	$password = $_POST["pass"];
	$query = "UPDATE users SET password = '$password' WHERE email = '$email' ";
	mysqli_query($conn, $query);
	?>
	<script>
		alert("Password updated succesfully");
	</script>
	<?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
<form method = "POST">
	ENTER NEW PASSWORD: <input type = "password" name = "pass"/>
	<br>
	<br>
	<input type = "submit" name = "update" value = "change"/>
	<a href = "index.php"/>login</a>
</form>
</body>
</html>