<?php
	/*
		Daniel Dinelli
		C00242741
		Retrive fields from database where status is taking bookings and where places remaining are greater than zero and the course is not completed
	*/
	include "connect.php";
	$todaysDate = date("Y-m-d");
	//DATE(DATE_ADD(StartDate, INTERVAL CourseLength DAY)) -- date_add returns the time and the date. Using the date function around the date_add will retive the date part only to be used for comparing
	$sql = "SELECT CourseID,CourseTitle,CourseProvider,Description,Fee,Venue,NumPlaces,placesRemaining,CourseLength,StartTime,EndTime,Fee * (10 / 100) as deposit FROM Training where CourseStatus = 'Taking Bookings' and placesRemaining > 0 and '$todaysDate' < DATE(DATE_ADD(StartDate, INTERVAL CourseLength DAY))";
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
	$startDate =  date("Y-m-d");
	while($row = mysqli_fetch_array($result)){
		$id = $row['CourseID'];
		$title = $row['CourseTitle'];
		$provider = $row['CourseProvider'];
		$description = $row['Description'];
		$fee = $row['Fee'];
		$venue = $row['Venue'];
		$courseLength = $row['CourseLength'];
		$startTime = $row['StartTime'];
		$endTime = $row['EndTime'];
		$deposit = intval($row['deposit']); //https://stackoverflow.com/questions/15193344/how-to-convert-a-decimal-string-into-an-integer-without-the-period-in-php
		//intval method gets back a whole number from a decimal or float number
		$allText = "$id^$title^$provider^$description^$fee^$venue^$startDate^$courseLength^$startTime^$endTime^$deposit";
		echo "<option value = '$allText'>$title</option>";
	}
	echo "</select>";
	mysqli_close($con);
?>