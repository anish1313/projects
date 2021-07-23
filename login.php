<?php

							session_start();

							if(!empty($_SESSION['userId']))
							 {
								header('location:home.php');
							 }							
							include 'common_db.php';
							
					

							
							if ($_SERVER["REQUEST_METHOD"] == "POST") 
							
							{
								
								if(isset($_POST["username"]) && isset($_POST["psw"]))
								{
									 
									 
										
									$result = $conn->query("select count(*) from 6470exerciseusers where USERNAME= '".$_POST["username"]."' and PASSWORD_HASH = '".sha1($_POST["psw"])."' ");
										
									$row = $result -> fetch_array(MYSQLI_NUM);
									
									 if($row[0])
									 {
										 
										 if(!empty($_POST["remember"]))
										 {
											 setcookie("username",$_POST["username"],time()+(10*365*24*60*60));
											 setcookie("pws",$_POST["psw"], time()+(10*365*24*60*60));
										 }
										 
										 else
										  {
											  if(isset($_COOKIE['username']))
											  {
												  setcookie("username","");
											  }
											  if(isset($_COOKIE['pws']))
											  {
												  setcookie("pws","");
											  }
												 
										  }
										  $_SESSION['userId']=$_POST["username"];
										  $_SESSION['password']=sha1($_POST["psw"]);
										  header('location:home.php');
									 }
									 else
									 {
										 $invalid_credentials =1;
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
<h3>Exercise:3 | Part:3 | writing login form</h3>
  <div class="well">
  

  <div class="container">
	<div class="row">
	<div class="col-md-10">
	<form <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
			<h3>Login to your Account</h3>
			
			
			
			<label for="email"><b>Username</b></label>
			<input type="text" class="form-control" value="<?php if (isset($_COOKIE['username'])){ echo $_COOKIE['username'];} ?>" placeholder="Enter Username" name="username" id="email" required  autocomplete="off" />
			</br>

			<label for="psw"><b>Password</b></label>
			<input type="password" class="form-control" value="<?php if (isset($_COOKIE['pws'])){ echo $_COOKIE['pws'];} ?>" placeholder="Enter Password" name="psw" id="psw" required  autocomplete="off" />
			</br>
			
			<label>
					<input type="checkbox" <?php if (isset($_COOKIE['username'])){ ?> checked="checked" <?php } ?> name="remember"> Remember me
			</label>
				</br>
				</br>
			<button type="submit" class="loginbtn btn btn-primary">Login</button>
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="forgotpassword.php"><input type="button" value="Forgot Password ?" class="btn btn-warning" /></a>
			
			<?php
					if(isset($_POST["username"]) && isset($invalid_credentials) && $invalid_credentials==1)
					{
						echo "<h4 style='color:brown'>Invalid Credentials, please try again.</h4>";
					}

				
				?>
				
			 </form>
			 
			 
		  </div>
	</div>

		  



  </div>
  </div>
</div>

</body>
</html>