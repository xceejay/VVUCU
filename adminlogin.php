
<?php

session_start();

if (isset($_SESSION['admin_id'])) {
	header("Location: adminlogin.php");
}

require 'database.php';

//if id is not empty and password is not empty, btw email was replaced by ID
if (!empty($_POST['id']) && !empty($_POST['password'])) :

	$records = $conn->prepare('SELECT id,password FROM admin WHERE id = :id');

	$records->bindParam(':id', $_POST['id']); //binds id to id and checks in the database

	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';


	if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

		$_SESSION['admin_id'] = $results['id'];
		header("Location: admin.php");
	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>


<!DOCTYPE html>
<html>

<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<div id="navbar">

<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="services.html">Services</a></li>
	<li><a href="branches.html">Branches</a></li>
	<li><a href="contactus.html">Contact Us</a></li>
	<li><a href="aboutus.html">About Us</a></li>
</ul>
</div>

	<?php if (!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif; ?>




		<div class="login">
			<h1 class="logintext">Admin Login</h1>
			<p>


				<form action="adminlogin.php" method="POST">
				<h3><text style="color:red">ID</text> 
						<input type="text" placeholder="ID" name="id"> <!-- email was replaced by id here also -->

						<h3><text style="color:red">Password</text> 
						<input type="password" placeholder="password" name="password">
					</h3>

					<input type="submit" value="login">
					
			</p>
			</form>
		</div>

</body>

</html>