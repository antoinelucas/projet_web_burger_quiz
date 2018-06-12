<?php

require_once('model/treatments/join_game.php');


$img_tab0 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');
?>

<section id="new_gameView_container">

  <?php
  if(!empty($_SESSION['errors'])): ?>
  <hr>
  <div id="alert-form-container">
    <div class="alert alert-dismissible alert-danger">
      <p>Vous n'avez pas rempli le formulaire correctement</p>
      <ul>
        <?php
        $errors = $_SESSION['errors'];

        foreach ($errors as $key=>$value):?>
        <li><?= $errors[$key]; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endif;
unset($_SESSION['errors']);
?>


<form action="model/treatments/create_game.php" method="POST" id="button_new_game_container">
  <div  class="select_container"class="form-group">
    <label class="col-form-label" for="inputDefault">Nom de la partie</label>
    <input class="form-control" name="partie_nom" placeholder="partie1" id="inputDefault" type="text">
  </div>

  <button type="submit" class="btn btn-primary">Créer une partie</button>
</form>

<form action="model/treatments/launch_game.php" method="POST" id="button_seed_game_container">
  <div class="select_container" class="form-group">
    <label class="col-form-label" for="inputDefault">Sélectionez une partie déjà crée :</label>
    <select class="custom-select" name="game_select">
      <?php for($j=0; $j< count($manager_partie->getNom_parties()); $j++){
        $option[$j] = $partie[$j]['partie_nom']->getPartie_nom();
        echo "<option value=".$option[$j].">".$option[$j]."</option>";
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Rejoindre une partie</button>
</form>

</section>
