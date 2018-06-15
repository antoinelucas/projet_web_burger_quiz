<?php
/**
* \file      ScoreManager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     ScoreManager.php est la classe qui gère toutes les requètes sql relative à la classe Score.php
*
*/
require_once("Manager.php");

class ScoreManager extends Manager{

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
  * \brief     Méthode initScore() permet d'initialisé le score d'une partie en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une Partie
  * \param    $pseudo         Nécessite en paramètre le pseudo de l'user
  */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode initScore -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function initScore($id_partie, $pseudo){
    $req = $this->getDb()->prepare('INSERT INTO SCORE(id_partie, pseudo, miams, temps) VALUES(:id_partie, :pseudo, :miams, :temps)');
    $req->bindValue(':id_partie', $id_partie);
    $req->bindValue(':pseudo', $pseudo);
    $req->bindValue(':miams', 0);
    $req->bindValue(':temps', 0);

    $req->execute();

    $this->setTemps_miams_score(0, 0, 0, $id_partie, $pseudo);
  }


  /**
  * \brief     Méthode getMiams() permet de récupèrer le nombre de miams d'une partie en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une Partie
  * \param    $pseudo         Nécessite en paramètre le pseudo de l'user
  * \return   le nombre de miams de l'utilisateur pour cette partie
  */
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


  /**
  * \brief     Méthode getTemps() permet de récupèrer le temps de réponse d'un user sur une partie en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une Partie
  * \param    $pseudo         Nécessite en paramètre le pseudo de l'user
  * \return   le temps de réponse d'un user sur une partie
  */
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


  /**
  * \brief     Méthode getScore() permet de récupèrer le score d'un user sur une partie en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une Partie
  * \param    $pseudo         Nécessite en paramètre le pseudo de l'user
  * \return   le score d'un user sur une partie
  */
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


  /**
  * \brief     Méthode setTemps_miams_score() permet d'update le score, le nombre de miams et le temps d'un user sur une partie en BDD
  * \param    $id_partie         Nécessite en paramètre l'id d'une Partie
  * \param    $pseudo         Nécessite en paramètre le pseudo de l'user
  * \param    $score         Nécessite en paramètre le score de l'user
  * \param    $miams         Nécessite en paramètre le nombre de miams de l'user
  * \param    $temps         Nécessite en paramètre le temps de l'user
  */
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
  

  /**
  * \brief     Méthode getScore_world() permet de récupérer tout les scores ranger du meilleur score au moins bon
  * \return   tout les scores ranger du meilleur score au moins bon
  */
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
