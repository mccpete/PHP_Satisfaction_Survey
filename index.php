<!DOCTYPE html>
<html>
<head>
<title>Resturant Survey</title>
<meta charset="UTF-8">
</head>

<form action="index.php" method="POST">

<!-- Here I have some heading tags that display the page name, assignment name, and my name -->
<h1 align="center">Resturant Customer Satisfaction Survey</h1>

<h2 align="center">Peter McLane</h2>

<h3 align="center">Assignment 2</h3>


<style>
/*I changed the background ofthe page to turquoise*/
body{
	background-color: Turquoise;
}

/*Centering the form so it is easier to see on screen*/

.center {
  text-align: center;
  
}
/*For the following h1, h2, and h3 tags I added a different font type so they look nice */
h1{

	font-family: FreeMono, monospace;
}

h2{
	font-family: FreeMono, monospace;
}

h3{
	font-family: FreeMono, monospace;
}

</style>
<!-- Here I created a div block that centers the form on the screen -->
<div class="center">

<?php
//Here are my post requests that will be needed in the form

$number = isset($_POST['number']) ? $_POST['number'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$comments = isset($_POST['comments']) ? $_POST['comments'] : '';
$excellent = isset($_POST['excellent']) ? $_POST['excellent'] : '';
$good = isset($_POST['good']) ? $_POST['good'] : '';
$bad = isset($_POST['bad']) ? $_POST['bad'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';

//This if statement checks to see if everything was filled out 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($number == ""){
		//Checks if number was filled out 
		echo "<br /> Please enter a phone number so we can contact you!<br />";
	}
	
	if ($name == ""){
		//Checks if you wrote your name
		echo "<br />Please enter your first and last name!<br />";
	}
	
	if ($email == ""){
		//Checks if you entered your email
		echo "<br />Please enter your email so we can send you updates!<br />";
	}
	
	if ($comments == ""){
		//Checks if you entered comments
		echo "<br />Please enter some comments below about your experience with us!<br />";
	}
	
	if ($location == ""){
		//Checks if you entered location
		echo "<br />Please select which location you dined with us at!<br />";
	}
	
}


?>
<br>


<!-- Here I have a text field for phone number with some php included to make it sticky -->
Phone Number: 
<input type="text" name="number" value="<?php if (isset($number)) {echo $number;} ?>" />
<br /><br />

<!-- Here I have a text field for persons name with some php included to make it sticky -->
Name:
<input type="text" name="name" value="<?php if (isset($name)) {echo $name;} ?>" />
<br /><br />

<!-- Here I have a text field for customer email with some php included to make it sticky -->
Email to Receive Updates and Promotions:
<input type="text" name="email" value="<?php if (isset($email)) {echo $email;} ?>" />
<br /><br />

<!-- Here are the following radio buttons needed to select your dining location with some php included to make it sticky -->
Location you ate Dinner at:
Milwaukee<input type="radio" name="location" value="Milwaukee" <?php if ($location == 'Milwaukee') {echo "checked='checked'";}?> /> | 
Franklin<input type="radio" name="location" value="Franklin" <?php if ($location == 'Franklin') {echo "checked='checked'";}?> /> | 
Sussex<input type="radio" name="location" value="Sussex" <?php if ($location == 'Sussex') {echo "checked='checked'";}?>/> |
<br /><br />

How Would you Rate our Service?

<!-- Here I have the the checkboxes needed to select your rating of the resturant with some php included to make it sticky -->
<input type="checkbox" name="excellent" value="excellent" <?php if ($excellent == 'excellent') {echo 'checked'; }?> /> Excellent |
<input type="checkbox" name="good" value="good" <?php if ($good == 'good') {echo 'checked'; }?> /> Good |
<input type="checkbox" name="bad" value="bad" <?php if ($bad == 'bad') {echo 'checked'; }?> /> Bad |
<br /><br />

Please Enter the Date you Dined with us:


<?php 
//This is the code for my php array drop down menu

//Here we have the array populated along with a merged default value for days
$days = range(1, 31);
$daysdefault = array ('Day');
$daysarray = array_merge($daysdefault, $days);

echo '<select name="day">';

//for each loop to display values
foreach ($daysarray as $value) {
    if ($_POST['day'] == $value) {
        
        $isselected = "selected";
    }
    else {
        
        $isselected = "";
    }
    
    echo "<option value=\"$value\" $isselected>$value"."</option>\n";
}

echo "</select>";

//Here we have the array populated along with a merged default value for months
$months = array ( 1 => 'December', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November');
$monthsdefault = array ('Month');
$monthsarray = array_merge($monthsdefault, $months);

echo '<select name="month">';

//for each loop to display values
foreach ($monthsarray as $value) {
    if ($_POST['month'] == $value) {
        
        $isselected = "selected";
    }
    else {
        
        $isselected = "";
    }
    
    echo "<option value=\"$value\" $isselected>$value"."</option>\n";
}

echo "</select>";
//Here we have the array populated along with a merged default value for years

$years = range (2000, 2022);
$yearsdefault = array ('Year');
$yearsarray = array_merge($yearsdefault, $years);

echo '<select name="year">';

//for each loop to display values
foreach ($yearsarray as $value) {
    if ($_POST['year'] == $value) {
        
        $isselected = "selected";
    }
    else {
        
        $isselected = "";
    }
  
    echo "<option value=\"$value\" $isselected>$value"."</option>\n";
}

echo "</select>";


?>

 
<br /><br />

<!-- Here I have the comments box so customers can leave additional feeback id needed with some php included to make it sticky -->
Comments About our Service:
<br />
<textarea name="comments" cols="80" rows="6"><?php if (isset($comments)) {echo $comments;}?></textarea>
<br /><br />
<!-- Submit button so the user can submit the form -->
<input type="submit" name="submit" value="Submit My Info" />

<br />
<br />

<?php
//Here I have a conditional if statement that tells the user what information they put into the form only if they have everything required filled out
if (($number != NULL) && ($name != NULL) && ($email != NULL) && ($comments != NULL) && ($location != NULL)){
	
	//Tells user form was submitted correctly 
	echo "Your form was filled out correctly! Thank you for taking the time to do so!";
	echo "</br>";
	//Tells the user what they inputted for their phone number
	echo "Your Phone number is: $number";
	echo "</br>";
	//Tells the user what they put for their name 
	echo "Your name is written as: $name";
	echo "</br>";
	//Tells the user what they put as their email
	echo "Your email we can contact you is: $email";
	echo "</br>";
	//Tells the user what their comments said
	echo "Your feedback states: $comments";
	echo "</br>";
	//Tells the user what location they selected 
	echo "The location you dined with us is: $location";		

	}

	
	?>

</div>
</form>
</body>
</html>


