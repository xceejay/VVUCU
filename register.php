<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	// Enter the new user in the database

	$sql = "INSERT INTO users (email, password,fname,lname,phonenumber,residency,city,citizenship,gender,title,maritalstatus,DOB) VALUES (:email, :password,:fname,:lname,:phonenumber,:residency,:city,:citizenship,:gender,:title,:maritalstatus,:DOB)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	$stmt->bindParam(':fname', $_POST['fname']);
	$stmt->bindParam(':lname', $_POST['lname']);
	$stmt->bindParam(':phonenumber', $_POST['phonenumber']);
	$stmt->bindParam(':residency', $_POST['residency']);
	$stmt->bindParam(':city', $_POST['city']);
	$stmt->bindParam(':citizenship', $_POST['citizenship']);
	$stmt->bindParam(':gender', $_POST['gender']);
	$stmt->bindParam(':title', $_POST['title']);
	$stmt->bindParam(':maritalstatus', $_POST['maritalstatus']);
	$stmt->bindParam(':DOB', $_POST['DOB']);
	if( $stmt->execute() ):
		$message = 'Successfully created new user';

	header("Location:prelogin.php");
	else:
		$message = 'Sorry, you must have entered something wrongly';
	endif;

endif;

?>




<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>


	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>




	<?php if( !empty($user) ): ?>





<?php else: ?>
	<div id="navbar">

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="services.html">Services</a></li>
<li><a href="branches.html">Branches</a></li>
<li><a href="contactus.html">Contact Us</a></li>
<li><a href="aboutus.html">About Us</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>



	<?php endif; ?>
	<div style="margin-top:50px;font-size:18px;margin-right:20px">
	<h3><a href="login.php" style="color:white; text-decoration:none;font-weight:bold">Click To Login here Instead</a></h3>
</div>
	<div class="register">
	<h1>Register</h1><br>

	<form action="register.php" method="POST">

	<h2>Fill In Your Personal Details</h2>
	<br>
<h4>	Choose your title here
	<input type="text" list="title" name="title">
<datalist id="title">
  <option value="Mr">Mr</option>
  <option value="Mrs">Mrs</option>
  <option value="Ms">Ms</option>
  <option value="Miss">Miss</option>
</datalist>
Choose your Marital status here
<input type="text" list="maritalstatus" name="maritalstatus">
<datalist id="maritalstatus">
  <option value="Single">Single</option>
  <option value="Married">Married</option>
  <option value="Divorced">Divorced</option>

</datalist>
Enter your first name  here
		<input type="text" placeholder="First Name" name="fname">
		Enter your last name  here
		<input type="text" placeholder="Last Name" name="lname">

		Date of birth:
		<input type="date" placeholder="Date of birth" name="DOB"><br><br>
		Choose your gender<br> </h4>
		<input type="radio" name="gender" value="male"> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other<br><br>
<h4>Enter your phone number here
		<input type="tel" placeholder="Phone Number" name="phonenumber">
		Enter your Town of residency here
		<input type="text" placeholder="Town" name="residency">
		Enter your City of residency here
		<input type="text" placeholder="City" name="city">
		Enter your Country here
		<input type="text" placeholder="Country" name="citizenship">
		
		</h4>
			<br></br>

		<h2>Fill In Login Details</h2><br>
		<h4>
		Enter your Email here
		<input type="email" placeholder="Enter your email" name="email">
		Enter your password here
		<input type="password" placeholder="Enter your password" name="password">
		Confirm your phone number here
		<input type="password" placeholder="confirm password" name="confirm_password">

		</h4>
		<input type="submit" value="register">

	</form>
</div>
</body>
</html>
