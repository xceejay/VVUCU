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
	<title>Account Preview</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<h1 style="margin-top:25%;">NOTE: We will require you to sigin in with your <text style="color:red">ID</text> or 
	<text style="color:red">EMAIL</text> next time you login</h1>

</head>

<body style="margin-right:20%;margin-left:20%;">
	<h2>Your ID is : <?php echo $user['id'] ?></h2>
	<h2>Your EMAIL is : <?php echo $user['email'] ?></h2>

	

	<h1  class="login"style="margin-top:5%;margin-left:32%;color:purple"><a href="account.php" style="color:white;"> Click here to continue</a></h1>

</body>

</html>