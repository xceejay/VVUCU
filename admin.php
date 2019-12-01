<?php

session_start();

if (isset($_SESSION['admin_id'])) {
	header("Location: admin.php");
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
		$admin = $results['id'];
		header("Location: admin.php");
	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>

	<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=yes'>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>


	<?php if (!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif; ?>



	<?php if (!empty($admin)) : ?>

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

		<table>

			<tr>
				<th>First Name</th>
				<th>Last name</th>
				<th>ID</th>
			</tr>

			<?php


				$records = $conn->prepare('SELECT * FROM users');
				$records->bindParam(':id', $_SESSION['user_id']);
				$records->execute();
				while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
					$data = "<td> {$row['fname']} </td><td> {$row['lname']} </td><td> $ {$row['id']} </td>";
					echo "<tr>$data</tr>";
				}

				?>



		<?php else : ?>

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

		<div class="login">
			<h1 class="logintext">Admin Login</h1>
			<p>


				<form action="admin.php" method="POST">
					<h3>Enter Your <text style="color:red">Admin ID</text> here
						<input type="text" placeholder="ID" name="id"> <!-- email was replaced by id here also -->

						Enter Your Password here
						<input type="password" placeholder="password" name="password">
					</h3>

					<input type="submit" value="login">

			</p>
			</form>
		</div>

</body>

</html>