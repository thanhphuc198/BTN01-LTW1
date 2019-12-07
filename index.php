<?php 
  require_once 'init.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Networt Scocials</title>
    <!-- Bootstrap core CSS -->
<link href="/docs/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="/docs/css/signing.css" rel="stylesheet">
  </head>

<?php if($currentUser):?>
<?php include 'header.php'; ?>
<body style= 'margin: 0px 0px 0px 500px'>
    <div  class="text-body">Chúc mừng <strong><?php echo $currentUser ? $currentUser['displayName']: ''?></strong> đã đăng nhập thành công !</div>
</body>
<?php else:?>
  <body style= 'background-image: url(/docs/css/backgroud.jpg); background-size: cover' >
    <form class="form-signin" method="POST">
  <div class="text-center mb-4">
    <img class="mb-4" src="bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">MXH ABC</h1>
  <button name="btn-signup" class="btn btn-lg btn-primary btn-block" style="background: gray;" type="submit">Đăng Nhập</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; KHTN 2016-2019</p>
</form>
</body>
<?php endif;?>
<?php include 'footer.php'; ?>

<?php
	if (isset($_POST["btn-signup"])) {
    header('Location: login.php');
  } 
?>

