<?php
/**
* \file      Theme.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     Theme.php est la classe relative à la table Theme dans la BDD
*
*/

class Theme{
  private $_id_theme;
  private $_name_theme;

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
  public function getIdTheme(){return $this->_id_theme;}
  public function getNameTheme(){return $this->_name_theme;}

  //-----------------------------------------------------------------------------------------------------------------------


  /**
  * \brief       setter
  */
  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setIdTheme($id_theme){
    $this->_id_theme = (int) $id_theme;
  }

  public function setNameTheme($name_theme){
    if(is_string($name_theme) && strlen($name_theme) <= 50){
      $this->_name_theme = $name_theme;
    }
  }
  //-----------------------------------------------------------------------------------------------------------------------

}
