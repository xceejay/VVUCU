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
<div id="navbar">

        <ul >


        <li><a href="index.php">Home</a></li>
			<li><a href="services.html">Services</a></li>
			<li><a href="branches.html">Branches</a></li>
			<li><a href="contactus.php">Contact Us</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="logout.php">Logout</a></li>

        </ul>
<body>

<h2 style="color:grey">Loan Requests</h2>
    </div>
    <table>

        <tr>
            <th>Date</th>
            <th>Loan Type</th>
            <th>Amount</th>
            <th>Amount Paid</th>

        </tr>

    
        <?php


        $records = $conn->prepare('SELECT * FROM loan WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
            $data = "<td> {$row['date']} </td>
            <td> {$row['loantype']} </td><td> $ {$row['amount']}  </td>
            <td> $ {$row['amountpaid']}  </td>
      
           ";
            echo "<tr>$data</tr>";
        }

        ?>

</body>
</html>