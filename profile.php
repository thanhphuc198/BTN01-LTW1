<?php 
  require_once 'init.php';
  if(!$currentUser){
    header('location: index.php');
    exit();

}
?>
<div >
<?php 
global $db;
$stm=$db->prepare("SELECT s.displayName, s.image FROM friends f, users s WHERE f.user2id = s.id AND f.user1id = ?");
$stm->execute(array($currentUser['id']));
$stm->setFetchMode(PDO::FETCH_ASSOC);

?>
</div>
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
        .FriendList{
            background-color: white;
            border-radius: 0.5rem;
            padding: 5px;
            overflow: scroll;
            overflow-x: hidden;
            margin :auto;
        }
        .FriendList-Out{
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
<?php include 'profileCard.php'?>
<body>

<div style='margin: 0px auto; list-style: none;width: 800px;'>
    <div class="row">
        <div class="col-md-8" >
            <li style="margin: 20px;">
            
            </li>
            <li style="margin: 20px;">
                <div class="FriendList-Out" style="margin-top: 10px;">
                    <li style="padding: 10px; list-style: none; text-align: left; color: Black; margin : 0px auto;"><Strong style="float: top" >Danh sách bạn</a></li>
                    <div class="FriendList">
                    <?php while ($row = $stm->fetch()): ?>
                    <li style="padding: 5px; list-style: none; ">
                        <?php echo"<img src='".$row['image']."' class='image-cropper' alt='...'>"; ?>
                        <a class="button" href="#" style="font-size: 10px;"> <?php echo $row? $row['displayName']:''?> </a>     
                    </li>
                    <?php endwhile; ?>
                </div>
            </li>
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