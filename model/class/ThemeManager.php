<?php
/**
* \file      ThemeManager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     ThemeManager.php est la classe qui gère toutes les requètes sql relative à la classe Theme.php
*
*/

require_once("model/Manager.php");

class ThemeManager extends Manager{

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
  * \brief     Méthode getTheme() permet de récupèrer tout les champs d'un theme en BDD
  * \param    $id_theme         Nécessite en paramètre l'id d'un theme
  * \return   tout les champs du theme
  */
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------- Méthode getTheme -----------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getTheme($id_theme){
    ///$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $this->getDb()->prepare('SELECT * FROM THEME WHERE id_theme=:id_theme');
    $req->bindValue(':id_theme', $id_theme);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


}
