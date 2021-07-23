<?php

							session_start();					
							include 'common_db.php';
							
							 if($_SESSION['userId']=="")
							 {
								header('location:logout.php');
							 }
					

							
							if ($_SERVER["REQUEST_METHOD"] == "POST") 
							
							{
								
								if(isset($_POST["cpwd"]) && isset($_POST["npwd"]) && isset($_POST["update"]))
								{
									 
									 $checkpwd = $conn->query("select count(*) from 6470exerciseusers where USERNAME= '".$_SESSION['userId']."' and PASSWORD_HASH = '".sha1($_POST["cpwd"])."' ");
									 
									 $return = $checkpwd -> fetch_array(MYSQLI_NUM);
									 if($return[0])
									 {
										
									$result = $conn->query("UPDATE  6470exerciseusers set PASSWORD_HASH = '".sha1($_POST["npwd"])."'  where USERNAME= '".$_SESSION['userId']."' ");
									
									
									 if($result)
									 {
										 $incorrect_pwd =0;
									 }
									 else
									 {
										 $invalid_credentials =1;
									 }
									 
									 }
									 else
									 {
										  $incorrect_pwd =1;
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
	<div class="col-md-8">
	
			<form <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
			<h3><span style="color: #e65755">Welcome Home,</span> <span style="color:blue"><?= $_SESSION['userId'] ;?></span></h1>
			
			</br>
			</br>
			<h4><u>Update Your Password</u></h4>
			</br>
			</br>
			<?php
					if(isset($_POST["update"]) && isset($incorrect_pwd) && $incorrect_pwd==1)
					{
						echo "<h4 style='color:brown'>It seems current password doesn't matched, please try again.</h4> </br>" ;
					}
					elseif(isset($_POST["update"]) && isset($incorrect_pwd) && $incorrect_pwd==0)
					{
						echo "<h4 style='color:green'>Password updated successfully!</h4> </br>";
					}

				
				?>
			<label for="email"><b>Current Password</b></label>
			<input type="password" class="form-control" placeholder="Enter Current Password" name="cpwd" id="cpwd" required  autocomplete="off" />
			</br>

			<label for="psw"><b>New Password</b></label>
			<input type="password" class="form-control" placeholder="Enter Updated Password" name="npwd" id="npwd" required  autocomplete="off" />
			</br>

			<button type="submit" class="loginbtn btn btn-primary" name="update" >Update</button>
			
				
			 </form>
			
	</div>
	
	<div class="col-md-4" style="margin-top:2%">
	
			<a href="logout.php"><input type="button" value="Logout" class="btn btn-danger" /></a>
			
	</div>
	</div>

		  

  </div>
  </div>
</div>

</body>


<script type="text/javascript">
		$("form").submit(function(){
			
			let cpwd= $("#cpwd").val();
			let npwd= $("#npwd").val();
			if(cpwd == npwd)
			{
				alert("New Password can not be same as old password");
				return false;
			}
			else
			{
				return true;
			}
			
		}); 
		
</script>
</html>