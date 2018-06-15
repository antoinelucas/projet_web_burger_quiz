<?php

//require('test.php');

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

//-------------------------------------------- HEADER ------------------------------------------------------
//require_once('view/templates/headerView.php');
//-----------------------------------------------------------------------------------------------------------


require('controller/controller.php');

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'display_login') {
      display_login();
    }elseif ($_GET['action'] == 'display_new_game') {
      display_new_game();
    }elseif ($_GET['action'] == 'display_game') {
      display_game();
    }elseif ($_GET['action'] == 'display_end_game') {
      display_end_game();
    }elseif ($_GET['action'] == 'display_account') {
      display_account();
    }elseif ($_GET['action'] == 'display_ranking') {
      display_ranking();
    }elseif ($_GET['action'] == 'display_logout') {
      display_logout();
    }elseif ($_GET['action'] == 'display_mentions') {
        dispaly_mentions();
    }else{
      display_login();
    }
    }else{
      display_login();
    }

}catch(Exception $e) { // S'il y a eu une erreur, alors...
  echo 'Erreur : ' . $e->getMessage();
}


//-------------------------------------------- FOOTER ------------------------------------------------------
if (isset($_SESSION['auth'])){  // On affiche le footer si le user est loguer
  require_once('view/templates/footerView.php');
}
//----------------------------------------------------------------------------------------------------------
