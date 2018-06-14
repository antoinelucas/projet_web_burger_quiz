<?php
require_once('model/treatments/function.php');
logged_only();

$img_tab0 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');

$time_end = microtime_float();
$time = $time_end - $_SESSION['timer'];

echo "le temps";
echo "<br><br>";
echo $time;
echo "<br><br>";



echo $_SESSION['auth'];
?>

<section id="ranking_container">

  <article id="user_best_score">
    <img src="public/img/coupe.png" alt="photo_coupe">
  </article>

  <article id="world_ranking">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Type</th>
          <th scope="col">Column heading</th>
          <th scope="col">Column heading</th>
          <th scope="col">Column heading</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-active">
          <th scope="row">Active</th>
          <td>Column content</td>
          <td>Column content</td>
          <td>Column content</td>
        </tr>
      </tbody>
    </table>
  </article>

</section>
