<?php
	/*
		Daniel Dinelli
		C00242741
		used to get a list of client names and ids
	*/
	include 'connect.php';
	$sql = "SELECT Name,DOB,ClientID FROM Client";
	if(!$result = mysqli_query($con,$sql)){
		die('Error in querying the database' . mysqli_error($con));
	}
	echo "<select name = 'listbox2' id = 'listbox2' onclick = 'populates()'>";
	
	while($row = mysqli_fetch_array($result)){
		$name = $row['Name'];//gets client name form database
		$id = $row['ClientID'];
		$dob = $row['DOB'];
		$allText = "$id^$name^$dob";
		echo "<option value = '$allText'>$name</option>";
	}
	echo "</select>";
?>