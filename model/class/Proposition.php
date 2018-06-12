<?php
require_once("Manager.php");
require_once('PropositionManager.php');


class Proposition{
  private $_id_propositions;
  private $_proposition;
  private $_reponse_question;

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
  public function getId_propositions(){return $this->_id_propositions;}
  public function getProposition(){return $this->_proposition;}
  public function getReponse_question(){return $this->_reponse_question;}

  //-----------------------------------------------------------------------------------------------------------------------


  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setId_propositions($id_propositions){
    $this->_id_propositions = (int) $id_propositions;
  }

  public function setProposition($proposition){
    if(is_string($proposition)){
      $this->_proposition = htmlspecialchars($proposition);
    }
  }

  public function setReponse_question($reponse_question){
    $this->_reponse_question = (int) $reponse_question;
  }
  //-----------------------------------------------------------------------------------------------------------------------

}
