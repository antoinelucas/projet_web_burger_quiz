<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('model/class/Manager.php');
require_once('model/class/Partie.php');
require_once('model/class/PartieManager.php');

$manager_partie = new PartieManager();


$tab_noms_parties = $manager_partie->getNom_parties();
for($i=0; $i< count($tab_noms_parties); $i++){
  $partie[$i]['partie_nom']= new Partie();
  $partie[$i]['partie_nom']->hydrate($tab_noms_parties[$i]);
}
?>
