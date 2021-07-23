<?php

/*Write a function countWords($str) that takes any string of characters and finds the
number of times each word occurs. You should ignore the distinction between capital and
lowercase letters, and do not have to worry about dealing with characters that are not letters.
Hint: Create an associative array mapping word keys to the number of times they occur. You will
need to look at PHP&#39;s string functions to split a sentence into words.
Hint 2: The print_r($array_name) function is useful for examining the contents of
an array. */
									


							
							if ($_SERVER["REQUEST_METHOD"] == "GET") {
								
								if(isset($_GET["name"]))
								{
									echo "<center style='margin-top:10%'><b>You have Entered:</b> ".$name = $_GET["name"]."</center>";
								}
							  
							  
							  
							}


?>
						


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Exercise:2 | Part:2</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top: 15%">
  <div class="well">
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="myForm">
		<input type="text" name="name" class="form-control" placeholder="Enter String here" required>
		<br>
		<br>
		<br>
		<input type="submit" name="submit" value="SUBMIT" class="btn btn-warning">
</form>
  
  
  
  </div>
</div>

</body>
</html>