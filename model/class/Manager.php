<?php
/**
* \file      Manager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     Manager.php est la classe mère de toutes les classes Manager. Elle permet d'instancier la base de données et gère toutes les erreurs.
*
*/

require_once('constants.php');

class Manager{
  //attributs
  private $_db;
  private $_errors = array();
  private $_manager;

  /**
  * \brief       getter db
  */
  public function getDb(){
    return $this->_db;
  }

  /**
  * \brief       getter d'erreurs
  */
  public function getErrors(){
    return $this->_errors;
  }

  /**
  * \brief       getter de manager
  */
  public function getManager(){
    return $this->_manager;
  }

  /**
  * \brief       setter de manager
  */
  public function setDb($db){
    $this->_db = $db;
  }

  /**
  * \brief       setter d'erreur, il enregistre les erreurs dans une variable session
  * \param    $error_id         récupère la cléf de l'erreur
  * \param    $error_value      récupère la valeur de l'erreur
  */
  public function setError($error_id, $error_value){
    array_push($this->_errors, $error_id, $error_value);
    $_SESSION['errors'] = $this->getErrors();
  }

  /**
  * \brief       setter de manager
  */
  public function setManager($manager){
    $this->_manager = $manager;
  }

  /**
  * \brief     Permet de se connecter à la base de données
  * \details   retoune une erreur si la connexion échoue
  * \return    l'objet $db, une instance de PDO
  */
  protected function dbConnect(){
    try{
      $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8',
      DB_USER, DB_PASSWORD);
    }
    catch(PDOException $e){
      echo "<div class='alert alert-danger'><strong>Erreur!</strong> Il est impossible de se connecter à la BDD.</div>";
      echo $e->getMessage();
      die();
    }
    return $db;
  }

}
