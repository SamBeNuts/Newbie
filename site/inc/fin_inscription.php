<?php

	require_once 'db.php';
	if ($_POST['avatar']==''){
		$avatar = 'https://s-media-cache-ak0.pinimg.com/564x/26/56/e6/2656e6b4330532e67ff13141dbf86bf6.jpg';
	}else{
		$avatar = $_POST['avatar'];
	}
	$req = $pdo->prepare("UPDATE profil SET name = ?, lastname = ?, class = ?, age = ?, tel = ?, avatar = ?, newsletter = ?, confirmation_token = ?, confirmed_at = NOW() WHERE id = ?");
	$req->execute([$_POST['name'], $_POST['lastname'], $_POST['class'], $_POST['age'], $_POST['tel'], $avatar, $_POST['newsletter'], NULL, $_POST['id']]);
	$y = 1;
	$x = 0;
  $arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 16, 17, 18, 19, 20, 21, 22, 24, 25, 26, 28, 32, 33, 34, 35, 36, 37, 38, 40, 41, 42, 44, 48, 49, 50, 52, 56, 64, 65, 66, 67, 68, 69, 70, 72, 73, 74, 76, 80, 81, 82, 84, 88, 96, 97, 98, 100, 104, 112, 128, 129, 130, 131, 132, 133, 134, 136, 137, 138, 140, 144, 145, 146, 148, 152, 160, 161, 162, 164, 168, 176, 192, 193, 194, 196, 200, 208, 224, 256);
	while ($y <= 255) {
		$req = $pdo->prepare('SELECT password FROM profil WHERE password = ?');
		$req->execute([$y]);
		$user = $req->fetch();
		if($user || !in_array($y, $arr, false)){
		  $y += 1;
		}else {
			$req = $pdo->prepare("UPDATE profil SET password = ? WHERE id = ?");
			$req->execute([$y, $_POST['id']]);
			$x = 1;
		  $y = 256;
		}
	}
	$req = $pdo->prepare('SELECT mail FROM profil WHERE id = ?');
	$req->execute([$_POST['id']]);
	$mail = $req->fetch();
	if ($x = 1) {
		mail($mail->mail, 'Newbie : Venez chercher votre clé', "Votre inscription est finie, il ne vous reste plus qu'à venir chercher votre clé d'ici la semaine prochaine.");
	}else {
		mail($mail->mail, 'Newbie : Venez chercher votre clé', "Votre inscription est finie, mais à cause d'une trop grande demande nous n'avons plus de clé de disponible pour vous. Vous recevrez un mail dés que la situation aura évolué.");
	}

?>
