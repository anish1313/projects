<?php

/*Write a function countWords($str) that takes any string of characters and finds the
number of times each word occurs. You should ignore the distinction between capital and
lowercase letters, and do not have to worry about dealing with characters that are not letters.
Hint: Create an associative array mapping word keys to the number of times they occur. You will
need to look at PHP&#39;s string functions to split a sentence into words.
Hint 2: The print_r($array_name) function is useful for examining the contents of
an array. */
				class exercise_two
						{
												

							public function countWords($string)
							{	
								
								$storewords = array(); //array declaration
								$string =  strtolower($string);  //converting all words to lowercase to ignore the difference
								$splitwords = explode(" ",$string); //Spliting String into each words.
								for($i=0;$i<count($splitwords);$i++)
								{
									$cnt = substr_count($string,$splitwords[$i]); //Searching for substring 
									$storewords[$splitwords[$i]]= $cnt;
								}
								
								echo "<pre>";print_r($storewords);
							}
						}

												
												

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Exercise:2 | Part:1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container" style="margin-top: 15%">
<strong>Note:</strong> You can change the string in the function countWords() in prob2.php file
  <div class="well"><?php  
  
		$obj = new exercise_two();
		$checkOccurance = $obj->countWords("hello my name is name my Hello MY IS"); //pass any String
		

  
  ?></div>
</div>

</body>
</html>