<!DOCTYPE html>
<html>
	<head> <!-- Chaque page à le même head, sauf le titre qui change. -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Samuel Lager">
		<link rel="stylesheet" href="css/style.css" />
		<link rel="icon" type="image/png" href="images/favicon.png" />
    <title>Newbie - Configuration</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  </head>
	<body>
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
			document.write("<div id='fond_create'></div>");
			connection.query('SELECT * from profil WHERE password = ?', [$_GET["password"]], function(err, rows, fields) { /* Sélectionne l'utilisateur. */
				if(!err && rows[0]!=undefined){ /* On revérifie que l'utilisateur existe et on affiche ses données. */
				}else{ /* Dans le cas où l'utilisateur n'existe pas mais arrive quand même sur cette page, on affiche un message et on le redirige. */
					document.write("Compte inexistant. Vous allez être redirigés.");
					setTimeout("window.location.href='index.php'", 1500);
				}
			});
			connection.end();
		</script>
	</body>
</html>
