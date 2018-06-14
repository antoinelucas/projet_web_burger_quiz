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

//------------------------------------------------------------------------------
//----------------------------- Partie --------------------------------------
//------------------------------------------------------------------------------
$manager_partie = new PartieManager();
$question_game = $manager_partie->getQuestion_game($_SESSION['id_partie']);
/*echo "<br><br>";
var_dump($question_game);
echo "<br><br>";
echo $question_game[$_SESSION['now_question']]["id_question"];*/
$_SESSION['id_question'] = $question_game[$_SESSION['now_question']]["id_question"];

/*
$proposition_game = $manager_partie->getproposition_game($_SESSION['id_partie'], $question_game[$_SESSION['now_question']]["id_question"] );
echo "<br><br>";
var_dump($proposition_game);
echo "<br><br>";
echo $proposition_game[$_SESSION['now_proposition']]["id_propositions"];
$_SESSION['id_proposition'] = $proposition_game[$_SESSION['now_proposition']]["id_propositions"];
*/

if($_SESSION['now_question'] == 0){
  //echo "<br><br>";
  //echo $_SESSION['tab_propositions_game'][$_SESSION['now_proposition']]["id_propositions"];
  $_SESSION['id_proposition'] = $_SESSION['tab_propositions_game'][$_SESSION['now_proposition']]["id_propositions"];
}else{
  $proposition_game = $manager_partie->getproposition_game($_SESSION['id_partie'], $question_game[$_SESSION['now_question']]["id_question"] );
  /*echo "<br><br>";
  var_dump($proposition_game);
  echo "<br><br>";
  echo $proposition_game[$_SESSION['now_proposition']]["id_propositions"];*/
  $_SESSION['id_proposition'] = $proposition_game[$_SESSION['now_proposition']]["id_propositions"];
}

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//----------------------------- Score --------------------------------------
//------------------------------------------------------------------------------

$manager_score = new ScoreManager();
$nb_miams = $manager_score->getMiams($_SESSION['id_partie'], $_SESSION['auth']);    //On récupère l'id de la partie en cours
$_SESSION['miams'] = $nb_miams["miams"];
/*
var_dump($nb_miams);
echo "<br><br>";

echo $nb_miams["miams"];
echo "<br><br>";

echo $_SESSION['auth'];
echo "<br><br>";
*/
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//----------------------------- Questions --------------------------------------
//------------------------------------------------------------------------------
$manager_question = new QuestionManager();
$question = new Question();
/*
$id_question = $manager_question->getId_question($id_partie["id_partie"]);
var_dump($id_question);
echo "<br><br>";
*/
//$_SESSION['question'] = 0;

$tab_question = $manager_question->getQuestion($_SESSION['id_question']);
//var_dump($tab_question);
//echo "<br><br>";

//echo $tab_question[0]['id_question'];
//echo "<br><br>";
$question->hydrate($tab_question);

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//----------------------------- Propositions --------------------------------------
//------------------------------------------------------------------------------
$manager_proposition = new PropositionManager();
$proposition = new Proposition();
$tab_propositions = $manager_proposition->getProposition($_SESSION['id_proposition']);

$proposition->hydrate($tab_propositions);

//var_dump($tab_propositions);
//echo "<br><br>";
/*echo $tab_propositions[1]['proposition'];
echo "<br><br>";
*/



//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//----------------------------- Propositions --------------------------------------
//------------------------------------------------------------------------------
/**$manager_proposition = new PropositionManager();

$tab_propositions = $manager_proposition->getProposition($_SESSION['id_question']);

var_dump($tab_propositions);

for($i=0; $i< count($tab_propositions); $i++){
  $propositions[$i]= new Proposition();
  $propositions[$i]->hydrate($tab_propositions[$i]);
}*/

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
