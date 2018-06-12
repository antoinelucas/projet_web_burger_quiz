<?php
require_once('model/treatments/game_treatments.php');

$img_tab0 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');


echo $_SESSION['partie_nom'];
?>





<section clas="jumbotron">
  <article id="game_miams">
    <img src="public/img/score_miams.png" alt="photo_miams">
  </article>

  <article id="game_question">
    <p><?= $question->getLibelle1();?>, <?= $question->getLibelle2();?> ou les deux ?</p>
  </article>

  <article id="game_proposition">
    <p><?= $propositions[0]->getProposition();?></p>
  </article>

  <article id="game_score">
  </article>

  <button type="submit" class="btn btn-primary"><?= $question->getLibelle1();?></button>
  <button type="submit" class="btn btn-primary"><?= $question->getLibelle2();?></button>
  <button type="submit" class="btn btn-primary">Les deux</button>
</section>
