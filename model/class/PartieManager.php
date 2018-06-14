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
  public function getId_partie($partie_nom){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT id_partie FROM PARTIE WHERE partie_nom=:partie_nom');
    $req->bindValue(':partie_nom', $partie_nom);
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



    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------- Méthode getQuestion_proposition  -----------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      public function getQuestion_game($id_partie){
        /*
        echo $_SESSION['now_question'];
        echo "<br><br>";
        echo $_SESSION['now_proposition'];
        echo "<br><br>";
        */
        $req = $this->getDb()->prepare('SELECT id_question FROM COMPOSER WHERE id_partie=:id_partie');
        $req->bindValue(':id_partie', $id_partie);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        //return $data;
        //var_dump($data);
        //echo $data["id_question"];


      //  $answer[0] = $data[$_SESSION['now_question']]["id_question"];

        return $data;
        //var_dump($data);
      }
      //--

      public function getproposition_game($id_partie, $id_question){

        $req = $this->getDb()->prepare('SELECT id_propositions FROM PROPOSITIONS WHERE id_question=:id_question ORDER BY RAND() LIMIT 3');
        $req->bindValue(':id_question', $id_question);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        /*echo "<br><br>";
        echo $data[$_SESSION['now_question']]["id_question"];
        echo "<br><br>";
        echo $data[$_SESSION['now_proposition']]["id_propositions"];*/
        /*echo "<br><br>";
        var_dump($data);
        echo "<br><br>";*/
        //$answer[1] = $data[$_SESSION['now_proposition']]["id_propositions"];

        return $data;

        //var_dump($data);
      }


}
