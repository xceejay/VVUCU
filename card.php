<?php

session_start();


require 'database.php';

$message = '';

if (!empty($_POST['id']) && !empty($_POST['capital'])) :

	// Enter the new user in the database
	if ($_POST['id'] == $_SESSION[user_id]) {
		$sql = "INSERT INTO creditcard (id, capital,date,cardtype) VALUES (:id, :capital,curdate(),:cardtype)";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':id', $_POST['id']);
		$stmt->bindParam(':capital', $_POST['capital']);

		$stmt->bindParam(':cardtype', $_POST['cardtype']);

		if ($stmt->execute())
			echo "You card Request was sucessful";
	} else {
		echo "not your USERID";
	}



endif;

?>




<!DOCTYPE html>
<html>

<head>
	<title>Apply for card</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>


	<?php if (!empty($message)) : ?>
		<h3><?= $message ?></h3>
	<?php endif; ?>






	<div id="navbar">

		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="services.html">Services</a></li>
			<li><a href="branches.html">Branches</a></li>
			<li><a href="contactus.php">Contact Us</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li> <a href="profile.php">Your ID : <?php echo $_SESSION['user_id'] ?></a></li>
		</ul>
	</div>



	<div class=register>
		<h1>Apply for a credit card</h1><br>

		<form action="card.php" method="POST">
			<h3>
				Your ID<input type="text" placeholder="Enter your ID" name="id">

				Credit card capital in USD($)<br>

			

				<input type="number" min="100" max="100000"  step="1" name="capital"><br>

				Select your Card Type
			</h3>
			<input type="text" list="title" name="cardtype">
			<datalist id="title">
				<option value="Balance Transfer Credit Card">Balance Transfer Credit Card</option>
				<option value="Student Credit Card">Student Credit Card</option>
				<option value="Secured Credit Card">Secured Credit Card</option>
				<option value="Business Card">Business Card</option>
				<option value="Prepaid Card">Prepaid Card</option>
			</datalist>
			<input type="submit" value="apply">

		</form>
	</div>

</body>

</html>