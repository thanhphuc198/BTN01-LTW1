<?php 
  require_once 'init.php';
  include('class.smtp.php');
  include "class.phpmailer.php"; 
  $currenUserd=null;
  $currenUserd=findUserById($_GET['id']);
?>
<?php include 'header.php'?>
<?php


if ($_GET['code'] == $currenUserd['code'])
{
    echo "Kích hoạt tài khoản thành công ! hãy đăng nhập lại";
    updateStatus($_GET['id']);
    sleep(5);
    header('Location: index.php');
}
else
{
    echo "Có lỗi gì đó !";
}


?>

