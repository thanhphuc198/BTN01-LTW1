<?php 
  require_once 'init.php';
  $currenUserTemp=null;
  $currenUserTemp=findUserById($_GET['id']);
  if(!$currentUser){
    header('location: index.php');
    exit();
}
?>
<head>
<style>
        .profileBars {
            left: 30%;
            position: absolute;
            top: 65px;
            height: auto;
            width: 40%;
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
<?php include 'header.php'?>
<body>
<div class="profileBars">
                <?php if ($currenUserTemp['image'] == ""){
                        echo"<img class='images' width='250' height='200' src='https://1660485trinhphuquy.000webhostapp.com/1.png' class='card-img-top' alt='...'>";
                        }else
                        {
                            echo"<img class='images' width='250' height='200' src='".$currenUserTemp['image']."' class='card-img-top' alt='...'>";
                        }
                ?>
                <div class="card-body text-center">
                    <h3 style="font-family: Verdana;" class="card-title">
                        <strong><?php echo $currenUserTemp? $currenUserTemp['displayName']:''?></strong>
                    </h3>
                    <p class="ListS">
                        <ul class="ListS">
                            <li><strong>Email:</strong>
                                <?php echo $currenUserTemp? $currenUserTemp['email']:''?>
                            </li>
                            <li><strong>Số điện thoại:</strong>
                                <?php echo $currenUserTemp? $currenUserTemp['sdt']:''?>
                            <li><strong>Năm sinh:</strong>
                                <?php echo $currenUserTemp? $currenUserTemp['namsinh']:''?>
                        </ul>
                    </p>
                    <a class="button" href="edit-profile.php" class="btn btn-primary" style="widht:200">Hủy kết bạn</a>
                </div>
</div>