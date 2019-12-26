<?php 
include 'header.php';

global $db;
  $stmt=$db->prepare("SELECT id, content, imageS, likeS, userId, createdAt FROM posts where userId=?
                      UNION
                      SELECT pt.id, pt.content, pt.imageS, pt.likeS, pt.userId, pt.createdAt FROM posts pt, friends f where pt.userId=f.user2id and f.user1id = ?
                      ORDER BY RAND()");
  $stmt->execute(array($currentUser['id'], $currentUser['id']));
  $stmt->setFetchMode(PDO::FETCH_ASSOC);


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Networt Scocials</title>
    <!-- Bootstrap core CSS -->
<link href="/docs/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
            html{
            overflow: scroll;
        }
          .image-cropper {
          width: 30px;
          height: 30px;
          border-radius: 50%;
      }
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
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <!-- Custom styles for this template -->
  </head>
<script type="text/javascript">
  function toggleFB(){
   document.getElementById("friendBars").classList.toggle('active');
  }
 </script>
<?php if($currentUser):?>
<body style='background: #F5F5F5;'>
<?php include 'friendBars.php';?>
  <ul style='margin: 0px 0px 0px 300px; list-style: none;width: 800px;'>
    <li   >
      <form style="padding-bottom: 20px; padding-left: 20px;" class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <li>
    <li>
      <div class="col-md-8">
      <div class="card" action="profile.php" method="POST" enctype="multipart/form-data" style="padding: 20px; width: 680px">
                  <h5 class="card-header">Cập nhật trạng thái</h5>
                  <div class="card-body">
                    <form  action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea type="input" id="contents" name="contents" class="form-control" placeholder="Bạn đang nghĩ gì?"
                                aria-label="With textarea"></textarea>
                                <input style="padding: 10px;" type="file" class="form-control-file" id="file" name="file"> </div>
                        </div>
                        <button style="width: 200px;" type="submit" name="btn-capnhat" class="btn btn-primary float-right">Cập nhật</button>
                    </form >
                </div>
              </div>
          </div>
    </li>
    <li>
        <?php while ($row = $stmt->fetch()): ?>
            <div class="col-md-8" style='margin-top: 20px;'>
                <div class="card" action="profile.php" method="POST" style="padding: 20px; width: 680px">
                  <div style="margin:10px 5px 5px 20px">
                  <?php $currentUserPost=findUserById($row['userId'])?>
                  <?php echo"<img src='".$currentUserPost['image']."' class='image-cropper'>"; ?>
                  <strong> <?php echo $currentUserPost? $currentUserPost['displayName']:''?> </strong>
                  <i style=' float: right'><?php echo htmlspecialchars($row['createdAt']) ?></i>
                  </div>
                  <div class="card-body">
                           <div class="form-group">
                            <a style="padding: 10px;"><?php echo htmlspecialchars($row['content']) ?></a>
                            <?php if ($row['imageS'] == ""){
                                  echo"<hr>";
                                  }else
                                  {
                                      echo"<img width='400' style='padding: 10px;' height='300' src='".$row['imageS']."' class='card-img-top' alt='...'>";
                                  }
                           ?>
                          </div>
                  </div>
                  <div style="padding-right: 20px; padding-left: 30px;">
                  <form action="index.php" method="POST">
                    <input style="display: none;" type="text" name="ippost" id="ippost" value='<?php echo htmlspecialchars($row['id']) ?>'>
                    <button name="btn-like" style="float: left; width: 150px; height: 30px; color:white; border-radius: 0.5rem; background-color: red">Yêu thích <i  class="glyphicon glyphicon-heart"></i>:<strong><?php echo htmlspecialchars($row['likeS']) ?></strong> </button>
                  </form>
                  </div>
                  <div  style="font-size: 12px; line-height: 1.5; height: auto; overflow: scroll; overflow-x: hidden;"  class="card-body">                    
                            <?php 
                              global $db;
                              $stmt2=$db->prepare("SELECT u.displayName, bl.Binhluan, bl.timeCMT from binhluan bl, users u where u.id = bl.userId and bl.ippost = ?");
                              $stmt2->execute(array($row['id']));
                              $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                            ?>
                          <?php while ($idd = $stmt2->fetch()): ?>
                            <div >
                                  <a><strong><i style="color: green;">(<?php echo htmlspecialchars($idd['timeCMT']) ?>)</i>-<?php echo htmlspecialchars($idd['displayName']) ?>:</strong></a>
                                  <a><?php echo htmlspecialchars($idd['Binhluan']) ?></a>
                            </div>
                          <?php endwhile; ?>
                  </div>
                  <div class="card-body">
                      <form action="index.php" method="POST">
                            <div class="form-group">
                            <hr>
                            <input style="display: none;" type="text" name="ippost" id="ippost" value='<?php echo htmlspecialchars($row['id']) ?>'>
                            <textarea style="margin: 10px;" type="input" id="cmt" name="cmt" class="form-control" placeholder="Nhập cmt?"
                                aria-label="With textarea"></textarea>
                            <button name="btn-cmt" style="float: right; width: 150px; height: 30px; color:white; border-radius: 0.5rem; background-color: rgba(0,192,192,.5)">Bình luận</button>


                          </div>
                      </form>
                  </div>
              </div>
          </div>
         <?php endwhile; ?>
    </li>
  </ul>
</body>
<?php else:?>
  <section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
        <h1  id="wc"class="display-4 py-2 text-truncate text-center text-bold">Welcome to Social network</h1>
        </div>
<?php endif;?>
<?php include 'footer.php'; ?>

<?php
	if (isset($_POST["btn-signup"])) {
    header('Location: login.php');
  } 
?>

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

<?php
if(isset($_POST['btn-cmt']))
{
    $binhluan=$_POST['cmt'];
    $ipost=$_POST['ippost'];
    $userID=$currentUser['id'];
    insertComment($userID,$binhluan, $ipost);
    header("Refresh:0");
}
?>

<?php
if(isset($_POST['btn-like']))
{
    $ipost=$_POST['ippost'];
    increaseLike($ipost);
    header("Location: friendProfile.php");
}
?>




