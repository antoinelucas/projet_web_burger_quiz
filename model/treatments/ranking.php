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

$score_world = $manager_score->getScore_world();
//var_dump($score_world);
//echo $score_world[0]['miams'];


?>
