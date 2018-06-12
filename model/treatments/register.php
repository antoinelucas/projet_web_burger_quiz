<?php

if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once('../class/Manager.php');
require_once('../class/User.php');
require_once('../class/UserManager.php');

$manager = new UserManager();
$user = new User();

if(!empty($_POST)){


  if(empty($_POST['pseudo'])){
    $manager->setError('pseudo', "Le champ pseudo est vide.");
  }else{
    $new_user= ["pseudo" => $_POST['pseudo']];
    /*if($user){
    $errors['pseudo'] = 'Cet pseudo est déjà pris.';
  }*/
}

if(empty($_POST['name'])){
  $manager->setError('name', "Le champ prénom est vide.");
}else{
  $new_user['name'] = $_POST['name'];
}

if(empty($_POST['lastname'])){
  $manager->setError('lastname', "Le champ nom est vide.");
}else{
  $new_user['lastname'] = $_POST['lastname'];
}

if(empty($_POST['mail'])){
  $manager->setError('mail', "Le champ mail est vide.");
}else{
  $new_user['mail'] = $_POST['mail'];
  /*$req = $bdd->prepare('SELECT pseudo FROM USERS Where MAIL = ?');
  $req->execute([$_POST['mail']]);
  $user = $req->fetch();
  if($user){
  $errors['mail'] = 'Vous avez déjà un compte avec cette adresse mail.';
}*/
}

if(!empty($_POST['avatar'])){
  $new_user['avatar'] = $_POST['avatar'];
}

if(empty($_POST['password'])){
  $manager->setError('password', "Le champ mot de passe est vide");
}elseif($_POST['password'] != $_POST['password_confirm']){
  $manager->setError('password', "Les mots de passe ne correspondent pas !");
}else{
  $password_hashed = hash('sha256', $_POST['password']);
  $new_user['password'] = $password_hashed;
  unset($password_hashed);
}

if(empty($_SESSION['errors'])){
  $user->hydrate($new_user);
  $manager->addUser($user);
  $_SESSION['register'] = 'true';            
}

}
unset($user);
unset($new_user);
unset($manager);
header('Location: ../../index.php?action=display_login');
exit();
