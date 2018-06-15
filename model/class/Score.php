<?php
/**
* \file      Score.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     Score.php est la classe relative à la table Score dans la BDD
*
*/
require_once("Manager.php");
require_once('ScoreManager.php');


class Score{
  private $_miams;
  private $_temps;
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
  //------------------------------------------ getters --------------------------------------------------------------------
  public function getMiams(){return $this->_miams;}
  public function getTemps(){return $this->_temps;}

  //-----------------------------------------------------------------------------------------------------------------------

  /**
  * \brief       setter
  */
  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setMiams($miams){
    $this->_miams = (int) $miams;
  }

  public function setTemps($temps){
      $this->_temps = (float) $temps;
  }
  //-----------------------------------------------------------------------------------------------------------------------

}
