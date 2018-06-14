<?php

function logged_only(){
  if(session_status() == PHP_SESSION_NONE){
    session_start();
  }

  if(!isset($_SESSION['auth'])){
    require_once('view/templates/headerView.php');
    ?>
    <div id="div_logged_only_danger" class="alert alert-danger">
      <p>Pour accéder à cette page, vous devez préalablement vous connecter.</p>
      <a href="index.php?action=display_login" class="btn btn-danger">Se connecter</a>
    </div>
    <?php
    exit();
  }
}


?>
