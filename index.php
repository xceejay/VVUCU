<?php
session_start();


require 'database.php';

if (isset($_SESSION['user_id'])) {

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
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
	<title>VVU CREDIT UNION</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<div class="parallax">

	<body>


		<?php if (!empty($user)) : ?>



			<?php header("Location: account.php") ?>



		<?php else : ?>


			<!-- statement -->


			<div id="header">
				<div id="navbar">

					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="services.html">Services</a></li>
						<li><a href="branches.html">Branches</a></li>
						<li><a href="contactus.php">Contact Us</a></li>
						<li><a href="aboutus.html">About Us</a></li>
					</ul>
				</div>

				<div id="chat-button" style="margin-top:-3.5%"><i class="fa fa-3x fa-comments" aria-hidden="true"></i></div>
			</div><text style="margin-left: 93%;color:red;font-weight: bold">Need Help? Click The Icon</text>

			<div id="chat-box" style="color:black">
				<div id="chat-head">VVUCU Chat Bot<i id="cancel" class="fa fa-times"></i></div>
				<div id="converse"></div>
				<div id="controls">
					<textarea id="textbox" class="controls-elements" placeholder="Say something.."></textarea>
					<button id="send" class="controls-elements"><i id="send-icon" class="fa fa-paper-plane"></i></button>
				</div>
			</div>

			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

			<script src="js/index.js"></script>



		

			<div class="content">





				<div class="ad1" style="background-color:none;">
					<div class="ad1img">
						<a href=login.php>
							<img src="images/icons/006-people.png">
						</a>
					</div>



					<p style="font-weight:bold">



						Valley View Credit Union offers a variety of loans to help meet your financial goals.
						Choose your loan and complete an online application today.
					</p>
					<?php if (!empty($user)) : ?>
						<a href=login.php style="color:white;text-decoration:none">
							<div class="applynow" style="border:2px  solid white;border-width:inherit">

								APPLY NOW

							</div>
						</a>
					<?php else : ?>
						<a href=login.php style="color:white;text-decoration:none">
							<div class="applynow" style="border:2px  solid white;border-width:inherit;">

								APPLY NOW

							</div>
						</a>
					<?php endif; ?>


				</div>

				<div class="ad2" style="background-color:none;">
					<div class="ad2img">
						<a href=loan.php>
							<img src="images/icons/005-talk.png">
						</a>
					</div>
					<p style="font-weight:bold">

						Join us and be a part of the credit union difference.
						We make it easy to join! Complete the online account opening process today.
					</p>
					<a href=register.php style="color:white;text-decoration:none">
						<div class="getstarted" style="border:2px  solid white;border-width:inherit">

							GET STARTED

						</div>
					</a>

				</div>
			</div>
		<?php endif; ?>





		<div class="column" style="background-color:none;">

<h4>Already have an Account?</h3>

	<a href="login.php" style="color:white">Click here To Login </a>

	<br></br>
	<h4>Don't Have An Account Yet?</h4>
	<a href="register.php" style="color:white"> Click here to Register</a>


</div>


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</body>

</html>