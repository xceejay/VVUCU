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


if (isset($fname)) { }

// o stands for old
$ofname = $user['fname'];
$olname = $user['lname'];
$oemail = $user['email'];
$ophonenumber = $user['phonenumber'];
$oDOB = $user['DOB'];
$ocitizenship = $user['citizenship'];


$sql = "update table users
  set
  phonenumber= :phonenumber ,
  fname = :fname ,
  email = :email ,
  DOB=:DOB ,
  citizenship=:citizenship
  lname= :lname ,
  phonenumber= :phonenumber 
  where
  email=$oemail and
  (fname=$ofname
  and phonenumber=$ophonenumber
  and DOB=$oDOB
  and citizenship=$ocitizenship
  and lname=$olname)
  ";

try {
  $stmt = $conn->prepare($sql);
} catch (Exception $ex) {
  echo $ex;
}

$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
$stmt->bindParam(':fname', $_POST['fname']);
$stmt->bindParam(':lname', $_POST['lname']);
$stmt->bindParam(':phonenumber', $_POST['phonenumber']);
$stmt->bindParam(':residency', $_POST['residency']);
$stmt->bindParam(':city', $_POST['city']);
$stmt->bindParam(':citizenship', $_POST['citizenship']);
$stmt->bindParam(':gender', $_POST['gender']);
$stmt->bindParam(':title', $_POST['title']);
$stmt->bindParam(':maritalstatus', $_POST['maritalstatus']);
$stmt->bindParam(':DOB', $_POST['DOB']);
if ($stmt->execute()) :
  $message = "Successfully updated user";
  header("Location:prelogin.php");
else :
  $message = 'Sorry, you must have Entered something wrongly';
endif;






?>


<!DOCTYPE html>
<html>

<head>
  <title><?php echo $user['fname']; ?> <?php echo $user['lname']; ?></title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>


  <?php if (!empty($message)) : ?>
    <p><?php echo $message ?></p>
  <?php endif; ?>




  <?php if (!empty($user)) : ?>

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



  <?php else : ?>
    <div id="navbar">

      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="branches.html">Branches</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="aboutus.html">About Us</a></li>

      </ul>
    </div>



  <?php endif; ?>

  <div class="register">
    <div class="container" style="background-color:none;font-weight:bold;font-size:15px;margin-top:20px">
      <a style="color:red" href="login.php">Login here if you already have an Account</a>
    </div>
    <h1>Register</h1><br>

    <form action="change.php" method="POST">

      <h2>Fill In Your Personal Details</h2>
      <br>
      <h4> Change your title here
        <input type="text" list="title" name="title">
        <datalist id="title">
          <option value="Mr">Mr</option>
          <option value="Mrs">Mrs</option>
          <option value="Ms">Ms</option>
          <option value="Miss">Miss</option>
        </datalist>
        Change your Marital status here
        <input type="text" list="maritalstatus" name="maritalstatus">
        <datalist id="maritalstatus">
          <option value="Single">Single</option>
          <option value="Married">Married</option>
          <option value="Divorced">Divorced</option>

        </datalist>
        Change your first name here
        <input type="text" placeholder="First Name" name="fname">
        Change your last name here
        <input type="text" placeholder="Last Name" name="lname">

        Date of birth:
        <input type="date" placeholder="Date of birth" name="DOB"><br><br>
        Change your gender<br> </h4>
      <input type="radio" name="gender" value="male"> Male<br>
      <input type="radio" name="gender" value="female"> Female<br>
      <input type="radio" name="gender" value="other"> Other<br><br>
      <h4>Change your phone number here
        <input type="tel" placeholder="Phone Number" name="phonenumber">
        Change your Town of residency here
        <input type="text" placeholder="Town" name="residency">
        Change your City of residency here
        <input type="text" placeholder="City" name="city">
        Change your Country here
        <input type="text" placeholder="Country" name="citizenship">

      </h4>
      <br></br>

      <h2>Fill In Login Details</h2><br>
      <h4>
        Change your Email here
        <input type="email" placeholder="Change your email" name="email">

        <?php echo $emailErr ?>

        Change your password here
        <input type="password" placeholder="Change your password" name="password">
        Confirm your phone number here
        <input type="password" placeholder="confirm password" name="confirm_password">

      </h4>
      <input type="submit" value="update profile">


    </form>
  </div>
</body>

</html>