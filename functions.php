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
    $stmt->execute(array($displayName,$email,$hashPassword,0,$code));
    $id= $db->lastInsertId();
    sendEmail($email,$displayName,"Kích hoạt tài khoản","Mã kích hoạt $code");
    return $id;
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
function sendEmail($to,$name,$subject,$content){

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->CharSet='UTF-8';
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'demo.ltweb1@gmail.com';
    //Password to use for SMTP authentication
    $mail->Password = 'laptrinhweb1';
    //Set who the message is to be sent from
    $mail->setFrom('demo.ltweb1@gmail.com', 'Lap trinh Web 1');
    //Set who the message is to be sent to
    $mail->addAddress($to, $name);
    //Set the subject line
    $mail->isHTML(true);
    $mail->Subject = $subject;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML=$content;
    //Replace the plain text body with one created manually
    $mail->AltBody = $content;
    $mail->send();
}
?>