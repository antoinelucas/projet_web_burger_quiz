<?php

require_once("Manager.php");

class ScoreManager extends Manager{

  function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
    //var_dump($db);
  }


  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode initScore -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function initScore($id_partie, $pseudo){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('INSERT INTO SCORE(id_partie, pseudo, miams, temps) VALUES(:id_partie, :pseudo, :miams, :temps)');
    $req->bindValue(':id_partie', $id_partie);
    $req->bindValue(':pseudo', $pseudo);
    $req->bindValue(':miams', 0);
    $req->bindValue(':temps', 0);

    $req->execute();

    $this->setTemps_miams_score(0, 0, 0, $id_partie, $pseudo);
  }


  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getMiams -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getMiams($id_partie, $pseudo){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT miams FROM SCORE WHERE id_partie=:id_partie AND pseudo=:pseudo');
    $req->bindValue(':id_partie', $id_partie);
    $req->bindValue(':pseudo', $pseudo);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getTemps -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getTemps($id_partie, $pseudo){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT temps FROM SCORE WHERE id_partie=:id_partie AND pseudo=:pseudo');
    $req->bindValue(':id_partie', $id_partie);
    $req->bindValue(':pseudo', $pseudo);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getScore -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getScore($id_partie, $pseudo){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM SCORE WHERE id_partie=:id_partie AND pseudo=:pseudo');
    $req->bindValue(':id_partie', $id_partie);
    $req->bindValue(':pseudo', $pseudo);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode setTemps_miams -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function setTemps_miams_score($score, $miams, $temps, $id_partie, $pseudo){
    $req = $this->getDb()->prepare('UPDATE SCORE SET score=:score, miams=:miams, temps=:temps WHERE pseudo=:pseudo AND id_partie=:id_partie');
    $req->bindValue(':id_partie', $id_partie);
    $req->bindValue(':pseudo', $pseudo);
    $req->bindValue(':score', $score);
    $req->bindValue(':miams', $miams);
    $req->bindValue(':temps', $temps);


    $req->execute();
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getScore -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getScore_world(){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM SCORE ORDER BY score DESC');
    $req->execute();
    $this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



}
