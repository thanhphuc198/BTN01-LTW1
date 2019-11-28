<?php 
  require_once 'init.php';
?>
<?php include 'header.php'; ?>

<?php if($currentUser):?>
<h1 class="text-primary"><strong>Trang chủ</strong></h1>
<div class="text-body">Chào mừng <strong><?php echo $currentUser ? $currentUser['displayName']: ''?></strong> đã trở
    lại!</div>
<?php else:?>
<h1>Chào mừng bạn đến với môn Lập trình Web 1</h1>
<?php endif;?>
<?php include 'footer.php'; ?>