<?php 
  require_once 'init.php';
?>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
 <title>Mạng Xã Hội ABC</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/signing.css" rel="stylesheet">
          <style type="text/css">
            *{
                margin: 0;
                padding: 0;
                font-family: Verdana;           
                }
                .image-cropper {
                width: 20px;
                height: 20px;
                border-radius: 50%;
            }       
            #sidebar{
              position: fixed;
            width: 150px;
            height: 100%;
            background: white;
            left: 0px;
            box-shadow: inset -2px 0 0 rgba(0, 0, 0, .1);
            }
            #sidebar.active{
            left:0px;
            }
            #sidebar ul li{
            color: black;
            list-style: none;
            padding: 0px 0px;
            }

          </style>
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
</head>
<body class="text-center">
<h1 style="" class="text-primary mt-2">ĐĂNG KÝ</h1>
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
<form style="margin:0px 400px 0px 400px" class="form-signin" style="width:400px;" action="register.php" method="POST">
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
        <button type="submit" class="btn btn-primary float-right">Đăng ký</button>
    </div>
    
    <div style="margin: 50px"class="form-group">
        <label>Đã có tài khoản ?:</label>
        <a href="login.php" >Đăng nhập</a>
    </div>
</form>
</body>
<?php endif; ?>
<?php include 'footer.php'; ?> 