<?php
require_once('model/treatments/function.php');
logged_only();
require_once('model/treatments/game_treatments.php');

$img_tab0 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');


//echo $_SESSION['partie_nom'];
?>





<section clas="jumbotron">
  <article id="game_miams">
    <p><?= $_SESSION['miams'] ?> miams<p>
    </article>

    <article id="game_question">
      <p><?= $question->getLibelle1();?>, <?= $question->getLibelle2();?> ou les deux ?</p>
    </article>

    <article id="game_proposition">
      <p><?= $proposition->getProposition();?></p>
    </article>

    <article id="game_score">
    </article>
    <form action="model/treatments/answer_treatments.php" method="POST">
      <input type="hidden" value="1" name="button">
      <button type="submit" class="btn btn-primary"><?= $question->getLibelle1();?></button>
    </form>
    <form action="model/treatments/answer_treatments.php" method="POST">
      <input type="hidden" value="2" name="button">
      <button type="submit" class="btn btn-primary"><?= $question->getLibelle2();?></button>
    </form>
    <form action="model/treatments/answer_treatments.php" method="POST">
      <input type="hidden" value="3" name="button">
      <button type="submit" class="btn btn-primary">Les deux</button>
    </form>


  </section>
