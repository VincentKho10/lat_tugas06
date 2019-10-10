<?php
function getAllInsurance(){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $result = $link->query("SELECT * FROM insurance");
    $link = null;
    return $result;
}

function addInsurance($name_class){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "INSERT INTO insurance(name_class) VALUES(?)";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $name_class, 2);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;
}

function getOneInsurance($id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("SELECT * FROM insurance WHERE id=?");
    $stmt->bindParam(1,$id,1);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
    return $result;
}

function updInsurance($id,$name_class){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "UPDATE insurance SET name_class=? WHERE id=?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $name_class, 2);
    $stmt->bindParam(2, $id, 1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;
}

function delInsurance($id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $stmt = $link->prepare("DELETE FROM insurance WHERE id=?");
    $stmt->bindParam(1,$id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}