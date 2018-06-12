<?php
$img_tab0 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');
?>


<section class="jumbotron" id="account_container">
  <form action="" method="POST" id="form-register">
    <h1>Inscription</h1>

    <div class="form-group">
      <label for="">Identifiant</label>
      <input type="text" name="identifiant" class="form-control" value="<?= @$_POST['identifiant'] ?>">
    </div>
    <div class="form-group">
      <label for="">Nom</label>
      <input type="text" name="nom" class="form-control" value="<?= @$_POST['nom'] ?>">
    </div>

    <div class="form-group">
      <label for="">Prénom</label>
      <input type="text" name="prenom" class="form-control" value="<?= @$_POST['prenom'] ?>">
    </div>

    <div class="form-group">
      <label for="">Adresse mail</label>
      <input type="text" name="mail" class="form-control" value="<?= @$_POST['mail'] ?>">
    </div>

    <div class="form-group">
      <label for="">Mot de passe</label>
      <input type="password" name="password" class="form-control" >
    </div>

    <div class="form-group">
      <label for="">Confirmez votre mot de passe</label>
      <input type="password" name="password_confirm" class="form-control" >
    </div>

    <div class="form-group" >
      <div class="input-group mb-3" id="photo_profil_container">
        <div class="custom-file">
          <input class="custom-file-input" id="inputGroupFile02" type="file">
          <label class="custom-file-label" for="inputGroupFile02">Choisir une photo de profil</label>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>

  </form>
</section>
