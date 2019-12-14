<?php 
	$responses['what is your name'] = "My name is VVUCU bot.";
	// echo "Hello world";
	$responses['tell me about yourself'] = "I am a chatbot. I'm still learning a lot of things so please forgive me if I can't answer you in some cases.";
	$responses["i'm fine"] = "What can i do for you?";
	$responses["fine good great bad sick I'm I"] = "What can i do for you?";
	$responses['what is your mobile number'] = "0541053593";
	$responses['how can i contact you'] = "Email:joelkofiamoako@gmail.com \n Phone Number:0541053593";
	$responses['what is your name'] = "My name is VVUCU bot.";
	$responses['what is your name'] = "My name is VVUCU bot.";
	$q = $_GET["q"];

	$response = "";

	if ($q != "") {
		# code...
		$q = strtolower($q);
		foreach ($responses as $r => $value) {
			# code...
			if (strpos($r, $q) !== false) {
				# code...
				$response = $value;
			}
			
		}
	}
	$noresponse = "Sorry I'm still learning. Hence my responses are limited. Ask something else.";
	echo $response === "" ? $noresponse : $response;
?>