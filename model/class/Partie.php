<?php
require_once("Manager.php");
require_once('PartieManager.php');

class Partie{
  private $_id_partie;
  private $_partie_nom;
  private $_nb_questions;
  private $_manager;


  function __construct(){
    $this->_manager = new Manager();
  }


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

  //------------------------------------------ getters --------------------------------------------------------------------
  public function getId_partie(){return $this->_id_partie;}
  public function getPartie_nom(){return $this->_partie_nom;}
  public function getNb_questions(){return $this->_nb_questions;}

  //-----------------------------------------------------------------------------------------------------------------------


  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setId_partie($id_partie){
    $this->_id_partie = (int) $_id_partie;
  }

  public function setPartie_nom($partie_nom){
    if(is_string($partie_nom) && strlen($partie_nom) <= 50 && preg_match('/^[a-zA-Z0-9_]+$/', $partie_nom)){
      $this->_partie_nom = htmlspecialchars($partie_nom);
    }else{
      var_dump($this->_manager->getManager());
      $this->_manager->setError('partie_nom', "Le nom de la partie n'est pas valide ! Le nom de la partie doit être une chaine de caractères alphanumérique et de 50 caractères maximun.");
      var_dump($this->_manager->getErrors());
    }
  }

  public function setNb_questions($nb_questions){
    $this->_nb_questions = (int) $_nb_questions;
  }
  //-----------------------------------------------------------------------------------------------------------------------

}
