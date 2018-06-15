<?php
require_once('model/treatments/function.php');
logged_only();
require_once('model/treatments/game_treatments.php');

$img_tab0 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');

?>





<section id="game_jumbotron" class="jumbotron">
  <section id="game_container">

    <section id="question_propositions">

      <article id="game_question">
        <h1><?= $question->getLibelle1();?>, <?= $question->getLibelle2();?> ou les deux ?</h1>
      </article>

      <article id="game_proposition">
        <h2><?= $proposition->getProposition();?></h2>
      </article>

    </section>



    <section id="answer">

      <article id="game_miams">
        <h2><?= $_SESSION['miams'] ?> miams<h2>
        </article>

        <article id="game_answer">
          <form action="model/treatments/answer_treatments.php" method="POST">
            <input type="hidden" value="1" name="button">
            <button id="game_button1" type="submit" class="btn btn-primary"><?= $question->getLibelle1();?></button>
          </form>
          <form action="model/treatments/answer_treatments.php" method="POST">
            <input type="hidden" value="2" name="button">
            <button id="game_button2" type="submit" class="btn btn-primary"><?= $question->getLibelle2();?></button>
          </form>
          <form action="model/treatments/answer_treatments.php" method="POST">
            <input type="hidden" value="3" name="button">
            <button id="game_button3" type="submit" class="btn btn-primary">Les deux</button>
          </form>
        </article>

        <article id="game_score">
          <div id="progress-bar"></div>
        </article>

      </section>

    </section>
  </section>
