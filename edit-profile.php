<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();
}
?>
<!doctype html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <!-- Bootstrap CSS -->
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
<body class="text-center">
    <form style="margin: 0px 0px 0px 300px" class="form-signin" action="edit-profile.php" method="POST" enctype="multipart/form-data">
            <h1 class="h3 mb-3 font-weight-normal">Cập nhật profile</h1>
            <div class="form-label-group">
            <label for="displayName" class="sr-only">Họ  tên:</label>
                <input type="text" class="form-control" id="displayName" name="displayName"
            value="<?php echo $currentUser? $currentUser['displayName']:''?>">
            </div>
            <hr>
            <div class="form-label-group">
            <label for="email" class="sr-only">Email:</label>
                <input type="email" class="form-control" id="email" name="email"
            value="<?php echo $currentUser? $currentUser['email']:''?>">
            </div>
            <hr>
            <div class="form-label-group">
            <label for="sdt" class="sr-only">Số điện thoại:</label>
                <input type="text" class="form-control" id="sdt" name="sdt"
            value="<?php echo $currentUser? $currentUser['sdt']:''?>">
            </div>
            <hr>
            <div class="form-label-group">
            <label for="namsinh" class="sr-only">Năm sinh:</label>
                <input type="text" class="form-control" id="namsinh" name="namsinh"
            value="<?php echo $currentUser? $currentUser['namsinh']:''?>">
            </div>  
            <hr>
            <label for="image">Ảnh đại diện:</label>
                <input type="file" class="form-control-file" id="file" name="file"> </div>
            <hr>
            
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_submit">Cập Nhật</button>
            <a href="profile.php" target="_blank" class="btn btn-secondary my-2" name="btn_signup">Quay lại</a>
    </form>
</body>
<?php endif; ?>
<?php include 'footer.php'; ?>

