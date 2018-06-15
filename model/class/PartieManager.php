<?php
/**
* \file      PartieManager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     PartieManager.php est la classe qui gère toutes les requètes sql relative à la classe Partie.php
*
*/

require_once("Manager.php");

class PartieManager extends Manager{

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
  * \brief     Méthode addPartie() permet d'ajouter une partie en BDD
  * \param    $partie         Nécessite en paramètre un objet Partie
  */
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

  /**
  * \brief     Méthode getId_partie() permet de récupèrer l'id d'une partie en BDD
  * \param    $partie_nom         Nécessite en paramètre le nom d'une partie
  * \return   l'id d'une partie
  */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getPartie -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getId_partie($partie_nom){
    $req = $this->getDb()->prepare('SELECT id_partie FROM PARTIE WHERE partie_nom=:partie_nom');
    $req->bindValue(':partie_nom', $partie_nom);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  /**
  * \brief     Méthode getNom_parties() permet de récupèrer les noms des parties en BDD
  * \return   le nom de chaque parties
  */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getNom_parties -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getNom_parties(){
    $req = $this->getDb()->prepare('SELECT partie_nom FROM PARTIE');
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  /**
  * \brief     Méthode getQuestion_game() permet de récupèrer l'id d'une question relative à une partie en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une partie
  * \return   les id de toutes les questions qui composent la partie
  */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode getQuestion_proposition  -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getQuestion_game($id_partie){
    $req = $this->getDb()->prepare('SELECT id_question FROM COMPOSER WHERE id_partie=:id_partie');
    $req->bindValue(':id_partie', $id_partie);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);

    return $data;
  }


  /**
  * \brief     Méthode getproposition_game() permet de récupèrer aléatoirement 3 propositions relative à une question en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une partie
  * \param    $id_question       Nécessite en paramètre l'id d'une question
  * \return   les id de 3 propositions
  */
  public function getproposition_game($id_partie, $id_question){

    $req = $this->getDb()->prepare('SELECT id_propositions FROM PROPOSITIONS WHERE id_question=:id_question ORDER BY RAND() LIMIT 3');
    $req->bindValue(':id_question', $id_question);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
}
