<?php
	/*
		Daniel Dinelli
		C00242741
		Retrive fields from database where the course has no students, course is taking bookings and the course isn't finished
	*/
	include "connect.php";
	$todaysDate = date("Y-m-d");//https://www.w3schools.com/php/php_date.asp         //date_add returns the time and the date. Using the date function around the date_add will retive the date part only to be used for comparing
	$sql = "SELECT CourseID,CourseTitle,CourseProvider,Description,Venue,NumPlaces,StartDate,CourseLength,StartTime,EndTime FROM Training where placesRemaining = NumPlaces and CourseStatus = 'Taking Bookings' and DATE(DATE_ADD(StartDate, INTERVAL CourseLength DAY)) > '$todaysDate'";
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
	
	while($row = mysqli_fetch_array($result)){
		$id = $row['CourseID'];
		$title = $row['CourseTitle'];
		$provider = $row['CourseProvider'];
		$description = $row['Description'];
		$venue = $row['Venue'];
		$places = $row['NumPlaces'];
		$startDate = date_create($row['StartDate']);
		$startDate = date_format($startDate,"Y-m-d");
		$courseLength = $row['CourseLength'];
		$startTime = $row['StartTime'];
		$endTime = $row['EndTime'];
		$allText = "$id,$title,$provider,$description,$venue,$places,$startDate,$courseLength,$startTime,$endTime";
		echo "<option value = '$allText'>$title</option>";
	}
	echo "</select>";
	mysqli_close($con);
?>