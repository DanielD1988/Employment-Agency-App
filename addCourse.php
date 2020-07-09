<?php
/*
	Daniel Dinelli
	C00242741
	Adding the training form data to database
*/
include 'connect.php';
	
	date_default_timezone_set("UTC");//sets default time zone
	$date = date_create($_POST['start']); //creates new date object
	$startTime = gmdate('s:i:H', $_POST[STime]);//formats the time before it is entered into database
	$endTime = gmdate('s:i:H', $_POST[eTime]);
	
	$sql = "Select max(CourseID)as maxId from Training";//gets max id from courseid
	$result = mysqli_query($con,$sql); //run query 
	$rowcount = mysqli_affected_rows($con);// returns the number of affected rows in the previous selest statement
	
	if($rowcount == 1){
		$row = mysqli_fetch_array($result);//retrives field names back from database
		$id = $row['maxId'] +1;//add ont to max id for new primary key
	}	
	else if(rowcount == 0){
		echo "It didn't work";
	}
	$status = "Taking Bookings";//when record made add taking bookings to status field
	$stmt = $con->prepare("Insert into Training (CourseID,CourseTitle,CourseProvider,Description,Fee,Venue,NumPlaces,placesRemaining,StartDate,CourseLength,StartTime,EndTime,CourseStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("isssdsiisisss",$id,$_POST[title], $_POST[Course],$_POST[Description],$_POST[fee],$_POST[venue],$_POST[places],$_POST[places],$_POST[start],$_POST[length],$startTime,$endTime,$status);
	$stmt->execute();
	if(!mysqli_query($con,$sql)){
		die("An Error in the SQL Query: " . mysqli_error());
	}
		mysqli_close($con);
		header('Location:addCourse.html');
?>