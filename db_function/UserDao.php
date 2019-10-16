<?php


class UserDao
{
    public function loginUser(User $usr){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("SELECT u.id, u.username, u.password, u.name, r.id AS 'rid', r.name AS 'rname'  FROM user u JOIN role r ON u.role_id = r.id WHERE username=? AND password=?");
        $stmt->bindValue(1,$usr->getUsername(),2);
        $stmt->bindValue(2,$usr->getPassword(),2);
        $stmt->execute();
        $result = $stmt->fetchAll(8|1048576,"User");
        $link = null;
        return $result;
    }

    public function getAllUser(){
        $link = DBHelper::createConnection();
        $result = $link->query("SELECT u.id,u.name,u.password,r.name AS role_name FROM user u JOIN role r ON u.role_id=r.id");
        $result->setFetchMode(8|1048576,"User");
        $link=null;
        return $result;
    }

    public function getOneUser(User $usr){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("SELECT * FROM user WHERE id=?");
        $stmt->bindValue(1,$usr->getId(),1);
        $stmt->execute();
        $result = $stmt->fetchObject("User");
        $link = null;
        return $result;
    }

    public function addUser(User $usr){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("INSERT INTO user(name,role_id) VALUES(?,?)");
        $stmt->bindValue(1,$usr->getName(),2);
        $stmt->bindValue(2,$usr->getRole(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }

    public function updUser(User $usr){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("UPDATE user SET password=? WHERE id=?");
        $stmt->bindValue(1,$usr->getPassword(),2);
        $stmt->bindValue(2,$usr->getId(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }

    public function delUser(User $usr){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("DELETE FROM user WHERE id=?");
        $stmt->bindValue(1,$usr->getId(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }
}