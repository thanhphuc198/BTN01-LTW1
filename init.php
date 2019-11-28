<?php
require_once('functions.php');

session_start();
$page=detectPage();
$currentUser=null;
$db = new PDO('mysql:host=localhost;dbname=btn01;charset=utf8', 'root', '');

if(isset($_SESSION['userId'])){
    $currentUser=findUserById($_SESSION['userId']);
}
?>