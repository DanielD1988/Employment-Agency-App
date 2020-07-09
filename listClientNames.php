<?php
	/*
		Daniel Dinelli
		C00242741
		used to get client names that are on a specific course
	*/
	session_start();
	include 'connect.php';
	$sql = "SELECT Name FROM Client inner join Enrolement on Client.ClientID = Enrolement.ClientID where CourseID = '$_SESSION[id]' ";
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
	
	while($row = mysqli_fetch_array($result)){
		$name = $row['Name'];//gets clent name form database
		$allText = "$name";
		echo "<option value = '$allText'>$name</option>";
	}
	echo "</select>";
?>