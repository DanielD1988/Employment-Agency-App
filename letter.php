<?php
	/*
		Daniel Dinelli
		C00242741
		This php screen prints a letter for an enrolled student with up to date details of the course
	*/
	session_start();
	echo "Dear" . " " .$_POST['name'];
	echo "<br>You are enrolled on the course " . " " . $_SESSION['title'] . " " . "provided by " . " " .  $_SESSION["course"] . ".<br>" . "We wish to inform you that the following details have changed in relation to this course";
	echo "<br><br> Fee:" . " ". $_SESSION['fee'];
	echo "<br><br> Venue:" . " ". $_SESSION['venue']; 
	echo "<br><br> Start date:" . " ". $_SESSION['start']; 
	echo "<br><br> Number of days:" . " ". $_SESSION['length']; 
	echo "<br><br> Start time:" . " ". $_SESSION['STime']; 
	echo "<br><br> End time:" . " ". $_SESSION['eTime']; 
	echo "<br><br> If you wish discontinue with your enrolement on this course, please contact the agency to cancel your place."; 
	echo "<br><br> Kind regards";
	echo "<br><br><br> _________";
	echo "<br><br>Agency owner<br><br>";
?>
<html>
	<body>
		<a href="printForm.php"><button style="float:center;" >Return to Previous Screen</button></a> <!-- https://www.quora.com/How-do-I-add-a-link-to-button-in-HTML-->
		<a href="editCourse.html.php"><button style="float:center;" >Return to Amend Form</button></a> <!-- https://www.quora.com/How-do-I-add-a-link-to-button-in-HTML-->
	</body>
</html>