<?php
	$hostname = "localhost";
	$username = "recruitment";
	$password = "T3mp0rary";
	$dbname = "EmploymentAgency";
	
	$con = mysqli_connect($hostname,$username,$password,$dbname);
	
	if(!$con){
		die ("Falied to connect to MySQL " . mysqli_connect_error());
	}
?>	