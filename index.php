<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chalo Padhe</title>
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
 background-image: url('img2.jpg');
 background-size: cover;
 background-repeat: no-repeat;
 height: 100vh;
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
  width: 20vw;
}
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
div.form h1#header
{
  text-align: center;
    margin-top: 30%;
    color: yellow;
}
/*form div.container-form input.register:hover{
  background-color: #0b5e2f;
  color: white;
}*/
}
    </style>
</head>
<body>
  <script>
   function checkMe1(){
     var arr = document.getElementsByTagName("input");
     var email = arr[0];
     var password = arr[1];
     if(email.value == ""){
          document.getElementById("warning").style.display = "block";
          email.style.border = "3px solid red";
     }
     if(password.value == ""){
          document.getElementById("warning").style.display = "block";
          password.style.border = "3px solid red";
     }
    }
    function isValid1(){
      var arr = document.getElementsByTagName("input");
     var email = arr[1];
     var password = arr[3];
     if(email.value == "" ||  password.value == "" ){
          return false;
     }
     else
          return true;
     }
     function hideWarning(obj){
  document.getElementById("warning").style.display = "none";
  obj.style.border = "none";
  } 
  </script>
  

      <div class="container" >
        <div id="logo">
          <img src = "logo.jpg"/>
        </div>
        <div class="content">
          <h3 class = "animate">CHALO PADHE</h3>
        </div>
        <div id = "buttons">
        <a class = "btn" href = "index.php">login</a>
        <a class="btn"  href = "register.php">register</a>
      </div>
      </div>
      <div class="form">
         <h1 id="header">login</h1>
      </div>
              <h2 id = "warning">All fields are mandatory. please fill all the fields!</h2>

        <form method = "POST" onsubmit = "return isValid1()">
          <div class="container-form">
            <input type = "text" name = "email" placeholder= "Enter Your Email-Id" required onchange = "hideWarning(this)" value = "<?php if(isset($_SESSION["email"])) echo $_SESSION["email"] ?>"/>
          </div>
          <div class="container-form">
            <input type = "password" name = "password" placeholder= "Enter the Password" required onchange = "hideWarning(this)" value = "<?php if(isset($_SESSION["password"])) echo $_SESSION["password"] ?>"/>
          </div>
            <div class="container-form">
            <input type = "submit" name = "submit" placeholder= "Enter Your Name" class = "register" value = "login" onclick = "checkMe1()"/>
          </div>
        </form>
        <div>
          <h2 style = "margin-top: 5vh;text-align: center; color: black">Don't have account? <a href = "register.php" style = "text-decoration: = none; color: yellow">Register</a></h2>
           <h2 style = "margin-top: 5vh;text-align: center; color: black; display: none" id = "pass"> <a href = "verify.php" style = "text-decoration: = none; color: yellow">forgot password</a></h2>
        </div>
</body>
</html>
<?php
error_reporting(0);
 if(isset($_POST["submit"]))
 {
    $conn = mysqli_connect("sql303.epizy.com", "epiz_27249243" , "SkvB70ilQzKd6Q", "epiz_27249243_chaloPadhe");
    $_SESSION["email"] = $email = $_POST["email"];
    $_SESSION["password"] = $password = $_POST["password"];
    $query = "SELECT password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    /* if($result)
    {
    echo "riched";
  }
    else
    echo mysql_error(); */
    if(mysqli_num_rows($result) == 0)
    {
      ?>
      <script>
        alert("No such user!! please register");
      </script>
      <?php
    }
    else
 {
  $data =  $result -> fetch_assoc();
  if($password == $data["password"])
  {
   // echo "here";
    ?>
      <script>
        alert("login succesfully!!");
        window.location.href = "subjects.php";
      </script>
      <?php
      header("location: subjects.php");
  }
  else
  {
   // echo "there";
    ?>
      <script>
        alert("Incorrect password");
        document.getElementById("pass").style.display = "block";
      </script>

      <?php
  }
 }
 }
?>