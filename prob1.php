<?php

/*Part 1: Charlie will bite your finger exactly 50% of the time. First, write a function
isBitten() that returns TRUE with 50% probability, and FALSE otherwise.
Hint: You may find the rand() function useful. */
class bite
											{
												public $bitten;
												
												public $result;

												function __construct($rand)  //CONSTRUCTOR will automatically called once object is created.
												{		
												$this->bitten = $rand;
												}

												public function isBitten()
												{
													if ($this->bitten > 0.50)
													{
														$result = "Probablity= ".$this->bitten .", so it's TRUE </br> Charlie bit your finger!";
													}
													else
													{
														$result = "Probablity= ". $this->bitten  .", so it's FALSE </br> Charlie did not bite your finger!";
													}
													
													return $result;
												}
											}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Problem 1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top: 15%">
<h3>Exercise:1</h3>
  <div class="well">
  
  <?php  
  
		$rand = mt_rand( 0, 10 ) / 10; // maximum value of Probablity can be 1
		$Charlie = new bite($rand);
		echo $checkValue = $Charlie->isBitten();
		
		
  
  ?>
  </br>
  </br>
		<input type="button" value="Refresh Page" onClick="refresh()" class="btn btn-primary"/>
  
  
  </div>
</div>

</body>


<script>
		function refresh()
		{
			location.reload();
		}
</script>
</html>