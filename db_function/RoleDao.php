<?php


class RoleDao
{
    public function getAllRole(){
        $link = DBHelper::createConnection();
        $result = $link->query("SELECT * FROM role");
        $result->setFetchMode(8|1048576,"Role");
        $link = null;
        return $result;
    }

    public function getOneRole(Role $rle){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("SELECT * FROM role WHERE id=?");
        $stmt->bindParam(1,$rle->getId(),1);
        $stmt->execute();
        $result = $stmt->fetchObject("Role");
        $link = null;
        return $result;
    }

    public function addRole(Role $rle){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("INSERT INTO role(name) VALUES(?)");
        $stmt->bindParam(1,$rle->getName(),2);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }

    public function delRole(Role $rle){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("DELETE FROM role WHERE id=?");
        $stmt->bindParam(1,$rle->getId(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }

    public function updRole(Role $rle){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("UPDATE role SET name=? WHERE id=?");
        $stmt->bindParam(1,$rle->getName(),2);
        $stmt->bindParam(2,$rle->getId(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }

}