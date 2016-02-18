<!DOCTYPE html>
<html>
	<head> <!-- Chaque page à le même head, sauf le titre qui change. -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Samuel Lager">
    <link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style_register.css" />
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet/less" href="css/styles_register.less" />
		<link rel="icon" type="image/png" href="images/favicon.png" />
  	<script src="js/jquery-2.1.1.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <title>Newbie - Inscription</title>
  </head>
	<body data-mail='' data-pw=''>
		<div class="wrapper">
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
		<div id="form">
			<a id="question">Saisissez votre adresse email :</a>
			<div id="input">
				<input autocomplete="off" type="text" name="q1" autofocus>
			</div>
			<div id="barre"></div>
			<a id="error"></a>
			<a id="q_num_f">/3</a>
			<a id="q_num">1</a>
			<i id="next" class="fa fa-long-arrow-right fa-2x"></i>
		</div>
		<a id="success" href="index.php">Un mail vous a été envoyé afin de terminer votre inscription. Cliquez sur ce message pour revenir sur la page d'accueil.</a>
		<script>
			window.onload=resize;
			window.onresize=resize;
			$('#success').fadeOut(0);
			function resize(){
				$('#form').css('margin-top',-(parseInt($('#form').css('height'))/2)+'px');
				$('#success').css('width',window.innerWidth*0.6+'px');
				$('#success').css('margin-top',-(parseInt($('#success').css('height'))/2)+'px');
				$('#success').css('margin-left',-(parseInt($('#success').css('width'))/2)+'px');
			}
			var keys = {};
		  $(window).on("keyup keydown", function (e) {
		      e = e || event;
		      keys[e.keyCode] = e.type === 'keydown';
		      if (keys[13]) {
			        next();
			        keys = {};
			        return false;
			    }
			});
			$('#next').click(function(){
				next();
			});
			function next(){
				if ($('#input input').attr('name')=='q1') {
					$.post( "inc/verificate_mail.php", { mail: $('#input input').val()}, function(data){
						if (data=='1'){
							validate();
						}else{
							$('#input input').val('');
							$('#input input').focus();
							$('#error').html('Cet email est déjà utilisé par un autre compte.');
						}
					});
				}
				else if ($('#input input').attr('name')=='q2') {
					if ($('#input input').val().length>=6 && $('#input input').val().length<=20) {
						$('body').attr('data-pw',$('#input input').val());
						$('#error').html('');
						$('#q_num').html('3');
						$('#question').html('Confirmez votre mot de passe :');
						$('#input').html('<input autocomplete="off" type="password" name="q3">');
						$('#input input').focus();
						$('#barre').animate({width:"400px"},2000);
					}else{
						$('#input input').val('');
						$('#input input').focus();
						$('#error').html('Votre mot de passe doit avoir entre 6 et 20 caractères.');
					}
				}
				else if ($('#input input').attr('name')=='q3') {
					if ($('#input input').val()==$('body').attr('data-pw')) {
						$('#error').html('');
						$('#barre').animate({width:"600px"},2000);
						$('#form').delay(2000).fadeOut(1500);
						$('#success').delay(3500).fadeIn(1500);
						$.post( "inc/inscription.php", { mail: $('body').attr('data-mail'), pw: $('body').attr('data-pw') } );
					}else{
						$('#error').html('Vos deux mots de passe ne sont pas identiques.');
						$('body').attr('data-pw','');
						$('#q_num').html('2');
						$('#question').html('Choisissez votre mot de passe :');
						$('#input').html('<input autocomplete="off" type="password" name="q2">');
						$('#input input').focus();
						$('#barre').animate({width:"200px"},2000);
					}
				}
			}
			function validate(){
				if (isEmail($('#input input').val())==true) {
					$('body').attr('data-mail',$('#input input').val());
					$('#q_num').html('2');
					$('#error').html('');
					$('#question').html('Choisissez votre mot de passe :');
					$('#input').html('<input autocomplete="off" type="password" name="q2">');
					$('#input input').focus();
					$('#barre').animate({width:"200px"},2000);
				}else{
					$('#input input').val('');
					$('#input input').focus();
					$('#error').html('Cet email n\'est pas valide.');
				}
			}
			function isEmail(myVar){
	     var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
	     return regEmail.test(myVar);
	   }
		</script>
  </body>
</html>
