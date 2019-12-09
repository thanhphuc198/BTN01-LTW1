<?php
    ob_start();
?>
<!doctype html>
<html lang="en">
<?php 
  require_once 'init.php';
?>

<!-- <head>
    <title>LTWeb 1</title>
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
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
    </style> -->
    <!-- Custom styles for this template -->
    <!-- <link href="/css/signing.css" rel="stylesheet">
  </head> -->


</head>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
 <title>Mạng Xã Hội ABC</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/signing.css" rel="stylesheet">
          <style type="text/css">
            *{
            margin: 0;
            padding: 0;
            font-family: Verdana;
            
            }

            #sidebar{
            position: fixed;
            width: 150px;
            height: 100%;
            background: #F2EFFB;
            left: 0px;
            transition: all 500ms linear;
            box-shadow: inset -2px 0 0 rgba(0, 0, 0, .1);
            }
            #sidebar.active{
            left:0px;
            }
            #sidebar ul li{
            color: black;
            list-style: none;
            padding: 0px 0px;
            }
            #sidebar .toggle-btn{
            position: absolute;
            left: 205px;
            top: 10px;
            }
            #sidebar .toggle-btn span{
            display: block;
            width: 30px;
            height: 5px;
            background: white;
            margin: 5px 0px;
            }
          </style>
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
</head>
<body>
 <div id="sidebar">
  <a>
   <span></span>
   <span></span>
   <span></span>
  </a>
  <ul>
  <li class="nav-item">
                    <a class="nav-link"><strong>ABC</strong></a>
    </li>
  <li class="nav-item <?php echo $page=='index' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="index.php"><mark>H</mark>ome</a>
    </li>
    <li class="nav-item <?php echo $page=='profile' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="profile.php"><mark>P</mark>rofile</a>
    </li>
    <li class="nav-item <?php echo $page=='friends' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="friends.php"><mark>F</mark>riends</a>
                </li>
    <li class="nav-item <?php echo $page=='logout' ? 'active':''?>">
                    <a class="nav-link" style="float: top" href="logout.php"><mark>L</mark>ogout</a>
                </li>
  </ul>
 </div>
</body>
</html>
