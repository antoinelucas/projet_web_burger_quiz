<?php
require_once('model/treatments/function.php');
logged_only();

$img_tab0 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
require_once('templates/headerView.php');



if(!empty($_POST) && isset($_POST['btn'])){
  $mail1=0;
  if(!isset($_POST['suppr']) && isset($_POST['btn'])){
    $errors['suppr'] = "Cochez la case pour confirmer la suppression";
  }

  $mdp2=0;
  if($_POST['passwordd'] != $_SESSION['auth']['MDP'] && isset($_POST['btn'])){
    $errors['mdp2'] = "Vous devez rentrer votre mot de passe correctement pour supprimer votre compte";
  }
  else{$mdp2=1;}
}
if(!empty($_POST) && isset($_POST['modif'])){
  $errors = array();

  if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])){
    $errors['nom'] = "Votre nom n'est pas valide.";
    $nom1=0;
  }
  else {
    $nom1=1;
  }

  if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom'])){
    $errors['prenom'] = "Votre prenom n'est pas valide.";
    $prenom1=0;
  }
  else{ $prenom1=1;}

  if((empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))){
    $errors['mail'] = "Votre mail n'est pas valide.";
    $mail1 =0;
  }else if (isset($_POST['btn'])==false){
    $mail1=1;
    $req = $bdd->prepare('SELECT IDENTIFIANT FROM USERS Where MAIL = ?');
    $req->execute([$_POST['mail']]);
    $user = $req->fetch();
    if($user && $_POST['mail'] != $_SESSION['auth']['MAIL']){
      $errors['mail'] = 'Vous avez déjà un compte avec cette adresse mail.';
      $mail1=0;
    }
  }

  if(empty($_POST['password']) || $_POST['password'] != $_SESSION['auth']['MDP']){
    $errors['password'] = "Vous n'avez pas rentré correctement votre mot de passe.";
    $mdp1=0;
  }
  else{$mdp1=1;}

  if(empty($_POST['nouveau_password']) && empty($_POST['password_confirm'])) {
    $newmdp1 = 0;
  }

  else if($_POST['nouveau_password'] != $_POST['password_confirm'] && (!empty($_POST['nouveau_password']) || !empty($_POST['password_confirm']))) {
    $errors['password'] = "Vous avez fait une erreur dans la confirmation du mot de passe";
    $newmdp1=1;
  }
  else if($_POST['nouveau_password'] == $_POST['password_confirm']){$newmdp1=2;}

  if(isset($_POST['vip'])){
    $_POST['vip']='1';
  }else{
    $_POST['vip']='0';
  }

  if ($nom1==1 && $prenom1==1 && $mail1==1 && $mdp1==1 && $newmdp1==0 && isset($_POST['btn'])==false) {
    $stmt = $bdd->prepare("UPDATE  USERS
      SET nom = :nom, prenom = :prenom, mail = :mail, privilege = :vip
      WHERE identifiant= :identifiant;");

      $stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
      $stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
      $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
      $stmt->bindValue(':vip', $_POST['vip'], PDO::PARAM_BOOL);
      $stmt->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);
      $stmt->execute();
      ?> <script> location.replace("presentation/logout.php"); </script> <?php
    }

    else if ($nom1==1 && $prenom1==1 && $mail1==1 && $mdp1==1 && $newmdp1==2 && isset($_POST['btn'])==false) {
      $stmt = $bdd->prepare("UPDATE  USERS
        SET nom = :nom, prenom = :prenom, mail = :mail, mdp  =:mdp, privilege = :vip
        WHERE identifiant= :identifiant;");

        $stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
        $stmt->bindValue(':mdp', $_POST['nouveau_password'], PDO::PARAM_STR);
        $stmt->bindValue(':vip', $_POST['vip'], PDO::PARAM_BOOL);
        $stmt->bindValue(':identifiant', $_POST['identifiant'], PDO::PARAM_STR);
        $stmt->execute();
        ?> <script> location.replace("presentation/logout.php"); </script> <?php
      }

    }?>




    <div class="general-content">
      <div class="jumbotron" class="general-content-jumbotron">

        <div class="form-register">
          <form action="" method="POST" id="change-values">
            <h1>Mon compte - Modifier mes informations</h1>
            <hr>
            <?php if(!empty($errors)): ?>
              <hr>
              <div id="alert-values-wrong">
                <div class="alert alert-danger">
                  <p>Vous n'avez pas rempli le formulaire correctement</p>
                  <ul>
                    <?php foreach ($errors as $error): ?>
                      <li><?= $error; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            <?php endif; ?>
            <hr>

            <div class="form-group">
              <label for="">Identifiant (Vous ne pouvez pas changer d'identifiant !)</label>
              <input type="text" name="identifiant" class="form-control" value="<?php echo $_SESSION['auth']['IDENTIFIANT']?>">
            </div>

            <div class="form-group">
              <label for="">Votre nom est :
              </label>
              <input type="text" name="nom" class="form-control" value="<?php echo $_SESSION["auth"]["NOM"] ?>">
            </div>

            <div class="form-group">
              <label for="">Votre prénom est :
                <input type="text" name="prenom" class="form-control" value="<?php echo $_SESSION["auth"]["PRENOM"] ?>">
              </div>

              <div class="form-group">
                <label for="">Votre adresse mail est :
                  <input type="text" name="mail" class="form-control" value="<?php echo $_SESSION["auth"]["MAIL"] ?>">
                </div>

                <div class="form-group">
                  <label for="">Mot de passe actuel</label>
                  <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Nouveau mot de passe (laisser un blanc si vous ne voulez pas le modifier)</label>
                  <input type="password" name="nouveau_password" class="form-control">
                </div>

                <div class="form-group">
                  <label for="">Confirmer le nouveau mot de passe</label>
                  <input type="password" name="password_confirm" class="form-control">
                </div>
                <hr>
                <button type="submit" name='modif' class="btn btn-primary">Changer mes informations</button>
                <hr>
              </form>
            </div>
          </div>
        </div>
        <hr>
        <div class="general-content">
          <div class="jumbotron" class="general-content-jumbotron">
            <div class="form-register">
              <form action="" method="POST">
                <h1>Mon compte - Supprimer mon compte</h1>
                <br>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="suppr" id="optionsRadios" type="checkbox">
                    Voulez vous supprimer votre compte ?
                  </label>
                </div>
                <br>
                <div class="form-group">
                  <label for="">Mot de passe</label>
                  <input type="password" name="passwordd" class="form-control">
                </div>
                <br>
                <input class="btn btn-primary" type="submit" name="btn" value="Supprimer mon compte"  onclick="return true;"/>

                <?php
                if(isset($_POST['suppr']) && isset($_POST['btn']) && $mdp2==1){

                  $ida= $_SESSION['auth']['IDENTIFIANT'];
                  $sql = "DELETE FROM RESERVER  WHERE identifiant = ?";
                  $q = $bdd->prepare($sql);
                  $q->execute(array($ida));

                  $sql = "DELETE FROM USERS  WHERE identifiant = ?";
                  $q = $bdd->prepare($sql);
                  $q->execute(array($ida));
                  ?> <script> location.replace("presentation/logout.php"); </script> <?php
                } ?>
              </form>
            </div>
          </div>
        </div>
