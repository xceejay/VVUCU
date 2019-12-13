<?php
session_start();


require 'database.php';

if (isset($_SESSION['admin_id'])) {


    $records = $conn->prepare('SELECT * FROM admin WHERE id = :id');
    $records->bindParam(':id', $_SESSION['admin_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $admin = NULL;

    if (count($results) > 0) {
        $admin = $results;
    }
}

if (!empty($_POST['del_id'])) :
    $records = $conn->prepare('delete FROM loan WHERE id = :id');
    $records = $conn->prepare('delete FROM users WHERE id = :id');

    $records->bindParam(':id', $_POST['del_id']); //binds id to id and checks in the database

    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0) {
        $message = "sucessfully deleted this user $_POST[del_id]";
    } else { }
endif;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>

</head>

<?php if (!empty($admin)) : ?>



    <div id="navbar">

        <ul style="margin-left:5%">
            <li><a href="admin.php">Refresh</a></li>

            <li><a href="register.php">Add User</a></li>

            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <?php echo $message; ?>
    <h1 class="login" style="margin-top:40px"> USERS</h1>
    <div>
        <table style="width:90%;margin:auto;">

            <tr>

                <th>ID</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>Residency</th>
                <th>City</th>
                <th>Citizenship</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Title</th>

                <th>Marital Status</th>
                <th>Date of Birth</th>

                <th style="text-align:center">Options</th>

            </tr>

            <?php


                $records = $conn->prepare('SELECT * FROM users');
                $records->bindParam(':id', $_SESSION['admin_id']);
                $records->execute();
                while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                    $data = "
                    <td> {$row['id']} </td>
                    <td> {$row['fname']} </td>
                    <td> {$row['lname']} </td>
                    <td> {$row['residency']} </td>
                    <td> {$row['city']} </td>
                    <td> {$row['citizenship']} </td>
                    <td> {$row['phonenumber']} </td>
                    <td> {$row['gender']} </td>
                    <td> {$row['title']} </td>
                    <td> {$row['maritalstatus']} </td>
                    <td> {$row['DOB']} </td>

                    <td >

                    <form  action='admin.php' method='POST'>

                     <input type='hidden' name='del_id' value='{$row['id']}'>

                    <input style='margin:auto;width:100%;font-weight:bold' type='submit' name='submit' value='Delete User '>

                    </form>
                    </td>";
                    echo "<tr>$data</tr>";
                }

                ?>

    </div>
    </table>
    
    
    
    <div class="parallax">
        <h1 class="login" style="margin-top:40px"> CREDIT CARDS </h1>
        <div>
            <table style="width:90%;margin:auto;">

                <tr>

                    <th>ID</th>
                    <th>Capital</th>
                    <th>Issue Date</th>
                    <th>Card Type</th>



                    <th style="text-align:center">Card Number</th>

                </tr>

                <?php


                    $records = $conn->prepare('SELECT * FROM creditcard');
                    $records->bindParam(':id', $_SESSION['admin_id']);
                    $records->execute();
                    while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                        $data = "
                    <td> {$row['id']} </td>
                    <td> \${$row['capital']} </td>
                    <td> {$row['date']} </td>
                    <td> {$row['cardtype']} </td>
                    <td> {$row['cardnumber']} </td>";
                        echo "<tr>$data</tr>";
                    }

                    ?>

        </div>
        </table>
    </div>




    <div class="parallax">
        <h1 class="login" style="margin-top:40px"> LOANS </h1>
        <div>
            <table style="width:90%;margin:auto;">

                <tr>

                    <th>ID</th>
                    <th>Amount</th>
                    <th>Request Date</th>
                    <th>Loan Type</th>
                 



                    <th style="text-align:center">Amount Paid</th>

                </tr>

                <?php


                    $records = $conn->prepare('SELECT * FROM loan');
                    $records->bindParam(':id', $_SESSION['admin_id']);
                    $records->execute();
                    while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
                        $data = "
                    <td> {$row['id']} </td>
                    <td> \${$row['amount']} </td>
                    <td> {$row['date']} </td>
                    <td> {$row['loantype']} </td>
                    <td> {$row['amountpaid']} </td>";
                        echo "<tr>$data</tr>";
                    }

                    ?>

        </div>
        </table>
    </div>




<?php else : ?>

    <?php header("Location:adminlogin.php") ?>
<?php endif; ?>

<body>

</body>

</html>