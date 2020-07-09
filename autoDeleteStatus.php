<?php
	/*
		Daniel Dinelli 
		C00242741
		Set status to completed on finished course
	*/
	include "connect.php"; //database connection
	$status = "completed";
	//update status for course status
	$stmt = $con->prepare("UPDATE Training SET CourseStatus=? WHERE CourseID=?");
	$stmt->bind_param("si",$status,$_POST[courseId]);
	$stmt->execute();
	mysqli_close($con);
	header('Location:autoDelete.php');//go back to auto delete form
?>