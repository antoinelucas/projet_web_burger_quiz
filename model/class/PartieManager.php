<?php

require_once("Manager.php");

class PartieManager extends Manager{

  function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
    //var_dump($db);
  }

  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode addPartie -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function addPartie(Partie $partie){
      $req = $this->getDb()->prepare('INSERT INTO PARTIE(partie_nom, nb_questions) VALUES(:partie_nom, :nb_questions)');
      //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $req->bindValue(':partie_nom', $partie->getPartie_nom());
      $req->bindValue(':nb_questions',3);
      //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $req->execute();

      $req = $this->getDb()->prepare('SELECT id_partie FROM PARTIE WHERE partie_nom=:partie_nom');
      $req->bindValue(':partie_nom', $partie->getPartie_nom());
      $req->execute();
      $data_id_partie = $req->fetch(PDO::FETCH_ASSOC);

      $req = $this->getDb()->prepare('SELECT id_question FROM QUESTIONS ORDER BY RAND() LIMIT 3');
      $req->execute();
      $data_id_questions = $req->fetchAll(PDO::FETCH_ASSOC);

      $req = $this->getDb()->prepare('INSERT INTO COMPOSER(id_question, id_partie) VALUES(:id_question, :id_partie)');
      $req->bindValue(':id_question', $data_id_questions[0]["id_question"]);
      $req->bindValue(':id_partie',$data_id_partie["id_partie"]);
      $req->execute();

      $req->bindValue(':id_question', $data_id_questions[1]["id_question"]);
      $req->bindValue(':id_partie',$data_id_partie["id_partie"]);
      $req->execute();

      $req->bindValue(':id_question', $data_id_questions[2]["id_question"]);
      $req->bindValue(':id_partie',$data_id_partie["id_partie"]);
      $req->execute();


    }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------- Méthode getPartie -----------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getPartie($id_partie){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM PARTIE WHERE id_partie=:id_partie');
    $req->bindValue(':id_partie', $id_partie);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getNom_parties -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function getNom_parties(){
      ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $req = $this->getDb()->prepare('SELECT partie_nom FROM PARTIE');
      $req->execute();
      //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $data = $req->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



}
