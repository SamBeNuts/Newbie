<!DOCTYPE html>
<html>
	<head> <!-- Chaque page à le même head, sauf le titre qui change. -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Samuel Lager">
    <link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style_index.css" />
		<link rel="stylesheet/less" type="text/css" href="css/styles_index.less">
		<link rel="icon" type="image/png" href="images/favicon.png" />
  	<script src="js/jquery-2.1.1.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <title>Newbie - Connexion</title>
  </head>
	<body>
		<div class="wrapper">
			<div class="container">
				<h1>Bienvenue</h1>
				<form autocomplete="off" class="form">
					<input style="display:none"/>
					<input type="text" placeholder="Email" />
					<input type="password" placeholder="Mot de passe" />
					<button type="submit" id="login-button">Connexion</button><br>
					<a id="password_lost" href="#">Mot de passe oublié ?</a>
				</form>
			</div>
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
    <div id="loading_page">
      <img id="img_fond" src="" />
      <div id="cadre_gauche"></div>
      <div id="cadre_haut"></div>
      <div id="cadre_droite"></div>
      <div id="cadre_bas"></div>
      <img id="logo" src="images/logo_transparent_black.png" />
      <script>
        document.getElementById('img_fond').src = 'images/background/background'+Math.floor((Math.random() * 4) + 1)+'.jpg';
				window.onload=resize;
				window.onresize=resize;
				function resize(){
					$('#logo').css('margin-top',-(parseInt($('#logo').css('height'))/2)+'px');
					$('#logo').css('margin-left',-(parseInt($('#logo').css('width'))/2)+'px');
					$('#cadre_gauche').css('margin-left',-((parseInt($('#logo').css('width')))/2)-40+'px');
					$('#cadre_droite').css('margin-left',((parseInt($('#logo').css('width')))/2)+20+'px');
					$('#cadre_haut').css('margin-top',-((parseInt($('#logo').css('height')))/2)-40+'px');
					$('#cadre_bas').css('margin-top',((parseInt($('#logo').css('height')))/2)+20+'px');
				}
      </script>
      <footer>©2016 Newbie, Nutts Inc. -  <b><></b> with <b>♥</b> by <b>Newbie Team</b></footer> <!-- Texte de bas de page. -->
    </div>
  </body>
</html>