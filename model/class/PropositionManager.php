<?php

require_once("Manager.php");

class PropositionManager extends Manager{

  function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
    //var_dump($db);
  }

  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getProposition -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getProposition($id_proposition){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM PROPOSITIONS WHERE id_propositions=:id_propositions');
    $req->bindValue(':id_propositions', $id_proposition);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode validAnswer -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function validAnswer($id_question, $id_propositions, $user_answer, $user_miams){

    $req = $this->getDb()->prepare('SELECT reponse_question FROM PROPOSITIONS WHERE id_question=:id_question AND id_propositions=:id_propositions ');
    $req->bindValue(':id_question', $id_question);
    $req->bindValue(':id_propositions', $id_propositions);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);

    //var_dump($data);
    /*echo "<br><br>";
    echo $data["reponse_question"];
    echo "<br><br>";
    echo $user_answer;
    echo "<br><br>";*/

    if($user_answer == $data["reponse_question"]){
      /*echo "okf";
      echo $_SESSION['id_partie'];
      echo $_SESSION['auth'];*/

      $req = $this->getDb()->prepare('UPDATE SCORE SET miams=:miams WHERE (id_partie=:id_partie AND pseudo=:pseudo)');
      $req->bindValue(':miams',($user_miams+1));
      $req->bindValue(':id_partie',$_SESSION['id_partie']);
      $req->bindValue(':pseudo',$_SESSION['auth']);
      $req->execute();


    }
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



}
