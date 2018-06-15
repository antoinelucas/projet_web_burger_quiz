<?php
require_once('templates/headerView.php');
?>

<section  id="authentification_container">
  <section id="authentification_display_container">



    <section id="onglet_container">
      <!-- Login section !-->
      <section class="jumbotron" id="login_container">
        <form action="model/treatments/login.php" method="POST" id="form-login">
          <h1>Connexion</h1>
          <div class="form-group">
            <label for="">pseudo ou Mail</label>
            <input type="text" name="login" class="form-control" placeholder="KeVin_BG_du29" >
          </div>
          <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="*Dragon29kEvIn*" >
          </div>
          <div class="form-group">
            <button class="btn btn-primary" value="Se connecter" type="submit">Se connecter</button>
          </div>
        </form>
      </section>
      <!-- END Login section !-->

      <?php if(!empty($_SESSION['errors'])): ?>
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
      <?php
      unset($_SESSION['errors']);
      elseif(!empty($_SESSION['register'])) :
        ?>

        <div class="alert alert-dismissible alert-success">
          <p><strong>Inscription validé !</strong> Vous pouvez maintenant vous connecter.</p>
        </div>


        <?php
      endif;
      unset($_SESSION['errors']);
      unset($_SESSION['register']);
      ?>



      <!-- register section !-->
      <section class="jumbotron" id="register_container">
        <form action="model/treatments/register.php" method="POST" id="form-register">
          <h1>Inscription</h1>

          <div class="form-group">
            <label for="">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" value="<?= @$_POST['pseudo'] ?>">
          </div>
          <div class="form-group">
            <label for="">Prénom</label>
            <input type="text" name="name" class="form-control" value="<?= @$_POST['name'] ?>">
          </div>

          <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="lastname" class="form-control" value="<?= @$_POST['lastname'] ?>">
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
                <input class="custom-file-input"  name="avatar" id="inputGroupFile02" type="file">
                <label class="custom-file-label" for="inputGroupFile02">Choisir une photo de profil</label>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">M'inscrire</button>

        </form>

      </section>
      <!-- END register section !-->

    </section>
  </section>
</section>
