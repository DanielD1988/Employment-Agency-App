<?php
	/*
		Daniel Dinelli
		C00242741
		Retrive fields from the database where the course isn't finished and course status is equal to taking bookings
	*/
	include "connect.php";
	$todaysDate = date("Y-m-d");//https://www.w3schools.com/php/php_date.asp         //date_add returns the time and the date. Using the date function around the date_add will retive the date part only to be used for comparing
	$sql = "SELECT CourseID,CourseTitle,CourseProvider,Description,Fee,Venue,NumPlaces,placesRemaining,StartDate,CourseLength,StartTime,EndTime,CourseStatus FROM Training where DATE(DATE_ADD(StartDate, INTERVAL CourseLength DAY)) > '$todaysDate' and CourseStatus = 'Taking Bookings'";//https://stackoverflow.com/questions/4098539/mysql-date-add-doesnt-work-in-where-clause
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
	
	while($row = mysqli_fetch_array($result)){
		$id = $row['CourseID'];
		$title = $row['CourseTitle'];
		$provider = $row['CourseProvider'];
		$description = $row['Description'];
		$fee = $row['Fee'];
		$venue = $row['Venue'];
		$startDate = date_create($row['StartDate']);
		$startDate = date_format($startDate,"Y-m-d");
		$courseLength = $row['CourseLength'];
		$startTime = $row['StartTime'];
		$endTime = $row['EndTime'];
		$allText = "$id^$title^$provider^$description^$fee^$venue^$startDate^$courseLength^$startTime^$endTime";
		echo "<option value = '$allText'>$title</option>";
	}
	echo "</select>";
	mysqli_close($con);
?>