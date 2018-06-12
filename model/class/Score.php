<?php
class Score{
  private $_miams;
  private $_temps;

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
  public function getMiams(){return $this->_miams;}
  public function getTemps(){return $this->_temps;}

  //-----------------------------------------------------------------------------------------------------------------------


  //---------------------------------------- setters -----------------------------------------------------------------------
  public function setMiams($miams){
    $this->_miams = (int) $miams;
  }

  public function setTemps($temps){
      $this->_temps = $temps;
  }
  //-----------------------------------------------------------------------------------------------------------------------

}
