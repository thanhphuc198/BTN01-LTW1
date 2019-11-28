<?php 
  require_once 'init.php';
?>
<?php include 'header.php'?>
<h1 class="text-primary mt-2">ĐĂNG KÝ</h1>
<?php if(isset($_POST['email']) && isset($_POST['password'])): ?>
<?php 
    $displayName=$_POST['displayName'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $success=false;
    $user=findUserByEmail($username); 
    if(!$user){
        $newUserId=insertUser($displayName,$email,$password);
        $_SESSION['userId']=$newUserId;
        $success=true;
    }
?>
<?php if($success):?>
<?php
header('Location: index.php');
?>
<?php else: ?>
<div class="alert alert-danger mt-2 text-center" role="alert">
    Đăng ký thất bại!
</div>
<?php endif; ?>
<?php else: ?>
<hr>
<form style="width:400px;" action="register.php" method="POST">
    <div class="form-group">
        <label for="displayName">Họ, tên:</label>
        <input type="displayName" class="form-control" id="email" name="displayName" placeholder="Nhập họ, tên">
    </div>
    <div class="form-group"> 
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
    </div>
    <button type="submit" class="btn btn-primary float-right">Đăng ký</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>