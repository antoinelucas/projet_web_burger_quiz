<?php
$img_tab0 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab1 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab2 = '<img src="public/img/burger_menu.png" alt="photo_login1">';
$img_tab3 = '<img src="public/img/burger_menu_select.png" alt="photo_login1">';
require_once('templates/headerView.php');


session_start();

unset($_SESSION['auth']);
session_destroy ();

header('Location: index.php?action=display_login');
//http://eelslap.com/
