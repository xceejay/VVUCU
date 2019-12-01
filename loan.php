<?php

session_start();


require 'database.php';

$message = '';

if (!empty($_POST['id']) && !empty($_POST['amount'])) :

	// Enter the new user in the database
	if ($_POST['id'] == $_SESSION[user_id]) {
		$sql = "INSERT INTO loan (id, amount,date,loantype) VALUES (:id, :amount,curdate(),:loantype)";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':id', $_POST['id']);
		$stmt->bindParam(':amount', $_POST['amount']);

		$stmt->bindParam(':loantype', $_POST['loantype']);
		
		if($stmt->execute())
		echo "You Loan Request was sucessful";
	} else {
		echo "not your USERID";
	}
	


endif;

?>




<!DOCTYPE html>
<html>

<head>
	<title>Apply for Loan</title>
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
			<li><a href="contactus.html">Contact Us</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li> <a href="profile.php">Your ID : <?php echo $_SESSION['user_id'] ?></a></li>
		</ul>
	</div>



	<div class=register>
		<h1>Apply for a loan</h1><br>

		<form action="loan.php" method="POST">
			<h3>
				Your ID<input type="text" placeholder="Enter your ID" name="id">

				Loan amount<input type="text" placeholder="Amount" name="amount"><br>
				Select your loan type</h3>
			<input type="text" list="title" name="loantype">
			<datalist id="title">
				<option value="Home Loan">Home Loan</option>
				<option value="Credit Card Loan">Credit Card Loan</option>
				<option value="Home-Equity Loan">Home-Equity Loan</option>
				<option value="Business Loan">Business Loan</option>
				<option value="Cash Advance Loan">Cash Advance Loan</option>
			</datalist>
			<input type="submit" value="apply">

		</form>
	</div>

</body>

</html>