<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('functions.php');
require_once('vendor/autoload.php');

session_start();
$page=detectPage();
$currentUser=null;
$currentPost=null;
$currenUserTemp=null;
$db = new PDO('mysql:host=localhost;dbname=btn01;charset=utf8', 'root', '');

if(isset($_SESSION['userId'])){
    $currentUser=findUserById($_SESSION['userId']);
}
?>