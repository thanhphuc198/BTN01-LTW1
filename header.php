<?php
    ob_start();
?>
<!doctype html>
<html lang="en">
<?php 
  require_once 'init.php';
?>

<!-- <head>
    <title>LTWeb 1</title>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    </style> -->
    <!-- Custom styles for this template -->
    <!-- <link href="/css/signing.css" rel="stylesheet">
  </head> -->


</head>
<!DOCTYPE html>
<html>
<head>
 <title>Mạng Xã Hội ABC</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/signing.css" rel="stylesheet">
          <style type="text/css">
            *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            }

            #sidebar{
            position: fixed;
            width: 200px;
            height: 100%;
            background: #151719;
            left: -200px;
            transition: all 500ms linear;
            }
            #sidebar.active{
            left:0px;
            }
            #sidebar ul li{
            color: blue;
            list-style: none;
            padding: 15px 10px;
            border-bottom: 1px solid blue;
            }
            #sidebar .toggle-btn{
            position: absolute;
            left: 205px;
            top: 10px;
            }
            #sidebar .toggle-btn span{
            display: block;
            width: 30px;
            height: 5px;
            background: #151719;
            margin: 5px 0px;

            }
          </style>
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
</head>
<body>
 <div id="sidebar">
  <div class="toggle-btn" onclick="toggleSidebar()"><a>
   <span></span>
   <span></span>
   <span></span>
  </a>
  </div>
  <ul>
  <li class="nav-item <?php echo $page=='index' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="index.php">Trang chủ</a>
    </li>
    <li class="nav-item <?php echo $page=='profile' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="profile.php">Trang cá nhân</a>
    </li>
    <li class="nav-item <?php echo $page=='friends' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="friends.php">Bạn bè</a>
                </li>
    <li class="nav-item <?php echo $page=='logout' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="logout.php">Đăng xuất</a>
                </li>
  </ul>
 </div>
</body>
</html>
<!-- <body class="text-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Trang chủ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if(!$currentUser):?>
                <li class="nav-item <?php echo $page=='login' ? 'active':''?>">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
                <li class="nav-item <?php echo $page=='register' ? 'active':''?>">
                    <a class="nav-link" href="register.php">Đăng ký</a>
                </li>
                <?php else:?>
                <li class="nav-item <?php echo $page=='friends' ? 'active':''?>">
                    <a class="nav-link" href="friends.php">Bạn bè</a>
                </li>
                <li class="nav-item <?php echo $page=='profile' ? 'active':''?>">
                    <a class="nav-link" href="profile.php">Trang cá nhân</a>
                </li>
                <li class="nav-item <?php echo $page=='logout' ? 'active':''?>">
                    <a class="nav-link" href="logout.php">Đăng xuất</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </nav>
    <div class="container-fluid"> -->