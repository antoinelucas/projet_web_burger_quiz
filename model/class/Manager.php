<?php
class Manager{
  //attributs
  private $_db;
  private $_errors = array();
  private $_manager;

  //getters
  public function getDb(){
    return $this->_db;
  }

  public function getErrors(){
    return $this->_errors;
  }

  public function getManager(){
    return $this->_manager;
  }

//setters
  public function setDb($db){
    $this->_db = $db;
  }

  public function setError($error_id, $error_value){
    array_push($this->_errors, $error_id, $error_value);
    $_SESSION['errors'] = $this->getErrors();
  }

  public function setManager($manager){
    $this->_manager = $manager;
  }

  //méthodes
  protected function dbConnect(){
    try{
      $db = new PDO('mysql:host=localhost;dbname=burgerquiz;charset=utf8', 'burgerquiz', 'quizburger');
    }
    catch(PDOException $e){
      echo "<div class='alert alert-danger'><strong>Erreur!</strong> Il est impossible de se connecter à la BDD.</div>";
      echo $e->getMessage();
      die();
    }
    return $db;
  }




}
