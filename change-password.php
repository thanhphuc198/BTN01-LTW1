<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();
}
?>
<?php include 'header.php'?>
<h1 class="text-primary mt-2">ĐỔI MẬT KHẨU</h1>
<?php if(isset($_POST['currentPassword']) && isset($_POST['password'])): ?>
<?php  
    $currentPassword=$_POST['currentPassword'];
    $password=$_POST['password'];


    $success=false;

    if(password_verify($currentPassword,$currentUser['password'])){
        updateUserPassword($currentUser['id'],$password);
        $success=true;
    }
?>
<?php if($success):?>
<div class="alert alert-success mt-2 text-center" role="alert">
    Đổi mật khẩu thành công!
</div>
?>
<?php else: ?>
<div class="alert alert-danger mt-2 text-center" role="alert">
    Đổi mật khẩu thất bại!
</div>
<?php endif; ?>
<?php else: ?>
<hr>
<form style="width:400px;" action="change-password.php" method="POST">
    <div class="form-group">
        <label for="currentPassword">Mật khẩu cũ:</label>
        <input type="password" class="form-control" id="currentPassword" name="currentPassword"
            placeholder="Nhập mật khẩu cũ">
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu mới:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới">
    </div>
    <button type="submit" class="btn btn-primary float-right">Xác nhận</button>
    <a href="profile.php" class="btn btn-secondary float-left">Quay lại</a>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>