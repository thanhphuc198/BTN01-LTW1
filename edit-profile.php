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
    if ($email == '' || $sdt == '' || $displayName == '' || $namsinh==''){
      echo "Bạn vui lòng nhập đầy đủ thông tin!";
  }

    if($displayName!= '' && $email!='' && $sdt!='' && $namsinh!=''){
        updateProfile($currentUser['id'],$displayName,$email,$sdt,$namsinh,$_FILES['file']['name']);
        $success=true;
    }
?>
<?php if($success):?>
<?php
header('Location:profile.php');
?>
<?php else: ?>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="mx-auto form p-4">
                    <h1 id="wc" class="display-4 py-2 text-truncate text-center">Cập nhật thông tin thất bại!</h1>
                    <a href="edit-profile.php" class="btn btn-primary btn-lg">Thử lại</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php endif; ?>
<?php else: ?>
<hr>
<div class='container-fluid'>
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
</div>
<?php endif; ?>
<?php include 'footer.php'; ?>