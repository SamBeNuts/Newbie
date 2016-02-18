<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'inc/db.php';
$req = $pdo->prepare('SELECT * FROM profil WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();

if($user && $user->confirmation_token == $token){
  //$pdo->prepare('UPDATE profil SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
}else {
  header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
	<head> <!-- Chaque page à le même head, sauf le titre qui change. -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="Samuel Lager">
    <link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style_confirm.css" />
		<link rel="stylesheet" href="css/croppie.css" />
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet/less" href="css/styles_confirm.less" />
		<link rel="icon" type="image/png" href="images/favicon.png" />
  	<script src="js/jquery-2.1.1.js"></script>
    <script src="js/croppie.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <title>Newbie - Confirmation</title>
  </head>
	<body data-name='' data-lastname='' data-class='' data-age='' data-tel='' data-avatar='' data-newsletter=''>
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
			<a id="question">Plus que quelques questions, êtes-vous prêt(e) ?</a>
			<div id="input">
				<input value="C'est parti" type="button" name="q1">
			</div>
			<div id="barre"></div>
			<a id="error"></a>
			<a id="q_num_f">/9</a>
			<a id="q_num">1</a>
			<i id="next" class="fa fa-long-arrow-right fa-2x" data-visibility="hidden"></i>
		</div>
		<a id="success" href="index.php">Merci de vous être inscrit(e), un mail vous a été envoyé afin de récupérer votre clé. Cliquez sur ce message pour vous connecter.</a>
    <div id="avatar">
      <i id="close" class="fa fa-times fa-2x"></i>
      <div id="item"></div>
      <input accept="image/*" type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected">
			<label for="file-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
        <span>Choisissez une image</span>
      </label>
      <br><br>
      <input id="valid" type="button" name="final" value="Valider">
    </div>
    <script>
      var inputs = document.querySelectorAll( '.inputfile' );
      Array.prototype.forEach.call( inputs, function( input )
      {
      var label	 = input.nextElementSibling,
        labelVal = label.innerHTML;

      input.addEventListener( 'change', function( e )
      {
        var fileName = '';
        fileName = e.target.value.split( '\\' ).pop();
        if( fileName )
          label.querySelector( 'span' ).innerHTML = fileName;
        else
          label.innerHTML = labelVal;
      });
      });
      function readFile(input) {
   			if (input.files && input.files[0]) {
  	            var reader = new FileReader();

  	            reader.onload = function (e) {
  	            	$uploadCrop.croppie('bind', {
  	            		url: e.target.result
  	            	});
  	            	$('.upload-demo').addClass('ready');
  	            }

  	            reader.readAsDataURL(input.files[0]);
  	        }
  	        else {
  		    }
  		}

  		$uploadCrop = $('#item').croppie({
  			viewport: {
  				width: 200,
  				height: 200,
  				type: 'square'
  			},
  			boundary: {
  				width: 500,
  				height: 500
  			}
  		});
      function link_avatar(){
        $uploadCrop.croppie('result', {
  				type: 'canvas',
  				size: 'viewport'
  			}).then(function (resp) {
  				$('body').attr('data-avatar', resp);
  			});
      }
      $('.inputfile').on('change', function () { readFile(this); });
			window.onload=resize;
			window.onresize=resize;
			$('#success').fadeOut(0);
      $('#avatar').fadeOut(0);
			function resize(){
				$('#form').css('margin-top',-(parseInt($('#form').css('height'))/2)+'px');
				$('#success').css('width',window.innerWidth*0.6+'px');
				$('#success').css('margin-top',-(parseInt($('#success').css('height'))/2)+'px');
				$('#success').css('margin-left',-(parseInt($('#success').css('width'))/2)+'px');
				$('#avatar').css('margin-top',-(parseInt($('#avatar').css('height'))/2)+'px');
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
      $('#close').click(function(){
        $('#avatar').fadeOut(1000);
			});
      $('#input').click(function(){
				if ($('#input input').attr('name')=='q7') {
				  $('#avatar').fadeIn(1000);
				}
			});
      $('#input').click(function(){
				if ($('#input input').attr('name')=='q1') {
				  next();
				}
			});
      $('#valid').click(function(){
			  next();
			});
      $('#input').click(function(){
				if ($('#input input').attr('name')=='q9') {
				  next();
				}
			});
			function next(){
				if ($('#input input').attr('name')=='q1') {
					$('#q_num').html('2');
					$('#question').html('Quel est votre prénom ?');
					$('#input').html('<input autocomplete="off" type="text" name="q2">');
					$('#input input').focus();
          $('#next').attr('data-visibility','visible');
					$('#barre').animate({width:"66.5px"},2000);
				}
				else if ($('#input input').attr('name')=='q2') {
					if (isName($('#input input').val())==true) {
						$('body').attr('data-name',$('#input input').val().charAt(0).toUpperCase() + $('#input input').val().substring(1).toLowerCase());
						$('#error').html('');
						$('#q_num').html('3');
						$('#question').html('Quel est votre nom ?');
						$('#input').html('<input autocomplete="off" type="text" name="q3">');
						$('#input input').focus();
						$('#barre').animate({width:"133px"},2000);
					}else{
						$('#input input').val('');
  					$('#input input').focus();
						$('#error').html('Votre prénom doit avoir entre 2 et 20 caractères.');
					}
				}
				else if ($('#input input').attr('name')=='q3') {
					if (isName($('#input input').val())==true) {
            $('body').attr('data-lastname',$('#input input').val().charAt(0).toUpperCase() + $('#input input').val().substring(1).toLowerCase());
						$('#error').html('');
						$('#q_num').html('4');
						$('#question').html('Quelle est votre classe ?');
						$('#input').html('<select name="q4"><option value="" disabled selected></option><option value="1">2A</option><option value="2">2B</option><option value="3">2BTS</option><option value="4">2C</option><option value="5">2D</option><option value="6">2E</option><option value="7">2F</option><option value="8">2G</option><option value="9">2H</option><option value="10">2I</option><option value="11">1BTS</option><option value="12">1ESL</option><option value="13">1ES1</option><option value="14">1ES2</option><option value="15">1L1</option><option value="16">1S1</option><option value="17">1S2</option><option value="18">1S3</option><option value="19">1S4</option><option value="20">1STMG1</option><option value="21">1STMG2</option><option value="22">TES1</option><option value="23">TES2</option><option value="24">TES3</option><option value="25">TL1</option><option value="26">TL2</option><option value="27">TS1</option><option value="28">TS2</option><option value="29">TS3</option><option value="30">TSTMG1</option><option value="31">TSTMG2</option></select>');
						$('#input input').focus();
						$('#barre').animate({width:"199.5px"},2000);
					}else{
						$('#input input').val('');
  					$('#input input').focus();
						$('#error').html('Votre nom doit avoir entre 2 et 20 caractères.');
					}
				}
				else if ($('#input select').attr('name')=='q4') {
					if ($('#input select option:selected').text() != "") {
            $('body').attr('data-class',$('#input select option:selected').text());
						$('#error').html('');
						$('#q_num').html('5');
						$('#question').html('Quel âge avez-vous ? (facultatif)');
            $('#input').html('<input autocomplete="off" type="number" name="q5">');
						$('#input input').focus();
						$('#barre').animate({width:"266px"},2000);
					}else{
						$('#input input').val('');
  					$('#input input').focus();
						$('#error').html('Vous devez sélectionner une classe.');
					}
				}
				else if ($('#input input').attr('name')=='q5') {
					if (parseInt($('#input input').val()) >= 12 && parseInt($('#input input').val()) <= 23) {
            $('body').attr('data-age',parseInt($('#input input').val()));
					}
          $('#q_num').html('6');
          $('#question').html('Quel est votre numéro de téléphone ? (facultatif)');
          $('#input').html('<input autocomplete="off" type="text" name="q6">');
          $('#input input').focus();
          $('#barre').animate({width:"332.5px"},2000);
				}
				else if ($('#input input').attr('name')=='q6') {
					if (isTel($('#input input').val())==true) {
            $('body').attr('data-tel',$('#input input').val().replace(new RegExp("[^(0-9)]", "g"), ''));
					}
          $('#q_num').html('7');
          $('#question').html('Choisissez votre photo de profil : (facultatif)');
          $('#input').html('<input value="C\'est parti" type="button" name="q7">');
          $('#input input').focus();
          $('#barre').animate({width:"399px"},2000);
				}
        else if ($('#input input').attr('name')=='q7') {
					if (link_avatar()!='') {
            $('body').attr('data-avatar',link_avatar());
					}
          $('#q_num').html('8');
          $('#question').html('Voulez-vous recevoir la newsletter :');
          $('#input').html('<select name="q8"><option value="1" selected>OUI</option><option value="0">NON</option></select>');
          $('#input input').focus();
          $('#avatar').fadeOut(1000);
          $('#barre').animate({width:"465.5px"},2000);
				}
        else if ($('#input select').attr('name')=='q8') {
					$('body').attr('data-newsletter',$('#input select').val());
          $('#q_num').html('9');
          $('#question').html('Cliquez :');
          $('#input').html('<input value="J\'ai lu et j\'accepte les conditions générales d\'utilisation" type="button" name="q9">');
          $('#input input').focus();
          $('#next').attr('data-visibility','hidden');
          $('#barre').animate({width:"532px"},2000);
				}
				else if ($('#input input').attr('name')=='q9') {
					$('#barre').animate({width:"600px"},2000);
					$('#form').delay(2000).fadeOut(1500);
					$('#success').delay(3500).fadeIn(1500);
					$.post( "inc/fin_inscription.php", { name: $('body').attr('data-name'), lastname: $('body').attr('data-lastname'), class: $('body').attr('data-class'), age: $('body').attr('data-age'), tel: $('body').attr('data-tel'), avatar: $('body').attr('data-avatar'), newsletter:$('body').attr('data-newsletter'), id: <?php print $_GET['id'] ?> });
				}
			}
			function isName(myVar){
  	    var regEmail = new RegExp('^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\-]{2,20}$','');
  	    return regEmail.test(myVar);
	    }
      function isTel(myVar){
        var myVar2 = myVar.replace(new RegExp("[^(0-9)]", "g"), '');
        var regEmail = new RegExp('^[0-9]{10}$','');
        return regEmail.test(myVar2);
      }
		</script>
  </body>
</html>
