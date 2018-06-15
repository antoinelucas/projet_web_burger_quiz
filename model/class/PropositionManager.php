<?php
/**
* \file      PropositionManager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     PropositionManager.php est la classe qui gère toutes les requètes sql relative à la classe Proposition.php
*
*/

require_once("Manager.php");

class PropositionManager extends Manager{

  /**
  * \brief      constructeur qui instancie un objet $db (de la classe Manager.php)
  * \details    permet de se connecter à la BDD
  */
  function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
    //var_dump($db);
  }

  /**
  * \brief     Méthode getProposition() permet de récupèrer tout les champs d'une proposition en BDD
  * \param    $id_proposition         Nécessite en paramètre l'id d'une proposition
  * \return   un tableau avec tout les champs de la proposition
  */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getProposition -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getProposition($id_proposition){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM PROPOSITIONS WHERE id_propositions=:id_propositions');
    $req->bindValue(':id_propositions', $id_proposition);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  /**
  * \brief     Méthode validAnswer() permet d'ajouter un miams en BDD
  * \param    $id_question         Nécessite en paramètre l'id d'une question
  * \param    $id_proposition         Nécessite en paramètre l'id d'une proposition
  * \param    $user_answer         Nécessite en paramètre le nombre de miams de l'user
  * \param    $user_miams         Nécessite en paramètre la réponse de l'user
  */
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

    if($user_answer == $data["reponse_question"]){
      $req = $this->getDb()->prepare('UPDATE SCORE SET miams=:miams WHERE (id_partie=:id_partie AND pseudo=:pseudo)');
      $req->bindValue(':miams',($user_miams+1));
      $req->bindValue(':id_partie',$_SESSION['id_partie']);
      $req->bindValue(':pseudo',$_SESSION['auth']);
      $req->execute();


    }
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



}
