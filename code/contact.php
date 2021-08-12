<?php 
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "online_store";

$connect= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);



if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$question = $_POST['chat'];
		

		if(!empty($question) )
		{

		
		
			$query = "insert into chats (question) values ('$question')";

			mysqli_query($connect, $query);

			header("Location: contact.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}






?>



<!DOCTYPE html>
<html>
<head>
	<title>contact</title>
	<style type="text/css">
		.all1{
			position: relative;
			font-size: 20px;		}

			.con{
				position: relative;
				
			}
			.all{
				color: gray;
				position: relative;
				left: 20px;
			}
			.fb{
				height: 40px;
				width: 40px;
			}
			.chat{
				height: 200px;
				width: 70%;
			}
	</style>
</head>
<body>
<?php    include("head.php"); ?>



<div class="con">
	<label class="all1"><strong>Address</strong></label><br><br>
	<div class="all">
		Horizon store<br>
		Kings Street, <br>
		Kandy, <br>
		Sri Lanka. <br>
	</div>
<label class="all1"><strong>Email</strong></label><br><br>
<div class="all">
		suport.horizonstore@gmail.com
	</div>
</div>
<br><br><br>

<center><img class="fb" src="social/fb.png">
<img class="fb" src="social/insta.png">

<img class="fb" src="social/twt.png">

</center>

<br><br><br><br><br><br>



<form method="post">

	Your Question or idea

	<input class="chat" type="text" name="chat" >

 <input id="button" type="submit" value="Send"><br><br>


	<br><br>

	  <?php  
                $query = "SELECT * FROM chats ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="pro">  
                     <form method="post" action="prod.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               
                            
                              Question <h4 > <?php echo $row["question"]; ?></h4>  <br><br>
                               Answer <h4 > <?php echo $row["answer"]; ?></h4> 
                               
                                
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>

</form>













<br><br><br><br><br><br><br><br><br>
<?php include("foot.php"); ?>
</body>
</html>