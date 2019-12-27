<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();

}
?>
<?php 
                                global $db;
                                $stm=$db->prepare("SELECT s.displayName, s.image FROM friends f, users s WHERE f.user2id = s.id AND f.user1id = ?");
                                $stm->execute(array($currentUser['id']));
                                $stm->setFetchMode(PDO::FETCH_ASSOC);
                                ?>
<?php include 'header.php'?>
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

<head>
    <style>
    .image-cropper {
        width: 50px;
        height: 50px;
        border-radius: 0.5rem;
    }
    </style>
    <style>
    .FriendList {
        background-color: white;
        border-radius: 0.5rem;
        padding: 5px;
        overflow: scroll;
        overflow-x: hidden
    }

    .FriendList-Out {
        background-color: #00CC99;
        border-radius: 0.5rem;
        margin: 5px;
    }

    .button {
        background-color: #1c87c9;
        border: none;
        color: white;
        width: 200px;
        padding: 20px 34px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        cursor: pointer;
    }
    </style>
</head>
<!-- <?php include 'profileCard.php'?> -->

<body>
    <!-- <div style='margin: 0px 0px 0px 330px; list-style: none;width: 800px;'> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="width: 15rem;">
                    <?php if ($currentUser['image'] == ""){
                        echo"<img src='https://1660485trinhphuquy.000webhostapp.com/1.png' class='card-img-top' alt='...'>";
                        }else
                        {
                            echo"<img width='100' height='200' src='".$currentUser['image']."' class='card-img-top' alt='...'>";
                        }
                ?>   

                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <strong><?php echo $currentUser? $currentUser['displayName']:''?></strong>
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
                        <a class="button" href="edit-profile.php" class="btn btn-primary" style="widht:200">Chỉnh sửa thông tin</a>
                    <a class="button" href="change-password.php" class="btn btn-primary mt-2" style="wight:18rem">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <li style="margin: 20px;">
                    <div class="card" action="profile.php" method="POST" enctype="multipart/form-data"
                        style="padding: 20px; width: 680px">
                        <h5 class="card-header">Cập nhật trạng thái</h5>
                        <div class="card-body">
                            <form action="index.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <textarea type="input" id="contents" name="contents" class="form-control"
                                        placeholder="Bạn đang nghĩ gì?" aria-label="With textarea"></textarea>
                                    <input style="padding: 10px;" type="file" class="form-control-file" id="file"
                                        name="file"> </div>
                        </div>
                        <button style="width: 200px;" type="submit" name="btn-capnhat"
                            class="btn btn-primary float-right">Cập nhật</button>
                        </form>
                    </div>
            </div>
            <div class="col-md-3">
                <li style="margin: 10px;">
                    <div class="FriendList-Out" style="margin-top: 20px;">
                <li style="padding: 10px; list-style: none; text-align: left; color: Black;"><Strong
                        style="float: top">Danh
                        sách bạn</a></li>
                <div class="FriendList">
                    <?php while ($row = $stm->fetch()): ?>
                    <li style="padding: 5px; list-style: none; ">
                        <?php echo"<img src='".$row['image']."' class='image-cropper' alt='...'>"; ?>
                        <a class="button" href="#" style="font-size: 10px;"> <?php echo $row? $row['displayName']:''?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </div>
                </li>

            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<?php include 'footer.php'; ?>

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