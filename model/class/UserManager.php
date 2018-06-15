<?php
/**
* \file      UserManager.php
* \author    Antoine Lucas
* \version   1.0
* \date      15 Juin 2018
* \brief     UserManager.php est la classe qui gère toutes les requètes sql relative à la classe User.php
*
*/

require_once("Manager.php");

class UserManager extends Manager{

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
  * \brief     Méthode addUser() permet d'ajouter un user en BDD
  * \param    $user         Nécessite en paramètre un objet USER
  */
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------- Méthode addUser -----------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function addUser(User $user){
    $req = $this->getDb()->prepare('INSERT INTO USER(pseudo, password, mail, name, lastname, vip, avatar) VALUES(:pseudo, :password, :mail, :name, :lastname, :vip, :avatar)');

    $req->bindValue(':pseudo', $user->getPseudo());
    $req->bindValue(':password', $user->getPassword());
    $req->bindValue(':mail', $user->getMail());
    $req->bindValue(':name', $user->getName());
    $req->bindValue(':lastname', $user->getLastname());
    $req->bindValue(':vip', $user->getVip(), PDO::PARAM_INT);
    $req->bindValue(':avatar', $user->getAvatar());

    $req->execute();
  }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


/**
* \brief     Méthode addUser() permet d'update un user en BDD
* \param    $user         Nécessite en paramètre un objet USER
*/
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------- Méthode updateUser --------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function updateUser(User $user){
    $req = $this->getDb()->prepare('UPDATE USER SET password=:password, mail=:mail, name=:name, lastname=:lastname, vip=:vip, avatar=:avatar WHERE pseudo=:pseudo');

    $req->bindValue(':password', $user->getPassword());
    $req->bindValue(':mail', $user->getMail());
    $req->bindValue(':name', $user->getName());
    $req->bindValue(':lastname', $user->getLastname());
    $req->bindValue(':vip', $user->getVip(), PDO::PARAM_INT);
    $req->bindValue(':avatar', $user->getAvatar());
    $req->bindValue(':pseudo', $user->getPseudo());

    $req->execute();
  }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



/**
* \brief     Méthode addUser() permet de récuperer un user en BDD
* \param    $pseudo         Nécessite en paramètre le pseudo de l'utilisateur
* \return   tout les champs d'un user
*/
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------- Méthode getUser -----------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function getUser($pseudo){
    $req = $this->getDb()->prepare('SELECT * FROM USER WHERE pseudo=:pseudo');
    $req->bindValue(':pseudo', $pseudo);
    $req->execute();
    //$this->getDb()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


  /**
  * \brief     Méthode loginUser() permet de récuperer un user en BDD
  * \param    $login         Nécessite en paramètre un tableau de l'utilisateur
  * \return   tout les champs d'un user
  */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode loginUser -----------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function loginUser($login){
      $req = $this->getDb()->prepare('SELECT * FROM USER WHERE (pseudo=:pseudo OR mail=:mail)');
      $req->bindValue(':pseudo', $login);
      $req->bindValue(':mail', $login);
      $req->execute();
      $data = $req->fetch(PDO::FETCH_ASSOC);
      return $data;
    }
    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    /**
    * \brief     Méthode deleteUser() permet de supprimer un user en BDD
    * \param    $user         Nécessite en paramètre un objet USER
    */
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------- Méthode deleteUser --------------------------------------------------------------------------------------------------------
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  public function deleteUser(User $user){
    //Execute une requête de type delete
    $req = $this->getDb()->prepare('DELETE FROM USER WHERE pseudo =:pseudo');
    $req->bindValue(':pseudo', $user->getPseudo());
    $req->execute();
  }
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

}
