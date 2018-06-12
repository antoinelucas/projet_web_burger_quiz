<?php
class Theme{
  private $_id_theme;
  private $_name_theme;

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
  public function getIdTheme(){return $this->_id_theme;}
  public function getNameTheme(){return $this->_name_theme;}

  //-----------------------------------------------------------------------------------------------------------------------


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
