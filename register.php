<?php 
  require_once 'init.php';
  include('class.smtp.php');
  include "class.phpmailer.php"; 
?>
<?php include 'header.php'?>
<?php if(isset($_POST['displayName']) && isset($_POST['email']) && isset($_POST['password'])): ?>
<?php 
    $displayName=$_POST['displayName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $success=false; 
    $user = findUserByEmail($email);
    if ($email == '' || $password == '' || $displayName == ''){
        echo "Bạn vui lòng nhập đầy đủ thông tin!";
    }
    if($user['email'] == $_POST['email']){
        echo "Email đã đăng ký!";
    }
    if(!$user && $email != '' && $password != '' && $displayName != ''){
        $newUserId=insertUser($displayName,$email,$password);
        $user1 = findUserByEmail($email);
        $var1=$user1['id'];
        $var2=$user1['code'];
        $content = "Nhấn vào link để kích hoạt tài khoản: http://localhost/BTN01-LTW1/activeMail.php?id=$var1&code=$var2";
        $title = 'Kích hoạt tài khoảnr';
        $nTo = $displayName;
        $mTo = $email;
        $diachicc = $email;
        //test gui mail
        $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
        $success=true;
    }
?>
<?php if($success):?>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="mx-auto form p-4">
                    <h1 id="wc" class="display-4 py-2 text-truncate text-center">Kiểm tra email để kích hoạt tài khoản</h1>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php else: ?>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="mx-auto form p-4">
                    <h1 id="wc" class="display-4 py-2 text-truncate text-center">Đăng ký thất bại</h1>
                    <a href="register.php" class="btn btn-primary btn-lg">Thử lại</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php endif; ?>
<?php else: ?>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4">
                    <h1 class="display-4 py-2 text-truncate text-center">Đăng ký</h1>
                    <div class="px-4">
                        <form action="register.php" method="POST">
                            <div class="form-group text-left">
                                <label for="displayName">Họ, tên:</label>
                                <input type="displayName" class="form-control" id="email" name="displayName"
                                    placeholder="Nhập họ, tên">
                            </div>
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
                            <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php endif; ?>
<?php include 'footer.php'; ?>