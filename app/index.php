<!DOCTYPE html>
<html>
	<head> <!-- Chaque page à le même head, sauf le titre qui change. -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Samuel Lager">
		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" type="image/png" href="images/favicon.png" />
    <title>Newbie - Connexion</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  </head>
	<body>
		<div id="fond"> <!-- Arrière-plan de la page. -->
			<img src="images/connexion_page.png" />
		</div>
		<form action="" method="get"> <!-- Le mot de passe est envoyé à travers l'url. -->
			<input type="text" autocomplete="off" name="password" placeholder="••••••••" minlength="8" maxlength="8"/> <!-- Champ pour tapper son mot de passe et qui doit avoir 8 caractères. -->
			<button id="myBtn" type="submit" name="done" value="1">Valider</button> <!-- Envoie le mot de passe. -->
		</form>
		<footer>©2016 Newbie, Nutts Inc. -  <b><></b> with <b>♥</b> by <b>Newbie Team</b></footer> <!-- Texte de bas de page. -->
		<script> /* Script afin de centrer #fond de manière dynamique. */
		window.onresize=resize;
		document.getElementById("fond").style.top=window.innerHeight/2-document.getElementById("fond").offsetHeight/2+"px";
		document.getElementById("fond").style.left=window.innerWidth/2-document.getElementById("fond").offsetWidth/2+"px";
		function resize(){
			document.getElementById("fond").style.top=window.innerHeight/2-document.getElementById("fond").offsetHeight/2+"px";
			document.getElementById("fond").style.left=window.innerWidth/2-document.getElementById("fond").offsetWidth/2+"px";
		}
		</script>
		<script>
			var mysql      = require('mysql'); /* Va chercher le module mysql de node.js. */
			var connection = mysql.createConnection({ /* Connection à la BDD. */
			host     : 'localhost',
			user     : 'root',
			password : '',
			database : 'Newbie'
			});
			connection.connect();
			var $_GET = {};
			document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () { /* Récupère le mot de passe dans l'url. */
			    function decode(s) {
			        return decodeURIComponent(s.split("+").join(" "));
			    }
			    $_GET[decode(arguments[1])] = decode(arguments[2]);
			});
			if ($_GET["done"]=="1"){ /* On vérifie qu'un mot de passe a été tappé. */
				connection.query('SELECT * from profil WHERE password = ?', [$_GET["password"]], function(err, rows, fields) { /* Sélectionne l'utilisateur. */
					if(!err && rows[0]!=undefined){ /* Si l'utilisateur existe, on le dirige vers son profil. */
						window.location.href=("profil.php?password="+$_GET["password"]);
					}else{ /* Si l'utilisateur n'existe pas et on indique qu'on veut un message d'erreur. */
						window.location.href=("index.php?done=2");
					}
			});
			};
			if ($_GET["done"]=="2"){ /* On affiche le message d'erreur. */
				document.write("<a id='erreur'>Compte inexistant.</a>")
			};
			connection.end();
		</script>
	</body>
</html>
