<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('../class/Manager.php');
require_once('../class/Partie.php');
require_once('../class/PartieManager.php');


$manager = new PartieManager();


//--------- Partie --------------

$partie = new Partie();

if(!empty($_POST)){
  if(empty($_POST['partie_nom'])){
    $manager->setError('partie_nom', "Vous n'avez pas donnée de nom à votre nouvelle partie.");
  }else{
    $new_game= ["partie_nom" => $_POST['partie_nom']];
  }

  if(empty($_SESSION['errors'])){
    $partie->hydrate($new_game);

    if(empty($_SESSION['errors'])){
      $manager->addPartie($partie);

      $_SESSION['partie_nom'] = $partie->getPartie_nom();

      header('Location: ../../index.php?action=display_game');
      exit();
    }
  }
  header('Location: ../../index.php?action=display_new_game');
  exit();
}
