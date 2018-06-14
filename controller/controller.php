<?php

// Chargement des classes
//require_once('model/');

function display_login(){
  require_once('view/loginView.php');
}

function display_new_game(){
  require_once('view/new_gameView.php');
}

function display_game(){
  require_once('view/gameView.php');
}

function display_end_game(){
  require_once('view/end_gameView.php');
}

function display_account(){
  require_once('view/accountView.php');
}

function display_ranking(){
  require_once('view/rankingView.php');
}

function display_logout(){
  require_once('view/logoutView.php');
}

/*function affiche_header()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
*/
