<?php
session_start();


require 'database.php';
include 'adminlogin.php';


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





?>
<?php 


$records = $conn->prepare('SELECT * FROM users');
$records->bindParam(':id', $_SESSION['admin_id']);
$records->execute();
while ($row = $records->fetch(PDO::FETCH_ASSOC)) {
    if($row['id'] == $_POST['user_id'] ){
        $records = $conn->prepare('delete FROM users WHERE id = :id');
        $records->bindParam(':id', $_POST['user_id']);
        $records->execute();
       
    break;
}
}