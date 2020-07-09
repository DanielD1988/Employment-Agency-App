<?php
	/*
		Daniel Dinelli 
		C00242741
		A statement to set the status to cancelled on courses that have no students
	*/
	include "connect.php"; //database connection
	$status = "cancelled";
	//update status for course status
	$stmt = $con->prepare("UPDATE Training SET CourseStatus=? WHERE CourseID=?");
	$stmt->bind_param("si",$status,$_POST[courseId]);
	$stmt->execute();
	mysqli_close($con);
	header('Location:manualDelete.php');//go back to manual delete form
?>