<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('../class/Manager.php');
require_once('../class/Partie.php');
require_once('../class/PartieManager.php');
require_once('../class/Question.php');
require_once('../class/QuestionManager.php');
require_once('../class/Proposition.php');
require_once('../class/PropositionManager.php');
require_once('../class/Score.php');
require_once('../class/ScoreManager.php');


$manager_proposition = new PropositionManager();
$proposition = new Proposition();
$manager_score = new ScoreManager();
$score = new Score();

if(!empty($_POST)){
  /*echo "tralala";
  echo "<br><br>";
  echo $_SESSION['id_question'];
  echo "<br><br>";
  echo $_SESSION['id_proposition'];
  echo "<br><br>";*/
  $manager_proposition->validAnswer($_SESSION['id_question'], $_SESSION['id_proposition'], $_POST["button"], $_SESSION['miams']);

  $tab_score = $manager_score->getScore($_SESSION['id_partie'], $_SESSION['auth']);
  /*echo "<br><br>";
  var_dump($tab_score);
  echo "<br><br>";*/
  $score->hydrate($tab_score);
  /*echo "<br><br>";
  var_dump($score);
  echo "<br><br>";
  echo $score->getMiams();*/
  if($_SESSION['now_proposition'] <2){
    $_SESSION['now_proposition']+= 1;
    header('Location: ../../index.php?action=display_game');
    exit();
  }else{
    $_SESSION['now_proposition'] = 0;
    if($_SESSION['now_question'] < 2){
      $_SESSION['now_question']+= 1;
      header('Location: ../../index.php?action=display_game');
      exit();
    }else{
      header('Location: ../../index.php?action=display_end_game');
      exit();
    }
  }
}
