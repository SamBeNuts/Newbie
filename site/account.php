<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['auth'])){
  header('Location: index.php');
  exit();
}

?>
<h1>Bonjour <?php $_SESSION['auth']->mail; ?></h1>
