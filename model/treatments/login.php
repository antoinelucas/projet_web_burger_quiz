<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('../class/Manager.php');
require_once('../class/User.php');
require_once('../class/UserManager.php');

$manager = new UserManager();
$user = new User();

if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
  /*$user_login = ["pseudo" => $_POST['login']];
  //$user_login['pseudo'] = $_POST['login'];
  $user_login['mail'] = $_POST['login'];
  $user_login['password'] = $_POST['password'];*/

  $user_login = $manager->loginUser($_POST['login']);

  if($user_login){
    $user->hydrate($user_login);

    $password_hashed = hash('sha256', $_POST['password']);
    if($password_hashed == $user->getPassword()){
      unset($password_hashed);
      if(session_status() == PHP_SESSION_NONE){
        session_start();
      }

      $_SESSION['auth'] = $user->getPseudo();
      unset($user_login);
      unset($user);
      unset($manager);
      header('Location: ../../index.php?action=display_new_game');
      exit();
    }
  }
}
$manager->setError('login & password', "Identifiant et/ou mot de passe incorrect");
header('Location: ../../index.php?action=display_login');
exit();
