<?php

require_once('model/class/Manager.php');
require_once('model/class/Question.php');
require_once('model/class/QuestionManager.php');
require_once('model/class/Proposition.php');
require_once('model/class/PropositionManager.php');


$id_question = 1;


//------------------------------------------------------------------------------
//----------------------------- Questions --------------------------------------
//------------------------------------------------------------------------------
$manager_question = new QuestionManager();
$question = new Question();


$tab_question = $manager_question->getQuestion($id_question);
$question->hydrate($tab_question);

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------




//------------------------------------------------------------------------------
//----------------------------- Propositions --------------------------------------
//------------------------------------------------------------------------------
$manager_proposition = new PropositionManager();

$tab_propositions = $manager_proposition->getProposition($question->getId_question());

for($i=0; $i< count($tab_propositions); $i++){
  $propositions[$i]= new Proposition();
  $propositions[$i]->hydrate($tab_propositions[$i]);
}

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//----------------------------- Propositions --------------------------------------
//------------------------------------------------------------------------------
/*$manager_proposition = new PropositionManager();

$tab_propositions = $manager_proposition->getProposition($question->getId_question());

for($i=0; $i< count($tab_propositions); $i++){
  $propositions[$i]= new Proposition();
  $propositions[$i]->hydrate($tab_propositions[$i]);
}
*/
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
