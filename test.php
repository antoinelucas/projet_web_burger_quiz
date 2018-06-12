<?php

/*$request = $db->query('SELECT * FROM USER');

while($donnees = $request->fetch(PDO::FETCH_ASSOC)){
  $user = new User($donnees);

  echo $user->pseudo(), ' a ' , $user->name();
*/

require('model/User.php');
require('model/UserManager.php');


$user_tab = [
  'pseudo' => 'toto75',
  'password' => '123456',
  'mail' => 'toto@hotmail.fr',
  'name' => 'toma',
  'lastname' => 'gris',
  'vip' => 0,
  'avatar' => 'ceciestmonavatar',
];

/*try
{
	$db = new PDO('mysql:host=localhost;dbname=burgerquiz;charset=utf8', 'burgerquiz', 'quizburger');
  $reponse = $db->prepare('SELECT * FROM USER');
  $reponse->execute();
  $fetch_rep = $reponse->fetchAll();

  echo '<br><br>';
  var_dump($fetch_rep);
  echo '<br><br>';

}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

var_dump($db);
echo '<br><br>';
*/
$manager = new UserManager();

//----------------------------addUser ------------------
echo '<br><br>';
//var_dump($manager);
echo '<br><br>';

$user = new User();

$user->hydrate($user_tab);
//var_dump($user);

//$user->setName('Thomas');
//echo '<br><br>'.$user->getName().'<br><br>';


$manager->addUser($user);
//--------------------------------------------------------

//--------------------- getUser----------------------

$new_user = new User();
$data_new_user = $manager->getUser('kevin29');

//echo '<br><br>';
//var_dump($data_new_user);
//echo '<br><br>';

$new_user->hydrate($data_new_user);
//echo '<br><br>';
//var_dump($new_user);
//echo '<br><br>'.$new_user->getName().'<br><br>';
//------------------------------------------------------------

//---------------------------updateUser-----------------------
$new_user->setName('Jean');
$manager->updateUser($new_user);

//--------------------------------------------------------------

/*
//---------------------------DeleteUser--------------------------
$manager->deleteUser($user);

//--------------------------------------------------------------
*/
