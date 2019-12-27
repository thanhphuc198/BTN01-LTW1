<?php
require_once('vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function findUserByEmail($email){
    global $db;
    $stmt=$db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function detectPage(){
    $uri=$_SERVER['REQUEST_URI'];
    $parts=explode('/',$uri);
    $len=count($parts);
    $fileName=$parts[$len-1];
    $parts=explode('.',$fileName);
    $page =$parts[0];
    return $page;
}

function findUserById($id){
    global $db;
    $stmt=$db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertUser($displayName,$email,$password){
    global $db;
    $hashPassword =password_hash($password,PASSWORD_DEFAULT);
    $code=generateRandomString(10);
    $stmt=$db->prepare("INSERT INTO users(displayName, email, password,status,code) VALUES(?,?,?,?,?)");
    return $stmt->execute(array($displayName,$email,$hashPassword,0,$code));
}

function updateUserPassword($id, $password){
    global $db;
    $hashPassword =password_hash($password,PASSWORD_DEFAULT);
    $stmt=$db->prepare("UPDATE users SET password =? WHERE id=?");
    return $stmt->execute(array($hashPassword,$id));
}

function updateProfile($id, $displayName,$email,$sdt,$namsinh,$image){
    global $db;
    $stmt=$db->prepare("UPDATE users SET displayName =?, email=?, sdt=?, namsinh=?, image=? WHERE id=?");
    return $stmt->execute(array($displayName,$email,$sdt,$namsinh,$image,$id));
}


function insertPost($content, $userID){
    global $db;
    $stmt=$db->prepare("INSERT INTO posts(content, userId) VALUES(?,?)");
    return $stmt->execute(array($content, $userID));
}

function insertPostWithImage($content, $userID, $image){
    global $db;
    $stmt=$db->prepare("INSERT INTO posts(content, userId, imageS) VALUES(?,?,?)");
    return $stmt->execute(array($content, $userID, $image));
}

function findPost($userID){
    global $db;
    $stmt=$db->prepare("SELECT * FROM posts where userId=? ORDER BY RAND()");
    $stmt->query(array($userID));
    return $stmt->setFetchMode(PDO::FETCH_ASSOC);
}

function findComment($ipost){
    global $db;
    $stmt=$db->prepare("SELECT u.displayName, bl.Binhluan from binhluan bl, users u where u.id = bl.userId and bl.ippost = ?");
    $stmt->query(array($ipost));
    return $stmt->setFetchMode(PDO::FETCH_ASSOC);
}
function insertComment($userID,$binhluan, $ipost){
    global $db;
    $stmt=$db->prepare("INSERT INTO binhluan(userId, Binhluan, ippost) VALUES(?,?,?)");
    return $stmt->execute(array($userID, $binhluan, $ipost));
}

function increaseLike($ipost){
    global $db;
    $stmt=$db->prepare("UPDATE posts SET likeS=likeS +1 where id = ?");
    return $stmt->execute(array($ipost));
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
    $nFrom = 'Freetuts.net';
    $mFrom = 'phongcao3091998@gmail.com';  //dia chi email cua ban 
    $mPass = 'Binpro123';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('phongcao3091998@gmail.com', 'DOANLWEB1.net');
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}


function updateStatus($id){
    global $db;
    $stmt=$db->prepare("UPDATE users SET status=1 WHERE id=?");
    return $stmt->execute(array($id));
}

?>
