<?php

$host = "localhost"; 
$user = "root"; 
$pass = "rootpassword"; 
$db = "datamigration"; 
$db2 = "ecologyexplorers_data"; 

$mysqli_temp = new mysqli($host, $user, $pass);

if (mysqli_connect_errno())
{
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
}
$query = "CREATE DATABASE IF NOT EXISTS datamigration";
$result = $mysqli_temp->query($query) or die($mysqli_temp->error.__LINE__);
mysqli_close($mysqli_temp);

$mysqli_old = new mysqli($host, $user, $pass,$db2);
$mysqli_new = new mysqli($host, $user, $pass,$db);

$query_old_school = "SELECT * FROM school";
$result_old_school = $mysqli_old->query($query_old_school) or die($mysqli_old->error.__LINE__);

// GOING THROUGH THE DATA
	if($result_old_school->num_rows > 0) {
	
		$querySchool = "INSERT into schools (school_id,school_name,address,zipcode,city,date_entered) VALUES ";
		while($row = $result_old_school->fetch_assoc()) 
		{
			if($row['address'] == NULL)
				$row['address'] = 'NULL';
			if($row['zipcode'] == NULL)
				$row['zipcode'] = 'NULL';
			if($row['zipcode'] == 'test')
				$row['zipcode'] = 'NULL';
			$querySchool = $querySchool."('".$row['school_id']."','".$mysqli_old->real_escape_string($row['school_name'])."','".$row['address']."',".$row['zipcode'].",'".$row['city']."','".$row['date_entered']."'),";
		}
		$querySchool = substr($querySchool, 0, -1);
		$querySchool = $querySchool.";";
		
	}
	else {
		echo 'NO RESULTS';	
	}
	$result_old_school->close();
	

$query_new_school_table = "CREATE TABLE IF NOT EXISTS `schools` (
  `id` int NOT NULL AUTO_INCREMENT,
  `school_id` varchar(3) NOT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE(`school_id`),
  INDEX(`school_id`)
);";
$result_new_school_table = $mysqli_new->query($query_new_school_table) or die($mysqli_new->error.__LINE__);
$result = $mysqli_new->query($querySchool) or die($mysqli_new->error.__LINE__);
echo "Schools table inserted with data";
	
// CLOSE CONNECTION
	mysqli_close($mysqli_new);
	mysqli_close($mysqli_old);

?>


