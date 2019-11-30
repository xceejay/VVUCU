<?php

session_start();

if( isset($_SESSION['admin_id']) ){
	header("Location: /");
}

require 'database.php';

//if id is not empty and password is not empty, btw email was replaced by ID
if(!empty($_POST['id']) && !empty($_POST['password'])):

	$records = $conn->prepare('SELECT id,email,password FROM admin WHERE id = :id');

	$records->bindParam(':id', $_POST['id']); //binds id to id and checks in the database

    $records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';


	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['admin_id'] = $results['id'];
		header("Location: /");

	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>


	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>



	<?php if( !empty($admin) ): ?>

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




<?php else: ?>

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


	<h1  style="color:white">ADMIN</h1>

<p></p>
	<form action="login.php" method="POST">

		<input type="text" placeholder="Enter your ID" name="id" >  <!-- email was replaced by id here also -->
		<input type="password" placeholder="Enter your password" name="password">

		<input type="submit" value="login">

	</form>

</body>
</html>
