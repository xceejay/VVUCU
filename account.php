<?php
session_start();


require 'database.php';

if (isset($_SESSION['user_id'])) {

	$records = $conn->prepare('SELECT * FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);

	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if (count($results) > 0) {
		$user = $results;
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title><?php echo $user['fname']; ?> <?php echo $user['lname']; ?></title>
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
			<li><a href="logout.php">Logout</a></li>
			<li> <a href="profile.php">Profile </a></li>
			<li> <a href="profile.php">Your ID : <?php echo $user['id'] ?></a></li>
		</ul>
	</div>

	<div id="account">
		<ul style="display:inline;">
			<li><a href="profile.php">Welcome <?php echo $user['fname']; ?> <?php echo $user['lname']; ?>!</a></li>
			<ul>
	</div>


	<div class="content">





		<div class="ad1" style="background-color:none;">
			<div class="ad1img">
				<a href=login.php>
				<img src="images/icons/050-fax.png">
				</a>
			</div>



			<p style="font-weight:bold">



				Apply for a loan today
			</p>

			<a href=loan.php style="color:white;text-decoration:none">
				<div class="applynow" style="border:2px  solid white;border-width:inherit">

					APPLY NOW

				</div>
			</a>



		</div>

		<div class="ad2" style="background-color:none;">
			<div class="ad2img">
				<a href=loan.php>
					<img src="images/icons/044-global.png">
				</a>
			</div>
			<p style="font-weight:bold">
				Want funding for your business?
			</p>
			<a href=register.php style="color:white;text-decoration:none">
				<div class="getstarted" style="border:2px  solid white;border-width:inherit">

					GET STARTED

				</div>
			</a>

		</div>
	</div>


</body>

</html>