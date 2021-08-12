<?php 


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

		
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						
						header("Location: index.php");
						die;
					}
				}
			}

			
			$PHPtext = "wrong username or password!!";
			?>
			
			<script type="text/javascript">var JavaScriptAlert =<?php echo json_encode($PHPtext); ?>;
			alert(JavaScriptAlert);</script>
<?php  
		}else
		{


		$PHPtext = "wrong username or password!";
		?>
<script type="text/javascript">var JavaScriptAlert =<?php echo json_encode($PHPtext); ?>;
			alert(JavaScriptAlert);</script>
<?php  

		}
	}

 ?>