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
    
    <table style="overflow:hidden">
        <tr>
            <th>Date</th>
            <th>Loan Type</th>
            <th>Amount</th>
        </tr>
      
            <?php


            $records = $conn->prepare('SELECT * FROM loan WHERE id = :id');
            $records->bindParam(':id', $_SESSION['user_id']);
            $records->execute();
            while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                $data = "<td> {$row['date']} </td><td> {$row['loantype']} </td><td> {$row['amount']} </td>";
                echo "<tr>$data</tr>";
            }

            ?>
       
</body>

</html>