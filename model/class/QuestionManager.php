<?php

require_once("Manager.php");

class QuestionManager extends Manager{

  function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
    //var_dump($db);
  }

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------- Méthode getQuestion -----------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getQuestion($id_question){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM QUESTIONS WHERE id_question=:id_question');
    $req->bindValue(':id_question', $id_question);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




}
