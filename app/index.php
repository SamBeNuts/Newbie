<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Samuel Lager">
		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" type="image/png" href="images/favicon.png" />
    <title>Newbie - Connexion</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  </head>
	<body>
		<div id="fond">
			<img src="images/connexion_page.png" />
		</div>
		<form action="profil.php" method="get">
			<input type="text" autocomplete="off" name="password" placeholder="••••••••" minlength="8" maxlength="8"/>
			<button id="myBtn" type="submit" name="done">Valider</button>
		</form>
		<footer>©2016 Newbie, Nutts Inc. -  <b><></b> with <b>♥</b> by <b>Newbie Team</b></footer>
		<script>
		window.onresize=resize;
		document.getElementById("fond").style.top=window.innerHeight/2-document.getElementById("fond").offsetHeight/2+"px";
		document.getElementById("fond").style.left=window.innerWidth/2-document.getElementById("fond").offsetWidth/2+"px";
		function resize(){
			document.getElementById("fond").style.top=window.innerHeight/2-document.getElementById("fond").offsetHeight/2+"px";
			document.getElementById("fond").style.left=window.innerWidth/2-document.getElementById("fond").offsetWidth/2+"px";
		}
		</script>
	</body>
</html>
