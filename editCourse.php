<?php
/*
	Daniel Dinelli
	C00242741
	php to update info on the course and if students are enrolled go to a screen to print a letter
*/
include "connect.php"; //database connection
	session_start();
	date_default_timezone_set("UTC");//sets default time zone
	$date = date_create($_POST['start']); //creates new date object
	//session variables used for printing a student letter
	$_SESSION["id"] = $_POST[courseId];
	$_SESSION["title"] = $_POST[title];
	$_SESSION["course"] = $_POST[Course]; 
	$_SESSION["fee"] = $_POST[fee];
	$_SESSION["venue"] = $_POST[venue];
	$_SESSION["start"] = $_POST[start];
	$_SESSION["length"] = $_POST[length];
	$_SESSION["STime"] = $_POST[STime];
	$_SESSION["eTime"] = $_POST[eTime];

	$sql = "Select ClientID from Enrolement where CourseID = '$_POST[courseId]'";//check if Updated course has clients
	$result = mysqli_query($con,$sql); //run query 
	$rowcount = mysqli_affected_rows($con);// returns the number of affected rows in the previous selest statement
	
	if($rowcount >= 1){
		//Update prepare statement
		$stmt = $con->prepare("UPDATE Training SET CourseTitle=?, CourseProvider=?, Description=?, Fee=?, Venue=?, StartDate=?, CourseLength=?, StartTime=?, EndTime=? WHERE CourseID=?");
		$stmt->bind_param("sssdssissi",$_POST[title], $_POST[Course],$_POST[Description],$_POST[fee],$_POST[venue],$_POST[start],$_POST[length],$_POST[STime],$_POST[eTime],$_POST[courseId]);
		$stmt->execute();
		mysqli_close($con);
		header('Location:printForm.php');//go to print form if one or more students are enrolled on course
	}
	else if($rowcount == 0){
		//Update prepare statement
		$stmt = $con->prepare("UPDATE Training SET CourseTitle=?, CourseProvider=?, Description=?, Fee=?, Venue=?, StartDate=?, CourseLength=?, StartTime=?, EndTime=? WHERE CourseID=?");
		$stmt->bind_param("sssdssissi",$_POST[title], $_POST[Course],$_POST[Description],$_POST[fee],$_POST[venue],$_POST[start],$_POST[length],$_POST[STime],$_POST[eTime],$_POST[courseId]);
		$stmt->execute();
		mysqli_close($con);
		header('Location:editCourse.html.php');//go back to edit course form
	}
?>