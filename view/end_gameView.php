<?php
require_once('model/treatments/function.php');
logged_only();
require_once('model/treatments/end_game.php');

$img_tab0 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');

?>

<section id="game_ranking_container">

  <article id="game_coupe">
    <img src="public/img/coupe.png" alt="photo_coupe">
  </article>

  <article id="game_user_score">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">PARTIE</th>
          <th scope="col">MIAMS</th>
          <th scope="col">TEMPS</th>
          <th scope="col">SCORE</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-active">
          <th scope="row"><?= $_SESSION['auth'] ?></th>
          <td><?= $score->getMiams() ?></td>
          <td><?= $score->getTemps() ?></td>
          <td><?= $calcul_score ?></td>
        </tr>
      </tbody>
    </table>
  </article>

</section>
