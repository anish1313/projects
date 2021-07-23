<?php
								session_start();

							if(!empty($_SESSION['userId']))
							 {
								header('location:home.php');
							 }	
											
							include 'common_db.php';
							
							

							
							if ($_SERVER["REQUEST_METHOD"] == "POST") 
							
							{
								
								if(isset($_POST["username"]) && isset($_POST["psw"]) && isset($_POST["phone"]))
								{
									 
									 
										
									$result = $conn->query("select count(*) from 6470exerciseusers where USERNAME= '".$_POST["username"]."' ");
										
									$row = $result -> fetch_array(MYSQLI_NUM);
									
									 if($row[0])
									 {
										 $not_available = 1;
									 }
									 else
									 {
										 
									 
									$insert_query="insert into 6470exerciseusers (USERNAME,PASSWORD_HASH,PHONE) VALUES ('".$_POST["username"]."','".sha1($_POST["psw"])."','".$_POST["phone"]."')";
									
									
									
									
									
									if ($conn->query($insert_query))
												{
													
													$data_insert = 1;
												}
									elseif (!$conn->query($insert_query)) 
											{
												echo ("Error description: " . $conn->error);
											}

									 
									 }
								}
								
							  
							  
							  
							}
?>
						


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Problem 3 part 2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top: 4%">
<h3>Exercise:3 | Part:2 | writing registration form</h3>
  <div class="well">
  

  <div class="container">
	<div class="row">
	<div class="col-md-10">
	<form <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
			<h1>Register</h1>
			<p>Please fill in this form to create an account.</p>
			<hr>
			
				<?php
					if(isset($_POST["username"]) && isset($data_insert) && $data_insert==1)
					{
						echo "<h3 style='color:green'>User Register Successfully!</h3>";
					}
					else if(isset($_POST["username"]) && isset($not_available) && $not_available==1)
					{
						echo "<h3 style='color:red'>Sorry! This Username is not available</h3>";
					}

				
				?>
		
			<label for="email"><b>Username</b></label>
			<input type="text" class="form-control" placeholder="Enter Username" name="username" id="email" required  autocomplete="off" />
			</br>

			<label for="psw"><b>Password</b></label>
			<input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required  autocomplete="off" />
			</br>

			<label for="psw-repeat" ><b>Phone</b></label>
			<input type="text" class="form-control" placeholder="10 digit phone number"  maxlength="10" pattern="[7-9]{1}[0-9]{9}" name="phone" id="phone" required  autocomplete="off" />
			</br>
			<hr>
			<button type="submit" class="registerbtn btn btn-primary">Register</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="login.php"><input type="button" value="Login" class="btn btn-success" /></a>
			 </form>
			 
			 
		  </div>
	</div>

		  



  </div>
  </div>
</div>

</body>
</html>