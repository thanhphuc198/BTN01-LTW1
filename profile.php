<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();
}
?>
<?php include 'header.php'?>
<h1 class="text-primary mt-2">THÔNG TIN CÁ NHÂN</h1>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://1660485trinhphuquy.000webhostapp.com/1.png" class="card-img-top" alt="...">
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
        <div class="col-md-8">
            <div class="card" action="profile.php" method="POST">
                <h5 class="card-header">Cập nhật trạng thái</h5>
                <div class="card-body">
                    <form action="update-profile.php" method="POST">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Bạn đang nghĩ gì?"
                                aria-label="With textarea"></textarea></div>
                        <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>