<?php
	/*
		Daniel Dinelli
		C00242741
		Retrive fields where the course is finished so the status can be set to completed
	*/
	include "connect.php";
	$todaysDate = date("Y-m-d");//https://www.w3schools.com/php/php_date.asp         //date_add returns the time and the date. Using the date function around the date_add will retive the date part only to be used for comparing
	$sql = "SELECT CourseID,CourseTitle,CourseProvider,Description,Venue,StartDate,CourseLength FROM Training where '$todaysDate' >= DATE(DATE_ADD(StartDate, INTERVAL CourseLength DAY)) and CourseStatus = 'Taking Bookings'";//https://stackoverflow.com/questions/4098539/mysql-date-add-doesnt-work-in-where-clause
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
		$startDate = date_create($row['StartDate']);
		$startDate = date_format($startDate,"Y-m-d");
		$courseLength = $row['CourseLength'];
		$allText = "$id,$title,$provider,$description,$venue,$startDate,$courseLength";
		echo "<option value = '$allText'>$title</option>";
	}
	echo "</select>";
	mysqli_close($con);
?>