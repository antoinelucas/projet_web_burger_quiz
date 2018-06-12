<?php
require_once("Manager.php");
require_once('QuestionManager.php');

class Question{
  private $_id_question;
  private $_libelle1;
  private $_libelle2;


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


  //---------------------------------------- getters -----------------------------------------------------------------------
  public function getId_question(){return $this->_id_question;}
  public function getLibelle1(){return $this->_libelle1;}
  public function getLibelle2(){return $this->_libelle2;}
  //-----------------------------------------------------------------------------------------------------------------------


  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setId_question($id_question){
    $this->_id_question = (int) $id_question;
  }

  public function setLibelle1($libelle1){
    if(is_string($libelle1) && preg_match('/^[a-zA-Z0-9_ ]+$/', $libelle1)){  //l'identifiant est une chaine de caractères alphanumérique
      $this->_libelle1 = htmlspecialchars($libelle1);
    }else{
      $this->_manager->setError('libelle1', "Le 1er libellé n'est pas valide ! Le libellé doit être une chaine de caractères alphanumérique.");
    }
  }


  public function setLibelle2($libelle2){
    if(is_string($libelle2) && preg_match('/^[a-zA-Z0-9_ ]+$/', $libelle2)){  //l'identifiant est une chaine de caractères alphanumérique
      $this->_libelle2 = htmlspecialchars($libelle2);
    }else{
      $this->_manager->setError('libelle2', "Le 2ème libellé n'est pas valide ! Le libellé doit être une chaine de caractères alphanumérique.");
    }
  }
  //-----------------------------------------------------------------------------------------------------------------------






}
