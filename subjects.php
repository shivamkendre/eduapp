<?php
session_start();
$email = $_SESSION['email'];
$query = "SELECT branch, year, name FROM users WHERE email = '$email'";
$conn = mysqli_connect("sql303.epizy.com", "epiz_27249243" , "SkvB70ilQzKd6Q", "epiz_27249243_chaloPadhe");
$result = mysqli_query($conn, $query);
if($result){
$data = mysqli_fetch_assoc($result);
$branch = $data["branch"];
$year = $data["year"];
$name = $data["name"];
}
else
	echo mysqli_error($conn);
$query = "SELECT subjects, link, image FROM $branch WHERE year = '$year'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>subjects</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		div.header{
			background-color: rgba(89, 20 , 47, 1);
			display: grid;
			grid-template-columns: 1fr 4fr 1fr;
			height: 15vh;
		}
		div.header div.text{
			font-family: 'Itim', cursive;
			font-weight: bold;
			text-align: center;
			color: white;
			line-height: 15vh;
		}
		div.header div.logo img{
			height: 15vh;
			width: 10vw;
		}
        div.header div.profile{
        	
        	text-align: center;
        	color: white;
        }
        div{
        	
        }
        button{
                display: block;
        }
        div.list{
        	display: grid;
        	grid-template-columns: repeat(3, 20vw);
        	justify-content: space-between;
        	width: 75vw;
        	grid-row-gap: 10vh;
        	margin: auto auto;
        }
        div.list div{
        	flex: 1;
        }
        div.list div img{
        	height: 20vh;
        	width: 20vw;
        }
         div.list div img:hover{
         	border: 2px solid red;
         }
         a{
        	width: 20vw; border: 2px solid black; display: inline-block; text-align: center;
			text-decoration: none; background-color: rgba(89, 20 , 47, 1); 
			color: white;
			border-radius: 20px;
        }
        div.list div a:hover{
        	background-color: red; !important
        }
        @media only screen and (max-width: 600px) {
        
		div.list{
        	display: grid;
        	grid-template-columns: repeat(1, 60vw);
        	margin: auto auto;
        	width: 100vw;
        	grid-row-gap: 10vh;
        	justify-content: center;
        }
        div.list div{
        	text-align: center;
        }
        div.list div img{
        	height: 20vh;
        	width: 60vw;
        }
          a{
        	width: 60vw; border: 2px solid black; display: inline-block; text-align: center;
			text-decoration: none; background-color: rgba(89, 20 , 47, 1); 
			color: white;
			border-radius: 20px;
        }
        div.profile div #hideme{
        	display: block; !important
        	font-size: 12px;

        }
        div.profile button{
           position: relative; left: 0px; margin-top: 7%;width: 100%; border-radius: 20px;
           display: none;
        }
        }
        #hideme{
        	font-size:48px;
        	color:white; 
        	display:inline;
        }
        div.profile button{
        	position: relative; left: 70px; margin-top: 7%;width: 50%; border-radius: 20px
        }
	</style>
</head>
<body>
<div class="header">
	<div class="logo" style = "height: 10vh"><img src = "logo.jpg"/></div>
	<div class="text"><h1>Chalo Padhe</h1></div>
	<div class="profile">
		<div style = "position: relative; top: 15%">
		<i class="fa fa-user-circle-o" id = "hideme" style=""></i>
		<h2 style = "display: inline; position: relative; bottom: 10px"><?php echo $name; ?></h2>
	    </div>
	    <form method = "POST">
        <button style = "" name = "submit">log out</button>
        </form>
	</div>
</div>
<div  style = "text-align: center; margin-top: 10vh; margin-bottom: 5vh; color: rgba(89, 20 , 47, 1);"><h1>Watch videos</h1></div>
<div class="list">
	<?php
	while($data = mysqli_fetch_assoc($result))
	{
		?>
		<div>
			<img src="<?php echo $data["image"]; ?>"/>
			<a href="<?php echo $data["link"]; ?>" style = ""><?php echo $data["subjects"]; ?></a>
		</div>
		<?php
	}
	?>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])){
	session_destroy();
	?>
      <script>
        window.location.href = "index.php";
      </script>
      <?php
}
?>










 