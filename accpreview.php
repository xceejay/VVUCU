
<?php
session_start();


require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT * FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
		
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Caution</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<h1 style="margin-top:10%;line-height:">NOTE: We will require you to sigin in with the ID we assigned to your user next time you login</h1>

</head>
<body style="margin-right:20%;margin-left:20%;">
<h2>Your ID is : <?php echo $user['id']?></h2>
	
		
     In the event that any user ID and/or password is used by you or issued to you by us during the process of your signing up to be a user/member of the Sample Store, you shall protect the secrecy of such user ID and/or password at all times and shall ensure that the user ID and/or password is not revealed or disclosed in any manner whatsoever to any person. You should change your password from time to time to enhance its security. You shall be fully responsible for all use and liability resulting from access to this Site or Mobile Application with your user ID and/or password. We shall not be responsible for unauthorized transactions incurred by you arising from or in connection with the misuse or disclosure of your user ID and/or password.

 Any passwords or rights given to you to obtain information or other contents are not transferable and may only be used by you. You must keep your password confidential and immediately notify us if any unauthorised third party becomes aware of that password or if there is any unauthorised use of your email address or any breach of security is known to you. You agree that any person to whom your user name or password is disclosed is authorised to act as your agent for the purposes of using (and/or transacting via) the Services, the Site and Mobile Application. Maintenance of the confidentiality of your password is your responsibility.

If you suspect that your password has been compromised in any manner, you shall immediately inform us and change your password.

<h1 style="margin:2%;color:purple"><a href="account.php" style="color:white;"> Click here to continue</a></h1>

</body>
</html>