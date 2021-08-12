<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>


	<style type="text/css">
		
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			background-color: #ece0cf;


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
		.col{
			position: relative;
			left: 100px;
			
			

		}
		.coll img{
			max-width: 100%;
			max-height: 50%;
			padding: 50px 0;
		}
		.row{
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-around;
		}
		.img1{
			width: 350px;
			height: 350px;
			position: relative;
			left:15px;

		}
		.img1l{
			position: relative;
			left: 75px;
			background-color: white;
		}
		.imgd1{
			width: 400px;
			height: 500px;
			background-color: white;
			position: relative;
			left: 30px;
			margin: 20px;
		}
		.imdh{
			background-color: white;
			position: relative;

		}
		.add{
			font-size: 60px;
			position: relative;
			left: 600px;
			top: -800px;
		}
		.addc{
			background-color: #ff3d3d;
			border-radius: 15px;
			font-size: 60px;
			color: white;
			position: relative;
			left: 600px;
			top: -750px;
		}
		.addc2{
			background-color: #ff3d3d;
			border-radius: 15px;
			font-size: 100px;
			color: white;
			position: relative;
			left: 800px;
			top: -750px;
		}
		
		
	</style>



	
</head>
<body>

	
	

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
<?php 

 ?>






<div class="cont">
<?php include("head.php") ?>	

<div class="col">
	<h1>Sri Lanka's Best market Place !</h1>

</div>
<div class="row"> 



<div class="coll"> 
	<img src="img1.png">
</div>
</div>

</div>

<div class="imgd1"><br>
	
	<img class="img1" src="img\ip11.jpg">
	<br>
 <h2 class="imdh">Apple iPhone 11</h2><br>
	<label class="img1l">RS 155000</label>
</div>

<div class="imgd1"><br>
	
	<img class="img1" src="img\img3.jpg">
	<br>
 <h2 class="imdh">asus</h2><br>
	<label class="img1l">RS 84000</label>
</div>

<label class="add">THE best Computer Hardware ! <br> best Desktop <br> and Lsptop Seller!!!</label>
<br>


	

<br><br>
 <?php include ("foot.php") ?>
</body>
</html>