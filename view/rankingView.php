<?php
require_once('model/treatments/function.php');
logged_only();
require_once('model/treatments/ranking.php');

$img_tab0 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');

?>

<section id="ranking_container">

  <article id="user_best_score">
    <img src="public/img/coupe.png" alt="photo_coupe">
  </article>

  <article id="world_ranking">
    <h2>Top 10 mondiale</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">PARTIE</th>
          <th scope="col">PSEUDO</th>
          <th scope="col">MIAMS</th>
          <th scope="col">TEMPS</th>
          <th scope="col">SCORE</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-active">
          <?php for($i=0; $i < 10; $i++){ ?>
            <th scope="row"><?= $score_world[$i]['id_partie'] ?></th>
            <td><?= $score_world[$i]['pseudo'] ?></td>
            <td><?= $score_world[$i]['miams'] ?></td>
            <td><?= $score_world[$i]['temps'] ?></td>
            <td><?= $score_world[$i]['score'] ?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </article>

</section>
