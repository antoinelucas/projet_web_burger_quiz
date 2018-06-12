<?php

require_once("model/class/Manager.php");

class PropositionManager extends Manager{

  function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
    //var_dump($db);
  }

  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getProposition -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getProposition($id_question){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM PROPOSITIONS WHERE id_question=:id_question');
    $req->bindValue(':id_question', $id_question);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


}
