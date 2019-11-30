<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();
}
?>
<?php include 'header.php'?>
<h1 class="text-primary mt-2">CHỈNH SỬA THÔNG TIN</h1>
<?php if(isset($_POST['displayName']) || isset($_POST['email']) || isset($_POST['sdt']) || isset($_POST['namsinh']) || isset($_FILES['file'])): ?>
<?php  

    $displayName=$_POST['displayName']; 
    $email=$_POST['email'];
    $sdt=$_POST['sdt']; 
    $namsinh=$_POST['namsinh'];
    $move = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $move);
    $success=false;

    if($displayName!= ''){
        updateProfile($currentUser['id'],$displayName,$email,$sdt,$namsinh,$_FILES['file']['name']);
        $success=true;
    }
?>
<?php if($success):?>
<?php
header('Location:profile.php');
?>
<div class="alert alert-danger mt-2 text-center" role="alert">
    Cập nhật thông tin thất bại!
</div>
<?php endif; ?>
<?php else: ?>
<hr>
<form style="width:400px;" action="edit-profile.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="displayName">Họ và tên:</label>
        <input type="text" class="form-control" id="displayName" name="displayName"
            value="<?php echo $currentUser? $currentUser['displayName']:''?>">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email"
            value="<?php echo $currentUser? $currentUser['email']:''?>">
        <label for="sdt">Số điện thoại:</label>
        <input type="text" class="form-control" id="sdt" name="sdt"
            value="<?php echo $currentUser? $currentUser['sdt']:''?>">
        <label for="namsinh">Năm sinh:</label>
        <input type="text" class="form-control" id="namsinh" name="namsinh"
            value="<?php echo $currentUser? $currentUser['namsinh']:''?>">

        <label for="image">Ảnh đại diện:</label>
        <input type="file" class="form-control-file" id="file" name="file"> </div>
    <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
    <a href="profile.php" class="btn btn-secondary float-left">Quay lại</a>
</form>
<?php endif; ?>
<?php include 'footer.php'; ?>