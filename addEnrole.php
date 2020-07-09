<?php
/*
	Daniel Dinelli
	C00242741
	Adding the enrolment form details to the database, removing one place in places remaining field in training and adding one to the number of courses field in client
*/
include 'connect.php';
	
	date_default_timezone_set("UTC");//sets default time zone
	$date = date_create($_POST['start']); //creates new date object
	
	$sql = "Select max(EnrolementID)as maxId from Enrolement";//gets max id from Enrolment
	$result = mysqli_query($con,$sql); //run query 
	$rowcount = mysqli_affected_rows($con);// returns the number of affected rows in the previous selest statement
	
	if($rowcount == 1){
		$row = mysqli_fetch_array($result);//retrives field names back from database
		$id = $row['maxId'] +1;//add ont to max id for new primary key
	}	
	else if(rowcount == 0){
		echo "It didn't work";
	}
	//used to add to enrolement table
	$depositDetails = "Paid";
	$stmt = $con->prepare("Insert into Enrolement (EnrolementID,DepositAmount,EnrolementDate,DepositDetails,ClientID,CourseID) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("idssii",$id,$_POST[deposit],$_POST[start],$depositDetails,$_POST[clientId],$_POST[courseId]);
	$stmt->execute();
	
	//places updated in placesRemaining training course field
	$sql = "UPDATE Training set placesRemaining = placesRemaining -1 WHERE CourseID = $_POST[courseId]";
	$result = mysqli_query($con,$sql); //run query 
	
	//training courses field in client table
	$sql = "Select NumOfCourses as number from Client WHERE ClientID = $_POST[clientId]";
	$result = mysqli_query($con,$sql); //run query 
	$rowcount = mysqli_affected_rows($con);// returns the number of affected rows in the previous selest statement
	
	if($rowcount >= 1){//add 1 to field
		$row = mysqli_fetch_array($result);//retrives field names back from database
		$id = $row['number'] +1;//add one on to NumOfCourses
	}	
	else if(rowcount == 0){//if no number found put 1 in field
		$id = 1;
	}
	$sql = "UPDATE Client set NumOfCourses = '$id' WHERE ClientID = $_POST[clientId]";
	$result = mysqli_query($con,$sql); //run query 
	////////////////////////////////////////////////////////
	if(!mysqli_query($con,$sql)){
		die("An Error in the SQL Query: " . mysqli_error());
	}
		mysqli_close($con);
		header('Location:enroleOnCourse.php');
?>