<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();
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
<head>
<style>
        .profileBars {
            left: 5px;
            position: absolute;
            top: 65px;
            height: auto;
            width: 350px;
            background-color: white;
            border-radius: 0.5rem;
            padding: 20px;
            text-align: center;
        }
        .FriendList-Out{
            background-color: #00CC99;
            border-radius: 0.5rem;
            margin: 5px;
        }
        .images{
            border-radius: 0.8rem;
            width: 50px;
            height: 50px;
        }
        .ListS
        {
            font-family: "Verdana";
            list-style: none;
            text-align: left;
            font-size: 15px;
            line-height: 2.5;
        }
        .button {
         background-color: #1c87c9;
         border: none;
         color: white;
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
<body>
<div class="profileBars">
                <?php if ($currentUser['image'] == ""){
                        echo"<img class='images' src='https://1660485trinhphuquy.000webhostapp.com/1.png' class='card-img-top' alt='...'>";
                        }else
                        {
                            echo"<img class='images' width='250' height='200' src='".$currentUser['image']."' class='card-img-top' alt='...'>";
                        }
                ?>
                <div class="card-body text-center">
                    <h3 style="font-family: Verdana;" class="card-title">
                        <strong><?php echo $currentUser? $currentUser['displayName']:''?></strong>
                    </h3>
                    <p class="ListS">
                        <ul class="ListS">
                            <li><strong>Email:</strong>
                                <?php echo $currentUser? $currentUser['email']:''?>
                            </li>
                            <li><strong>Số điện thoại:</strong>
                                <?php echo $currentUser? $currentUser['sdt']:''?>
                            <li><strong>Năm sinh:</strong>
                                <?php echo $currentUser? $currentUser['namsinh']:''?>
                        </ul>
                    </p>
                    <a class="button" href="edit-profile.php" class="btn btn-primary" style="widht:200">Chỉnh sửa thông tin</a>
                    <a class="button" href="change-password.php" class="btn btn-primary mt-2" style="wight:18rem">Đổi mật khẩu</a>
                </div>
</div>