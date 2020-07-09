<!-- 
	Daniel Dinelli
	C00242741
	A from to select a training course for deletion that is finished
-->
<!DOCTYPE html>
<html lang="en">
	<head>
	<DIV ALIGN=CENTER>
	<A HREF="mainMenu.html"><IMG SRC="logo.png"></a>
		<meta charset="UTF-8">
		<title>Delete Training Course </title>
		<script>
		function populate(){//fills the input fields with data from a selected course
			var sel = document.getElementById("listbox");
			var result;
			result = sel.options[sel.selectedIndex].value;
			var personDetails = result.split(',');
				document.getElementById("courseId").value = personDetails[0];
				document.getElementById("title").value = personDetails[1];
				document.getElementById("Course").value = personDetails[2];
				document.getElementById("Description").value = personDetails[3];
				document.getElementById("venue").value = personDetails[4];
				document.getElementById("start").value = personDetails[5];
				document.getElementById("length").value = personDetails[6];
		}
		function confirmCheck(){//unlocks fields for posting when the user picks yes
			var response;
			response = confirm('Are you sure you want to save these changes?');
			if(response){
				window.alert("The record was updated sucessfully");
				document.getElementById("courseId").disabled = false;
				return true;
				}
			else{
				populate();
				return false;
				}
		}
		</script>
		<style> 

		ul {   /*NAV BAR*/
		  display: inline-block;    /* inline element you can apply height and width values*/
		  list-style-type: none;    /*No bullet points*/
		  margin: 0;
		  padding: 0 0 40px 0;
		  overflow: hidden;
		  background-color: white;
		  text-align:center;
		  font-family: Arial, Helvetica, sans-serif;
		}
		
		
		li {
			float: left;
		}
		
		li a, .dropbtn {
		  display: block;
		  color: rgb(65,105,225); /* NAV BAR OPTIONS royal blue*/
		  font-style:bold;
		  font-size:20px;
		  text-align: center;
		  padding: 20px 60px;
		  text-decoration: none;
		  display: inline-block;
		}
	


		li a:hover, .dropdown:hover .dropbtn { /*dropdown hover options*/
			background-color: rgb(65,105,225); /*royal blue*/
			color:white;  /*text*/
			}

		li.dropdown {
		  display: inline-block;
		}
		
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9; /*background of dropdown menu - white*/
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none; /*options such as underline */
		  display: block;
		  text-align: left;
		}

		.dropdown-content a:hover {
		  background-color: rgb(65,105,225); /*royal blue*/
		}

		.dropdown:hover .dropdown-content {
			display: block;   /*dropdown content text before cursor hovers*/
		}
		
		li a:hover:not(.active){ /*dropdown option not active*/
			background-color: #314891;  /*DARK BLUE*/
			color:white;   /*dropdown content text when cursor hovers over*/
		 
		}
		
		li a.active { /*dropdowncontent options that are active*/
			background-color: rgb(65,105,225); /*royal blue*/
			color:white;
		}



		
		.frame {
			padding: 10px;
			border-style: hidden;
			border: solid;
			border-radius: 12px; /*rounded border*/
			border-color: rgb(65,105,225); /*royal blue*/
			height: 500px;
			width:  430px;
		}
	
		.title {
			text-align: center;
			color:rgb(65,105,225); /*royal blue*/
			font-size:20px;
			padding: 0 0 10px 0;
			font-family: Arial, Helvetica, sans-serif;
		}
	
	
		.inputbox1 {   
			padding:5px 50px;
			font-family: Arial, Helvetica, sans-serif;
			color:rgb(65,105,225); /*royal blue*/
		}
	

	
		.boxcentre { /*align buttons*/
			text-align:center;
			padding:20px;
		}
	
		.button {
			background-color:  #314891; /*dark blue*/
			border: none;
			border-radius:8px;
			color: white;
			padding: 15px 32px;
			text-align: center;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		.left {
		  text-align: left;
		}
	</style>
	</head>
	<body>
	<div>
			<ul>
			   <li class="dropdown">
					<a href="#" class="dropbtn">Company</a>
					<div class="dropdown-content">
					  <a href="#">Add A New Company</a>
					  <a href="#">Delete A Company</a>
					  <a href="#">Amend / View A Company</a>
					</div>
				  </li>
			 <li class="dropdown">
					<a href="#" class="dropbtn">Client</a>
					<div class="dropdown-content">
					  <a href="#">Add A New Client</a>
					  <a href="#">Delete A Client</a>
					  <a href="#">Amend / View A Client</a>
					</div>
			</li>
			 <li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn active">Training</a>
					<div class="dropdown-content">
					  <a href="enroleOnCourse.php">Enrol On A Course</a>
					  <a href="#">Cancel An Enrolment</a>
					  <a href="addCourse.html">Add A New Training Course</a>
					  <a href="deleteChoice.html">Delete A Training Course</a>
					  <a href="editCourse.php">Amend / View A Training Course</a>
					</div>
			</li>
			<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Job</a>
					<div class="dropdown-content">
					  <a href="#">Add A New Job</a>
					  <a href="#">Delete A Job</a>
					  <a href="#">Amend / View A Job</a>
					  <a href="#">Fill A Job</a>
					</div>
			</li>
				  
				    <li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">Reports</a>
					<div class="dropdown-content">
					  <a href="#">Companies & Job Vacancies Report</a>
					  <a href="#">Training Courses Report</a>
					  <a href="#">Job Vacancies Report</a>
					   <a href="#">Training Course Enrollent Report</a>
					    <a href="mainMenu.html">Quit</a>
					</div>
				  </li>
			 
			 
		
			  <li><a href="https://www.google.com/">Quit</a></li>
			</ul>
	</div>	
	
	
<section class="frame">
	<form action="autoDeleteStatus.php" method="Post" onsubmit = "return confirmCheck()">
		<header class="title">
			<h1>Delete Training Course</h1>
			Please select a course to delete
		</header>
		<article class="inputbox1">
		<div class = "left">	
			<div class="inputbox"><!-- For list box-->
				<div style="float:center">
					<?php include 'deleteListBoxAuto.php';?>
					<input style="float:right;" type="hidden" name="courseId" id="courseId" disabled />
				</div>
			</div>
			<br>
			<div class="inputbox"><!-- For course title-->
				<label for="title">Course Title: </label>
				<input style="float:right;" type="text" name="title" id="title" placeholder="Enter Course Title"  disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For course Provider-->
				<label for="Course">Course Provider: </label>
				<input style="float:right;" type="text" name="Course" id="Course" placeholder="Enter Course Provider"  disabled />
			</div>
			<br>
			<div class="inputbox"><!-- For course description-->
				<label for="Description">Course Description: </label>
				<textarea style="resize:none;" id="Description" name="Description" placeholder="Enter Course Description" rows="2" cols="40" disabled ></textarea>
			</div>
			<br>
			<div class="inputbox"><!-- For course venue-->
				<label for="venue">Course Venue: </label>
				<input style="float:right;" type="text" name="venue" id="venue" placeholder="Enter Venue for course"  disabled />
			</div>
			<br>
			<div class="inputbox"><!--Start date for course-->
				<label for="start">Start Date: </label>
				<input style="float:right;" type="date" name="start" id="start"  disabled />
			</div>
			<br>
			<div class="inputbox"><!-- Course Length-->
				<label for="length">Course Length in Days: </label>
				<input style="float:right;" type="number"  name="length" min = "1" max = "360" id="length" placeholder="1-360" disabled />
			</div>
			<br>
		</div>
			
		</article>
			<article class="boxcentre">
			<input style="float:center;" type="submit" class="button" value="Delete">
			<input style="float:center;" type="reset" class="button" value="CLEAR">
			</article>
	</form>
		</section>
	</body>
</html>