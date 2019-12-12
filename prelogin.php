<?php

session_start();

if (isset($_SESSION['user_id'])) {
	header("Location: /");
}

require 'database.php';

//if id is not empty and password is not empty, btw email was replaced by ID
if (!empty($_POST['email']) && !empty($_POST['password'])) :

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');

	$records->bindParam(':email', $_POST['email']); //binds email to email and checks in the database
	
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';


	if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

		$_SESSION['user_id'] = $results['id'];
		header("Location: accpreview.php");
	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>


	<?php if (!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif; ?>



	<?php if (!empty($user)) : ?>

		<div id="navbar">

			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="branches.html">Branches</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				<li><a href="aboutus.html">About Us</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>




	<?php else : ?>

		<div id="navbar">

			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="branches.html">Branches</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				<li><a href="aboutus.html">About Us</a></li>
			</ul>
		</div>
	<?php endif; ?>


	<h1 style="color:white">You sucessfully created a new user, it's time for you to login for the first time</h1>

	<p></p>
	<div class="login">
		<h1 class="logintext">Login</h1><br>


		<form action="prelogin.php" method="POST">
			<h3>Enter Your <text style="color:red">EMAIL</text> here
				<input type="text" placeholder="EMAIL" name="email"> <!-- email was replaced by id here also -->

				Enter Your Password here
				<input type="password" placeholder="password" name="password">
			</h3>
			<input type="submit" value="login">

		</form>
	</div>


</body>

</html>
