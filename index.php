<?php
session_start();


require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>VVU CREDIT UNION</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>


<?php if( !empty($user) ): ?>



	<?php header("Location: account.php")?>



 <?php else: ?>


<!-- statement -->






		<div id="navbar">

  <ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="services.html">Services</a></li>
	<li><a href="branches.html">Branches</a></li>
	<li><a href="contactus.html">Contact Us</a></li>
	<li><a href="aboutus.html">About Us</a></li>
  </ul>
</div>





<div class="row">


  <div class="column" style="background-color:none;">

	<h4>Already have an Account?</h3>

		<a href="login.php" style="color:white">Click here To Login </a>
		<br></br>
		<h4>Don't Have An Account Yet?</h4>
		<a  href="register.php" style="color:white"> Click here to Register</a>
  </div>


	<div class="content">





	<div class="ad1" style="background-color:none;">
	<div class="ad1img">
<a href = login.php >
<img src="images/icons/006-people.png">
</a>
</div>



	<p style="font-weight:bold">



	Valley View Credit Union offers a variety of loans to help meet your financial goals.
    Choose your loan and complete an online application today.
</p>
<?php if( !empty($user) ): ?>
	<a href = login.php style="color:white;text-decoration:none">
	<div class="applynow" style="border:2px  solid white;border-width:inherit">

APPLY NOW

	</div>
	</a>
<?php else: ?>
	<a href = login.php style="color:white;text-decoration:none">
	<div class="applynow" style="border:2px  solid white;border-width:inherit">

APPLY NOW

	</div>
	</a>
	<?php endif; ?>


</div>

<div class="ad2" style="background-color:none;">
<div class="ad2img">
<a href = loan.php >
<img src="images/icons/005-talk.png">
</a>
</div>
<p style="font-weight:bold">

Join us and be a part of the credit union difference.
We make it easy to join! Complete the online account opening process today.
</p>
<a href = register.php style="color:white;text-decoration:none">
<div class="getstarted" style="border:2px  solid white;border-width:inherit">

GET STARTED

	</div>
	</a>

</div>
	</div>
  <?php endif; ?>

</body>
</html>
