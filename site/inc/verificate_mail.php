<?php

	require_once 'db.php';
	$req = $pdo->prepare("SELECT id FROM profil WHERE mail = ?");
	$req->execute([$_POST['mail']]);
	$user = $req->fetch();
	if ($user) {
		print 0;
	}else{
		print 1;
	}

?>
