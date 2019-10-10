<?php

function getAllRole(){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $result = $link->query("SELECT * FROM role");
    $link = null;
    return $result;
}

function getOneRole($id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("SELECT * FROM role WHERE id=?");
    $stmt->bindParam(1,$id,1);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
    return $result;
}

function addRole($nme){
    var_dump($nme);
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("INSERT INTO role(name) VALUES(?)");
    $stmt->bindParam(1,$nme,2);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}

function delRole($id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("DELETE FROM role WHERE id=?");
    $stmt->bindParam(1,$id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}

function updRole($id,$nme){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("UPDATE role SET name=? WHERE id=?");
    $stmt->bindParam(1,$nme,2);
    $stmt->bindParam(2,$id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}
