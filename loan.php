<?php

session_start();


require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	// Enter the new user in the database

	$sql = "INSERT INTO loan (id, amount,date,loantype) VALUES (:id, :amount,:date,:loantype)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':id', $_POST['id']);
	$stmt->bindParam(':amount', $_POST['amount']);
	$stmt->bindParam(':date', $_POST['date']);
	$stmt->bindParam(':loantype', $_POST['loantype']);
	if( $stmt->execute() ):
		$message = 'Successfully created new user';

	header("Location:sucessloan.php");
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




	<h1>Apply for a loan</h1>

	<form action="loan.php" method="POST">

	<input type="text" placeholder="Enter your ID" name="id">

	</form>

</body>
</html>
