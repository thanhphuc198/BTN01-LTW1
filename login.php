<?php 
  require_once 'init.php';
?>
<?php include 'header.php'?>

<?php if(isset($_POST['email']) && isset($_POST['password'])): ?>
<?php 

    $email=$_POST['email'];
    $password=$_POST['password'];
    $success=false;

    $user=findUserByEmail($email);
    if($user && $user['status']==1 && password_verify($password,$user['password'])){
        $success=true;
        $_SESSION['userId']= $user['id'];
    }
?>
<?php if($success):?>
<?php
header('Location: index.php');
?>
<?php else: ?>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="mx-auto form p-4">
                    <h1 id="wc" class="display-4 py-2 text-truncate text-center">Đăng nhập thất bại</h1>
                    <a href="login.php" class="btn btn-primary btn-lg">Thử lại</a>
                </div>
            </div>
        </div>

        <?php endif; ?>
        <?php else: ?>

        <!-- <body class="text-center" style='background-image: url(/docs/css/background2.jpg); background-size: cover; float: top'>
    <h1 class="h3 mb-3 font-weight-normal" style='float: left'>Hệ thống mạng xã hội<br> lớn nhất VN</h1>
    <form class="form-signin" action="login.php" method="POST">
        <img class="mb-4" src="bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Đăng Nhập</h1>
        <label for="inputEmail" class="sr-only">Email:</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_submit">Đăng Nhập</button>
        <label>Chưa có tài khoản ?</label>
        <a href="register.php" target="_blank" class="btn btn-secondary my-2" style="background: violet"
            name="btn_signup">Đăng Ký</a>
        <a href="index.php" target="_blank" class="btn btn-secondary my-2" name="btn_signup">Trang Chủ</a>
        <p class="mt-5 mb-3 text-muted">&copy; KHTN 2016-2019</p>
    </form>

</body> -->

        <section id="cover" class="min-vh-100">
            <div id="cover-caption">
                <div class="container">
                    <div class="row text-white">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                            <h1 class="display-4 py-2 text-truncate">Đăng nhập</h1>
                            <div class="px-3">
                                <form action="login.php" method="POST">
                                    <div class="form-group text-left">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Nhập email">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Nhập mật khẩu">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">Đăng nhập</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>
                    <?php include 'footer.php'; ?>