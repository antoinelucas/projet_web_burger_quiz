<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('model/class/Manager.php');
require_once('model/class/Partie.php');
require_once('model/class/PartieManager.php');
require_once('model/class/Question.php');
require_once('model/class/QuestionManager.php');
require_once('model/class/Proposition.php');
require_once('model/class/PropositionManager.php');
require_once('model/class/Score.php');
require_once('model/class/ScoreManager.php');
$manager_score = new ScoreManager();
$score = new Score();

$time_end = time();
$time = $time_end - $_SESSION['timer'];
$calcul_score = ($_SESSION['miams'] * 50000) - $time;


$manager_score->setTemps_miams_score($calcul_score, $_SESSION['miams'], $time, $_SESSION['id_partie'], $_SESSION['auth']);
$temps = $manager_score->getScore($_SESSION['id_partie'], $_SESSION['auth']);
//var_dump($temps);
$score->hydrate($temps);





?>
