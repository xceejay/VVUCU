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
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible'>
  <title>
    <?php echo $user['fname'];
    echo " ";
    echo $user['lname']; ?>
  </title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href="css/styles.css">

</head>

<body>




  <div id="navbar">

    <ul>


      <li><a href="index.php">Home</a></li>
      <li><a href="services.html">Services</a></li>
      <li><a href="branches.html">Branches</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
      <li><a href="aboutus.html">About Us</a></li>
      <li><a href="logout.php">Logout</a></li>

    </ul>
  </div>
<div class="parallax">
  <h1>Profile</h1>
  <div class="register" style="text-align:start;margin-top:0%;width:50%">
    <h2><text style="color:red;">ID:</text> <?php echo $user['id'] ?>

    </h2>
    <h2><text style="color:red;">EMAIL:</text> <?php echo $user['email'] ?></h2>

    <h2><text style="color:red;">FIRST NAME :</text> <?php echo $user['fname'] ?>

    </h2>

    <h2><text style="color:red;">LAST NAME :</text> <?php echo $user['lname'] ?>

    </h2>
    <h2><text style="color:red;">PHONE NUMBER :</text> <?php echo $user['phonenumber'] ?>

    </h2>
    <h2><text style="color:red;">DATE OF BIRTH :</text> <?php echo $user['DOB'] ?>

    </h2>
    <h2><text style="color:red;">COUNTRY :</text> <?php echo $user['citizenship'] ?>     <form  action='profile.php' method='POST'>

      <input type='hidden' name='del_id' value='$user['citizenship']'>


  </h2>
</div>
</div>
	<h1  class="login"style="margin-top:5%;margin-left:40%;color:red"><a href="change.php" style="color:white;"> Change Account Details</a></h1>


</body>

</html>
