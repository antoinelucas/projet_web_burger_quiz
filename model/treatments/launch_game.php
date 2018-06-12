<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('../class/Manager.php');
require_once('../class/Partie.php');
require_once('../class/PartieManager.php');


$manager = new PartieManager();
$partie = new Partie();

echo $_POST['game_select'];

if(!empty($_POST)){
  if(empty($_POST['game_select'])){
    $manager->setError('game_select', "Vous n'avez pas sélectioné de partie.");
  }
  if(empty($_SESSION['errors'])){
    $_SESSION['partie_nom'] = $_POST['game_select'];
      header('Location: ../../index.php?action=display_game');
      exit();
    }
  }
  header('Location: ../../index.php?action=display_new_game');
  exit();
