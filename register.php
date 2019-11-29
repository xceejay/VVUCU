<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	// Enter the new user in the database

	$sql = "INSERT INTO users (email, password,fname,lname,phonenumber,residency,city,citizenship,gender) VALUES (:email, :password,:fname,:lname,:phonenumber,:residency,:city,:citizenship,:gender)";
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




<?php else: ?>

<div id="navbar">

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="services.html">Services</a></li>
<li><a href="branches.html">Branches</a></li>
<li><a href="contactus.html">Contact Us</a></li>
<li><a href="aboutus.html">About Us</a></li>
</ul>
</div>



	<?php endif; ?>
	<h3><a href="login.php" style="color:grey; text-decoration:none;font-weight:bold">Click To Login here Instead</a></h3>

	<h1>Register</h1>

	<form action="register.php" method="POST">

	<h3>Fill In Your Personal Details</h3>
		<input type="text" placeholder="Enter your First Name" name="fname">
		<input type="text" placeholder="Enter your Last Name" name="lname">
		<input type="tel" placeholder="Enter your Phone Number" name="phonenumber">
		<input type="text" placeholder="Enter your town residency" name="residency">
		<input type="text" placeholder="Enter your city" name="city">
		<input type="text" placeholder="Enter your country of residence" name="citizenship">
		<input type="radio" name="gender" value="male"> Male<br>
<input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other
			<br></br>

		<h3>Fill In Login Details</h3>

		<input type="email" placeholder="Enter your email" name="email">
		<input type="password" placeholder="Enter your password" name="password">
		<input type="password" placeholder="confirm password" name="confirm_password">


		<input type="submit" value="register">

	</form>

</body>
</html>
