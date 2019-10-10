<?php

function loginUser($uname,$pass){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("SELECT r.name FROM user u JOIN role r ON u.role_id = r.id WHERE username=? AND password=?");
    $stmt->bindParam(1,$uname,2);
    $stmt->bindParam(2,$pass,2);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
    return $result;
}

function getAllUser(){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $result = $link->query("SELECT u.id,u.name,u.password,r.name AS role_name FROM user u JOIN role r ON u.role_id=r.id");
    $link=null;
    return $result;
}

function getOneUser($id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("SELECT * FROM user WHERE id=?");
    $stmt->bindParam(1,$id,1);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
    return $result;
}

function addUser($name,$role){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("INSERT INTO user(name,role_id) VALUES(?,?)");
    $stmt->bindParam(1,$name,2);
    $stmt->bindParam(2,$role,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}

function updUser($id,$nwpass){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("UPDATE user SET password=? WHERE id=?");
    $stmt->bindParam(1,$nwpass,2);
    $stmt->bindParam(2,$id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}

function delUser($id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("DELETE FROM user WHERE id=?");
    $stmt->bindParam(1,$id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}