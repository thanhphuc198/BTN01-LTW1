<?php
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
    $stmt=$db->prepare("INSERT INTO users(displayName, email, password) VALUES(?,?,?)");
    $stmt->execute(array($displayName,$email,$hashPassword));
    return $db->lastInsertId();
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
    $stmt=$db->prepare("SELECT * FROM posts where userId=?");
    $stmt->query(array($userID));
    return $stmt->setFetchMode(PDO::FETCH_ASSOC);
}


?>
