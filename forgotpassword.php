<?php
							session_start();

							if(!empty($_SESSION['userId']))
							 {
								header('location:home.php');
							 }
											
							include 'common_db.php';
							
					

							
							if ($_SERVER["REQUEST_METHOD"] == "POST") 
							
							{
								
								if(isset($_POST["username"]) && isset($_POST["getpwd"]) && isset($_POST["phone"]))
								{
									 
									 
										
									$result = $conn->query("select count(*) from 6470exerciseusers where USERNAME= '".$_POST["username"]."'  and PHONE= '".$_POST["phone"]."' ");
										
									$row = $result -> fetch_array(MYSQLI_NUM);
									
									 if($row[0])
									 {
										
											$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
											$charactersLength = strlen($characters);
											$randomString = '';
											for ($i = 0; $i < 5; $i++) {
												$randomString .= $characters[rand(0, $charactersLength - 1)];
											}
											
											
											//echo $randomString;
											$result = $conn->query("UPDATE  6470exerciseusers set PASSWORD_HASH = '".sha1($randomString)."'  where USERNAME= '".$_POST["username"]."' and PHONE= '".$_POST["phone"]."' ");
											
											if($result)
											{
												$passowrd_change=1;
											}
									 }
									 else
									 {
										 
										$user_available=0;
									 
									 }
								}
								
							  
							  
							  
							}
?>
						


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Problem 3 part 2 Forgot Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top: 4%">
<h3>Exercise:3 | Part:2 | Forgot password</h3>
  <div class="well">
  

  <div class="container">
	<div class="row">
	<div class="col-md-10">
	<form <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
			<h3  style="color: #e65755">Forgot Password ?</h3>
			<p>Provide the details below to reset your password.</p>
			<hr>
			
			<?php
					if(isset($_POST["getpwd"]) && isset($passowrd_change) && $passowrd_change==1)
					{
						echo "<h4 style='color:green'>Password updated successfully. Your new password is : <b>".$randomString."</b></h4> ";
					}
					else if(isset($_POST["getpwd"]) && isset($user_available) && $user_available==0)
					{
						echo "<h4 style='color:red'>User name or Phone number doesn't matched.</h4>";
					}

				
				?>
			
		
			<label for="email"><b>Username</b></label>
			<input type="text" class="form-control" placeholder="Enter Username" name="username" id="email" required  autocomplete="off" />
			</br>


			<label for="psw-repeat" ><b>Phone</b></label>
			<input type="text" class="form-control" placeholder="10 digit phone number" pattern="[7-9]{1}[0-9]{9}"  maxlength="10" name="phone" id="phone" required  autocomplete="off" />
			</br>
			<hr>
			<button type="submit" class="btn btn-primary" name="getpwd">Get Password</button>
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