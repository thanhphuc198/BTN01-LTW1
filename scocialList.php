<?php
    ob_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once('functions.php');
    $currenUserTemp=null;
?>

<!doctype html>
<html lang="en">
<?php 
  require_once 'init.php';
  global $db;
  $stm=$db->prepare("SELECT s.id, s.displayName, s.image FROM friends f, users s WHERE f.user2id = s.id AND f.user1id = ?");
  $stm->execute(array($currentUser['id']));
  $stm->setFetchMode(PDO::FETCH_ASSOC);
?>
<head>
    <style>
            .container {
                width: 353px;
                border-radius: 0.5rem;
                overflow: auto;
                display: flex;
                flex-wrap: wrap;
                }
            #post {
                    text-align: center;
                    width: 220px;
                    height: 150px;
                    background: #e8e8e8;
                    float: right;
                }   
            #sidebar {
                    text-align: center;
                    width: 130px;
                    height: 150px;
                    background: #b1b1b1;
                    float: left;
                }
            #image{
                margin-top: 20px;
                height: 100px;
                width: 100px;
                border-radius: 50%;
            }
            .button{
                border-radius: 0.5rem;
                background-color: red;
                color: white;
                margin: 5px;
                height: 35px;
                width: 50px;
                border: none;
                background: #b1b1b1;
            }
    </style>
</head>
<body>
        <button class="button" style="width: auto;">->Trở về</button>
        <div style="margin: 50px;">
            <div  class="container">
                <div id="post">
                    <h2>Name</h2>
                    <a>Age</a>
                    <div>
                        <button class="button">a</button>
                    </div>
                </div>
                <div id="sidebar">
                    <image id="image" src="1.jpg">  
                </div>
            </div>
        </div>
</body>

<?php
if(isset($_POST['btn-link']))
{
    $idU=$_POST['idU'];
    header("Location: friendProfile.php");
}
?>