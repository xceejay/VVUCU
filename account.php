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





		<div class="ad1" style="background-color:none;margin-left:25%;margin-top:50px">
			<div class="ad1img">
				<a href=login.php>
				<img src="images/icons/050-fax.png">
				</a>
			</div>



			<p style="font-weight:bold">



				Apply for a loan today
			</p>

			<a href=loan.php style="color:white;text-decoration:none">
				<div class="applynow" style=" border:2px  solid white;border-width:100%;width:30%;margin-left:35%;">

					APPLY NOW

				</div>
			</a>



		</div>




		<div class="ad1" style="background-color:none;margin-top:-220px;margin-left:-0%;">
			<div class="ad1img">
				<a href=login.php>
				<img src="images/icons/050-fax.png">
				</a>
			</div>



			<p style="font-weight:bold">



				View Your Credit Card Details
			</p>

			<a href=profile.php style="color:white;text-decoration:none">
				<div class="applynow" style="border:2px  solid white;border-width:100%;width:30%;margin-left:35%;">

				VIEW NOW

				</div>
			</a>



		</div>





		<div class="ad1" style="background-color:none;margin-top:-222px;margin-left:50%;">
			<div class="ad1img">
				<a href=login.php>
				<img src="images/icons/050-fax.png">
				</a>
			</div>



			<p style="font-weight:bold">



				Get your credit Card today
			</p>

			<a href=card.php style="color:white;text-decoration:none">
				<div class="applynow" style="border:2px  solid white;border-width:100%;width:30%;margin-left:35%">

					GET IT NOW

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
				View Your Loan Requests
			</p>
			<a href=profile.php style="color:white;text-decoration:none">
				<div class="getstarted" style="border:2px  solid white;border-width:100%">

					VIEW NOW

				</div>
			</a>

		</div>
	</div>


</body>

</html>