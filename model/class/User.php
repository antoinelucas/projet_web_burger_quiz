<?php
/**
* \file      User.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     User.php est la classe relative à la table User dans la BDD
*
*/

require_once("Manager.php");
require_once('UserManager.php');

class User{

  private $_pseudo;
  private $_password;
  private $_mail;
  private $_name;
  private $_lastname;
  private $_vip;
  private $_avatar;
  private $_manager;

  /**
  * \brief      constructeur qui instancie un Manager (de la classe Manager.php)
  * \details    permet de déclarer des erreurs
  */
  function __construct(){
    $this->_manager = new Manager();
  }


  /**
  * \brief     méthode permettant "d'hydrater" tout les setters
  * \details   retoune une erreur si la connexion échoue
  * \param    $data         requière un tableau associatif avec comme cléfs les noms des setters. (souvent un retour de la base de données)
  */
  //-------------------------------------- Méthode d'hydratation ---------------------------------------------------------
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if(method_exists($this,$method)){
        $this->$method($value);
      }
    }
  }
  //-----------------------------------------------------------------------------------------------------------------------


  /**
  * \brief       getter
  */
  //getters
  public function getPseudo(){return $this->_pseudo;}
  public function getPassword(){return $this->_password;}
  public function getMail(){return $this->_mail;}
  public function getName(){return $this->_name;}
  public function getLastname(){return $this->_lastname;}
  public function getVip(){return $this->_vip;}
  public function getAvatar(){return $this->_avatar;}


  /**
  * \brief       setter
  */
  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setPseudo($pseudo){
    if(is_string($pseudo) && strlen($pseudo) <= 50 && preg_match('/^[a-zA-Z0-9_]+$/', $pseudo)){  //l'identifiant est une chaine de caractères de 50 caractères max
      $this->_pseudo = htmlspecialchars($pseudo);
    }else{
      $this->_manager->setError('pseudo', "Le pseudo n'est pas valide ! Le pseudo doit être une chaine de caractères alphanumérique et de 50 caractères maximun.");
    }
  }

  public function setPassword($password){
    if(is_string($password) && strlen($password) == 64){
      $this->_password = htmlspecialchars($password);
    }else{
      $this->_manager->setError('password', "Le mot de passe n'est pas valide ! Le mot de passe doit être une chaine de 50 caractères maximun.");
    }
  }

  public function setMail($mail){
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
      $this->_mail = htmlspecialchars($mail);
    }else{
      $this->_manager->setError('mail', "Le mail n'est pas valide !");
    }
  }

  public function setName($name){
    if(preg_match('/^[a-zA-Z]+$/', $name ) && is_string($name) && strlen($name) <= 50){
      $this->_name = htmlspecialchars($name);
    }else {
      $this->_manager->setError('name',"Le prénom n'est pas valide ! Le prénom doit être une chaine 50 de caractères maximun, uniquement des lettres.");
    }
  }

  public function setLastname($lastname){
    if(preg_match('/^[a-zA-Z]+$/', $lastname) && is_string($lastname) && strlen($lastname) <= 50){
      $this->_lastname = htmlspecialchars($lastname);
    }else {
      $this->_manager->setError('lastname', "Le nom n'est pas valide ! Le nom doit être une chaine de 50 caractères maximun, uniquement des lettres.");
    }
  }

  public function setVip($vip){                                                                   // pas nécessaire de faire le setter pour le vip
    if(ctype_digit($vip) && $vip==1 || $vip==0){
      $this->_vip = htmlspecialchars($vip);
    }else {
      $this->_manager->setError('vip',"Le vip n'est pas valide !");
    }
  }

  public function setAvatar($avatar){
    if((is_string($avatar) && strlen($avatar) <= 50) || !isset($avatar)){
      $this->_avatar = htmlspecialchars($avatar);
    }else {
      $this->_manager->setError('avatar', "Le lien pour l'avatar n'est pas valide ! Le lien doit être une chaine de 50 caractères maximun.");
    }
  }

//-----------------------------------------------------------------------------------------------------------------------

}
