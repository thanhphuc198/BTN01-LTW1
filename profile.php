<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();
}
?>
<DOCTYPE html>
<html>
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
<div style="margin: 0px 0px 50px 0px ">
    <?php include 'header.php'?>
</div>
<body style="margin: 0px 0px 0px 250px">
<h1  class="text-primary mt-2">   </h1>
<div class="container-fluid" style="margin: 0px -30px 0px -34px">
    <div class="row">
        <div class="col-md-8" >
            <div class="card"  style="margin: 5px 0px 0px 0px; width: 680px">
                <h5 class="card-header">Cập nhật trạng thái</h5>
                <div class="card-body">
                <form  action="profile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea type="input" id="contents" name="contents" class="form-control" placeholder="Bạn đang nghĩ gì?"
                                aria-label="With textarea"></textarea>
                                <input type="file" class="form-control-file" id="file" name="file"> </div>
                        </div>
                        <button type="submit" name="btn-capnhat" class="btn btn-primary float-right">Cập nhật</button>
                    </form >
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <?php if ($currentUser['image'] == ""){
                        echo"<img  width='180' height='300' src='https://1660485trinhphuquy.000webhostapp.com/1.png' class='card-img-top' alt='...'>";
                        }else
                        {
                            echo"<img width='180' height='300' src='".$currentUser['image']."' class='card-img-top' alt='...'>";
                        }
                ?>

                <div class="card-body text-center">
                    <h5 class="card-title"><strong><?php echo $currentUser? $currentUser['displayName']:''?></strong>
                    </h5>
                    <p class="card-text">
                        <ul class="list-group list-group-flush text-left">
                            <li class="list-group-item"><strong>Email:</strong>
                                <?php echo $currentUser? $currentUser['email']:''?>
                            </li>
                            <li class="list-group-item"><strong>Số điện thoại:</strong>
                                <?php echo $currentUser? $currentUser['sdt']:''?>
                            <li class="list-group-item"><strong>Năm sinh:</strong>
                                <?php echo $currentUser? $currentUser['namsinh']:''?>
                        </ul>
                    </p>
                    <a href="edit-profile.php" class="btn btn-primary" style="widht:200">Chỉnh sửa thông tin</a>
                    <a href="change-password.php" class="btn btn-primary mt-2" style="wight:18rem">Đổi mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
    </body>
</html>


<?php
if(isset($_POST['btn-capnhat']))
{
    $cont=$_POST['contents'];
    $uID=$currentUser['id'];
    $move = $_FILES['file']['name'];
    if($_FILES['file']['name'])
    {
      move_uploaded_file($_FILES['file']['tmp_name'], $move);
      $success=false;
      insertPostWithImage($cont,$uID,$_FILES['file']['name']);
      header("Refresh:0");
    }
    else
    {
      insertPost($cont,$uID);
      header("Refresh:0");
    }
}
?>
