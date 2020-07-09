<!-- 
	Daniel Dinelli
	C00242741
	A from to select a student to have a letter printed for them
-->
<!DOCTYPE html>
<html lang="en">
	<head>
	
	<DIV ALIGN=CENTER>
	<A HREF="mainMenu.html"><IMG SRC="logo.png"></a>
		<meta charset="UTF-8">
		<title>Select Student for printing a Letter </title>
		<script>
		function populate(){//fills a text field with the selected clients name
			var sel = document.getElementById("listbox");
			var result;
			result = sel.options[sel.selectedIndex].value;
			var personDetails = result.split(',');
			document.getElementById("name").value = personDetails[0];
		}
		</script>
		<style> 

		.frame {
			padding: 10px;
			border-style: hidden;
			border: solid;
			border-radius: 12px; /*rounded border*/
			border-color: rgb(65,105,225); /*royal blue*/
			height: 300px;
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
<section class="frame">
	<form action="letter.php" method="Post"">
		<header class="title">
			<h1>Print Letter</h1>
			Please select student enrolled on course
		</header>
		<article class="inputbox1">
		<div class = "left">	
			<div class="inputbox"><!-- For list box-->
				<div style="float:center">
					<label for="name">Student Name</label>
					<?php include 'listClientNames.php';?>
				</div>
			</div>
			<br>
			<div class="inputbox"><!-- For Client name-->
				<input type="hidden" name="name" id="name" placeholder="Client Name" />
			</div>
			<br>
		</article>
			<article class="boxcentre">
			<input style="float:center;" type="submit" class="button" value="Print">
		</article>
	</form>
		</section>
	</body>
</html>