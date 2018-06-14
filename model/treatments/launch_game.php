<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('../class/Manager.php');
require_once('../class/Partie.php');
require_once('../class/PartieManager.php');
require_once('../class/Score.php');
require_once('../class/ScoreManager.php');
require_once('../treatments/function.php');



$manager_partie = new PartieManager();
$manager_score = new ScoreManager();

//echo $_POST['game_select'];

if(!empty($_POST)){
  if(empty($_POST['game_select'])){
    $manager_partie->setError('game_select', "Vous n'avez pas sélectioné de partie.");
  }
  if(empty($_SESSION['errors'])){
    $_SESSION['partie_nom'] = $_POST['game_select'];
    $id_partie = $manager_partie->getId_partie($_SESSION['partie_nom']);    //On récupère l'id de la partie en cours
    $_SESSION['id_partie'] =  $id_partie["id_partie"];
    //echo $id_partie['id_partie'];
    $manager_score->initScore($id_partie['id_partie'], $_SESSION['auth']);
    $_SESSION['now_question'] = 0;
    $_SESSION['now_proposition'] = 0;

    $question_game = $manager_partie->getQuestion_game($_SESSION['id_partie']);
    /*echo "<br><br>";
    var_dump($question_game);
    echo "<br><br>";
    echo $question_game[$_SESSION['now_question']]["id_question"];
*/

    $proposition_game = $manager_partie->getproposition_game($_SESSION['id_partie'], $question_game[$_SESSION['now_question']]["id_question"] );
    /*echo "<br><br>";
    var_dump($proposition_game);
    echo "<br><br>";
    echo $proposition_game[$_SESSION['now_proposition']]["id_propositions"];*/
    //var_dump($answer);
    /*$_SESSION['answer'] = $answer;
    var_dump($_SESSION['answer']);*/
    $_SESSION['id_question'] = $question_game[$_SESSION['now_question']]["id_question"];
    $_SESSION['id_proposition'] = $proposition_game[$_SESSION['now_proposition']]["id_propositions"];
    $_SESSION['tab_propositions_game'] = $proposition_game;
    //var_dump($_SESSION['tab_propositions_game']);



    unset($_SESSION['timer']);
    $time_start = microtime_float();
    $_SESSION['timer'] = $time_start;

    header('Location: ../../index.php?action=display_game');
    exit();
  }
}
header('Location: ../../index.php?action=display_new_game');
exit();
