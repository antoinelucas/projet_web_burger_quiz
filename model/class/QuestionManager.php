<?php
/**
* \file      QuestionManager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     QuestionManager.php est la classe qui gère toutes les requètes sql relative à la classe Question.php
*
*/

require_once("Manager.php");

class QuestionManager extends Manager{

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
  * \brief     Méthode getQuestion() permet de récupèrer tout les champs d'une Question en BDD
  * \param    $id_question         Nécessite en paramètre l'id d'une Question
  * \return   un tableau avec tout les champs de la Question
  */
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


  /**
  * \brief     Méthode getId_question() permet de récupèrer l'id d'une question en BDD
  * \param    $id_partie         Nécessite en paramètre l4ID d'une partie
  * \return   l'id d'une Question
  */
  //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getId_question -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getId_question($id_partie){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT id_question FROM COMPOSER WHERE id_partie=:id_partie');
    $req->bindValue(':id_partie', $id_partie);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




}
