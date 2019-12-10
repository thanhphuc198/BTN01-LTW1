<?php 
  require_once 'init.php';
  global $db;
  $stmt=$db->prepare("SELECT * FROM posts where userId=?");
  $stmt->execute(array($currentUser['id']));
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
    <!-- Custom styles for this template -->
  </head>
<script type="text/javascript">
  function toggleFB(){
   document.getElementById("friendBars").classList.toggle('active');
  }
 </script>
<?php if($currentUser):?>
<?php include 'header.php'; ?>
<body style='background: url(Wallground.jpg);'>
  <ul style='margin: 0px 0px 0px 300px; list-style: none;box-shadow: inset -2px 0 0 rgba(0, 0, 0, .1); background-color: rgba(192,192,192,.4);width: 800px;'>
    <li   >
      <form style="margin: 50px 0px 0px 250px;" class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <li>
    <li>
      <div class="col-md-8">
      <div class="card" action="profile.php" method="POST" enctype="multipart/form-data" style="margin: 25px 0px 0px 45px; width: 680px">
                  <h5 class="card-header">Cập nhật trạng thái</h5>
                  <div class="card-body">
                    <form  action="index.php" method="POST" enctype="multipart/form-data">
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
    </li>
    <li>
        <?php while ($row = $stmt->fetch()): ?>
            <div class="col-md-8">
                <div class="card" action="profile.php" method="POST" style="margin: 25px 0px 0px 45px; width: 680px">
                  <div style="margin:10px 5px 5px 20px">
                  <?php echo"<img src='".$currentUser['image']."' class='image-cropper' alt='...'>"; ?>
                  <strong> <?php echo $currentUser? $currentUser['displayName']:''?> </strong>
                  <i style=' float: right'><?php echo htmlspecialchars($row['createdAt']) ?></i>
                  </div>
                  <div class="card-body">
                           <div class="form-group">
                            <i><?php echo htmlspecialchars($row['content']) ?></i>
                            <?php if ($row['imageS'] == ""){
                                  echo"<hr></hr>";
                                  }else
                                  {
                                      echo"<img width='400' height='auto' src='".$currentUser['image']."' class='card-img-top' alt='...'>";
                                  }
                           ?>
                          </div>
                  </div>
                  <div class="card-body">
                      <form action="update-profile.php" method="POST">
                            <div class="form-group">
                            <hr>
                            <textarea style="margin: 10px;" type="input" id="cmt" name="cmt" class="form-control" placeholder="Nhập cmt?"
                                aria-label="With textarea"></textarea>
                                <button style="float: right; width: 150px; height: 30px; color:white; border-radius: 20%; background-color: rgba(0,192,192,.5)">Comment</button>


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
  <body style= 'background-image: url(/docs/css/backgroud.jpg); background-size: cover' >
    <form class="form-signin" method="POST">
  <div class="text-center mb-4">
    <img class="mb-4" src="bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">MXH ABC</h1>
  <button name="btn-signup" class="btn btn-lg btn-primary btn-block" style="background: gray;" type="submit">Đăng Nhập</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; KHTN 2016-2019</p>
</form>
</body>
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



