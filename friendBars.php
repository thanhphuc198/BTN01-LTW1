<?php
    ob_start();
<<<<<<< HEAD
?>
=======
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('functions.php');
    $currenUserTemp=null;
?>

>>>>>>> b7b270d3d0f38b64dc8a58ea2ce88453c1abfe6f
<!doctype html>
<html lang="en">
<?php 
  require_once 'init.php';
  global $db;
<<<<<<< HEAD
  $stm=$db->prepare("SELECT s.displayName, s.image FROM friends f, users s WHERE f.user2id = s.id AND f.user1id = ?");
=======
  $stm=$db->prepare("SELECT s.id, s.displayName, s.image FROM friends f, users s WHERE f.user2id = s.id AND f.user1id = ?");
>>>>>>> b7b270d3d0f38b64dc8a58ea2ce88453c1abfe6f
  $stm->execute(array($currentUser['id']));
  $stm->setFetchMode(PDO::FETCH_ASSOC);
?>
<head>
    <style>
        .FriendBars {
            left: 5px;
            position: absolute;
            top: 65px;
            height: auto;
            width: 200px;
            background-color: #DCDCDC;
            border-radius: 0.5rem;
        }
        .FriendList{
            background-color: white;
            border-radius: 0.5rem;
            padding: 5px;
            overflow: scroll;
            overflow-x: hidden
        }
        .FriendList-Out{
            background-color: #00CC99;
            border-radius: 0.5rem;
            margin: 5px;
        } 
<<<<<<< HEAD
=======
        .inline {
            display: inline;
        }
        .link-button {
            background: none;
            border: none;
            color: grey;
            cursor: pointer;
            font-size: 1em;
            font-family: serif;
        }
        .link-button:focus {
            outline: none;
        }
        .link-button:active {
            color:red;
        }
>>>>>>> b7b270d3d0f38b64dc8a58ea2ce88453c1abfe6f
    </style>
</head>
<body>
    <div class="FriendBars"> 
        <div class="FriendList-Out">
            <li style="padding: 10px; list-style: none; text-align: center; color: white;"><Strong style="float: top" >Thông Báo</a></li>
            <div class="FriendList">
            </div>
        </div>
        <div class="FriendList-Out" style="margin-top: 20px;">
            <li style="padding: 10px; list-style: none; text-align: center; color: white;"><Strong style="float: top" >Danh sách bạn</a></li>
            <div class="FriendList">
                <?php while ($row = $stm->fetch()): ?>
<<<<<<< HEAD
                <li style="padding: 5px; list-style: none; ">
                        <?php echo"<img src='".$row['image']."' class='image-cropper' alt='...'>"; ?>
                        <a href="#" style="font-size: 10px;"> <?php echo $row? $row['displayName']:''?> </a>     
                </li>
=======
                <form method="POST">
                    <li style="padding: 5px; list-style: none; ">
                            <?php echo"<img src='".$row['image']."' class='image-cropper' alt='...'>"; ?>
                            <a href="friendProfile.php?id=<?php echo htmlspecialchars($row['id']) ?>">
                            <?php echo $row? $row['displayName']:''?>
                            </a>
                            <input style="display: none;" type="text" name="idU" id="idU" value='<?php echo htmlspecialchars($row['id']) ?>'>
                    </li>
                </form>
>>>>>>> b7b270d3d0f38b64dc8a58ea2ce88453c1abfe6f
                <?php endwhile; ?>
            </div>
        </div>
        
    </div>
<<<<<<< HEAD
</body>
=======
</body>

<?php
if(isset($_POST['btn-link']))
{
    $idU=$_POST['idU'];
    header("Location: friendProfile.php");
}
?>
>>>>>>> b7b270d3d0f38b64dc8a58ea2ce88453c1abfe6f
