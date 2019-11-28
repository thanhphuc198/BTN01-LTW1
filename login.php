<?php 
  require_once 'init.php';
?>
<?php include 'header.php'?>
<h1 class="text-primary mt-2">ĐĂNG NHẬP</h1>
<?php if(isset($_POST['email']) && isset($_POST['password'])): ?>
<?php 

    $email=$_POST['email'];
    $password=$_POST['password'];
    $success=false;

    $user=findUserByEmail($email);
    if($user && password_verify($password,$user['password'])){
        $success=true;
        $_SESSION['userId']= $user['id'];
    }
?>
<?php if($success):?>
<!-- <div class="alert alert-success mt-2 text-center" role="alert">
    Đăng nhập thành công!
</div> -->
<?php
header('Location: index.php');
?>
<?php else: ?>
<div class="alert alert-danger mt-2 text-center" role="alert">
    Đăng nhập thất bại!
</div>
<?php endif; ?>
<?php else: ?>
<hr>
<form style="width:400px;" action="login.php"
    method="POST">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
    </div>
    <button type="submit" class="btn btn-primary float-right">Đăng nhập</button>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>
