<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Burger Quiz">
  <meta name="author" content="Antoine Lucas & Gurvan Le Cam">
  <title>Burger Quiz Le jeu</title>
  <link href="public/css/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet">
  <link href="public/css/style_burger_quiz.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="public/img/burger_quiz.png" />
</head>

<?php if (isset($_SESSION['auth'])): ?>
  <section id="navbar_container">
    <nav class="navbar navbar-expand-lg navbar bg-primary">
    <div id="nav_container">
      <div>
        <a class="navbar-brand" href="?action=display_new_game"><img id="nav_img_logo" src="public/img/burger_quizz_logo.png" alt="photo_login1"></a>
      </div>
      <div id="menu_container">
        <div class="lien_container">
          <a class="navbar-brand" href="?action=display_new_game"><?= $img_tab0 ?></a>
          <a class="navbar-brand" href="?action=display_new_game">Jouer</a>
        </div>
        <div class="lien_container">
          <a class="navbar-brand" href="?action=display_ranking"><?= $img_tab1 ?></a>
          <a class="navbar-brand" href="?action=display_ranking">Classement</a>
        </div>
        <div class="lien_container">
          <a class="navbar-brand" href="?action=display_account"><?= $img_tab2 ?></a>
          <a class="navbar-brand" href="?action=display_account">Compte</a>
        </div>
        <div class="lien_container">
          <a class="navbar-brand" href="?action=display_logout"><?= $img_tab3 ?></a>
          <a class="navbar-brand" href="?action=display_logout">Déconnexion</a>
        </div>
      </div>
    </div>
  </nav>
</section>
  <?php else: ?>
    <body>
      <?php endif;
      if(session_status() == PHP_SESSION_NONE){
        session_start();
      }?>
