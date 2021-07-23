<?php

									


							
							if ($_SERVER["REQUEST_METHOD"] == "GET") {
								
								if(isset($_GET["name"]))
								{
									 $name = $_GET["name"];
									 $call= countWords($name);
								}
							  
							  
							  
							}

							 function countWords($string)
							{	
								
								
								$storewords = array(); //array declaration
								$string =  strtolower($string);  //converting all words to lowercase to ignore the difference
								$splitwords = explode(" ",$string); //Spliting String into each words.
								for($i=0;$i<count($splitwords);$i++)
								{
									$cnt = substr_count($string,$splitwords[$i]); //Searching for substring 
									$storewords[$splitwords[$i]]= $cnt;
								}
								
								return $storewords;
							}
?>
						


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Problem 2 part 3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top: 5%">
<h3>Exercise:2 | Part:3</h3>
  <div class="form-group well">
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="myForm">
		<input type="text" name="name" class="form-control" placeholder="Enter String here" required>
		<br>
		<br>
		<br>
		<input type="submit" name="submit" value="SUBMIT" class="btn btn-warning">
</form>

<?php  

if(isset($_GET["name"]))
{

echo "</br></br><b>String you have entered: </b>". $name; 

 if(!empty($call)){ 
 
?>
</br>
</br>
<table class="table table-bordered">
		<thead>
			<tr>
			 <th scope="col">Word</th>
			 <th scope="col">Count</th>
			 </tr>
	  </thead>
	  
	   <tbody>

	<?php arsort($call); foreach($call as $key => $row){ ?>
	
	 <tr>
      <td><?php echo $key; ?></td>
      <td><?php echo $row;?></td>
    </tr>
	 
	
	<?php } ?>
	 </tbody>
</table>
<?php }  }?>
  
  
  
  </div>
</div>

</body>
</html>