/*
	Daniel Dinelli
	Functions to test start date, start time and end time of a course
*/
function DateCheck(input)
	 {
		 var startDate = new Date (input.value);
		 var today = new Date();
		 
		 
		 //to get rid of hour,min,sec,millisecond
		 //startdate does not include time
		
		today.setHours(0,0,0,0);
		 
		 //compare two dates as dates only without time
		 if (startDate >= today){
			 input.setCustomValidity('');
			 
		 }
		 else{
			 //input is valid reset error message
			 
			 input.setCustomValidity('Start Date Must Be Today or Later');
		 }
 }
 function CheckStartTime(input)
	 {
		var time = input.value;
		var hour = time.split(':')[0];//Take hours from time
		var minutes = time.split(':')[1]; //Take minites from time
		var conactTime = hour + minutes; //concate hour and minite without colon 
		parseInt(conactTime);//parse minute and hour together to get time in range
		if (conactTime > 0659 && conactTime <= 1000){//check if in range
				 input.setCustomValidity('');
		 }
		 else {
			 //input is valid reset error message
			input.setCustomValidity('Course start time is 7am to 10am');
		 }
 }
 function CheckEndTime(input)
	 {
		var time = input.value;
		var hour = time.split(':')[0];//Take hours from time
		var minutes = time.split(':')[1];//Take minites from time
		var concatTime = hour + minutes; //concate hour and minite without colon 
		parseInt(concatTime);//parse minute and hour together to get time in range
		if (concatTime > 1259 && concatTime <= 2100){//check if time is in range
				 input.setCustomValidity('');
		 }
		 else {
			 //input is valid reset error message
			input.setCustomValidity('Course end time is 1pm to 9pm');
		 }
 }
 function confirmCheck()//checks if you are sure you want to add training course
	{
		var response;
		response = confirm('Are you sure you want to add this record to the training course table?');
		if(response){
			window.alert("The record was entered sucessfully");
			return true;
		}
		else{
			return false;
		}
}
