<?php 
 session_start();
 include("connection.php");
	include("functions.php");

include("logfun.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
		background-color: white;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
		border-radius: 5px;
	}

	#box{

		position: relative;
		left: 30%;
		margin: auto;
		width: 300px;
		padding: 20px;

	}
	*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			background-color: #ece0cf;


		}
		.navbar{
				display: flex;
				align-items: center;
				padding: 20px;

			}
		nav{
			flex: 1;
			text-align: right;

		}
		nav ul{
			display: inline-block;
			list-style-type: none;
		}
		nav ul li{
			display: inline-block;
			margin-right: 25px;
		}
		a{
			text-decoration: none;
			color: #555;
		}
		p{
			color: #555;
		}
		.cont{
			max-width: 1800px;
			margin: auto;
			padding-right: 25px;
			padding-left: 25px;
		}
		.coll img{
			max-width: 100%;
			max-height: 50%;
			padding: 50px 0;
		}
	</style>





<div class="cont">
	
<div class="navbar">
	<div class="logo">
		<img src="logo.png" width="225px" height="60px">
	</div>
	<nav>
		<ul>
			<li><a href="login.php">Home</a></li>
			
			
			<li><a href="contact.php">Contact</a></li>
			
			
		</ul>
	</nav>
	
</div>
<div class="col">
	<h1>Sri Lanka's Best market Place !</h1>

</div>   







	<div id="box">
		
		<form method="post">
			<div style="font-size: 40px;margin: 10px;color: gray;">Login</div>

		User Name	<input id="text" type="text" name="user_name"><br><br>
		Password 	<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">SIGNUP</a><br><br>
		</form>
	</div>


<div class="coll"> 
	<img src="img1.png">
</div>

</body>
</html>