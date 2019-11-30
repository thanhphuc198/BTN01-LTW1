<?php 
  require_once 'init.php';
?>
<?php include 'header.php'; ?>

<?php if($currentUser):?>
<h1 class="text-primary"><strong>Trang chủ</strong></h1>
<div class="text-body">Chúc mừng <strong><?php echo $currentUser ? $currentUser['displayName']: ''?></strong> đã đăng nhập thành công !</div>
<?php else:?>
<h1>Chào mừng đến với MXH</h1>
<?php endif;?>
<?php include 'footer.php'; ?>