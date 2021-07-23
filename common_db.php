<?php


$servername = "localhost";  //server name
$username = "root";			//user name as root
$password = "";				//password to connect db

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql1 = "SHOW DATABASES LIKE '6470'";
if ($conn->query($sql1) === TRUE) 
{
	echo "hi";
}
else{
// Create database
$sql = "CREATE DATABASE `6470` ";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
  
  

  
  $table_query = "CREATE TABLE `6470`.`6470exerciseusers` ( `id` INT NOT NULL AUTO_INCREMENT , `USERNAME` VARCHAR(100) NOT NULL , `PASSWORD_HASH` CHAR(40) NOT NULL , `PHONE` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`))";
		
		if ($conn->query($table_query) === TRUE)
		{
			
			echo "Table  created successfully";
		}
}
  
}

$sql4 = "USE `6470`";

$conn->query($sql4); 



?>




  
  
  