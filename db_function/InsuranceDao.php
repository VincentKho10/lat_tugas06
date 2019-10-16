<?php


class InsuranceDao
{
    public function getAllInsurance(){
        $link = DBHelper::createConnection();
        $result = $link->query("SELECT * FROM insurance");
        $result->setFetchMode(8|1048576,"Insurance");
        $link = null;
        return $result;
    }

    public function addInsurance(Insurance $ins){
        $link = DBHelper::createConnection();
        $query = "INSERT INTO insurance(name_class) VALUES(?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $ins->getNameClass(), 2);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }
        else{
            $link->rollBack();
        }
        $link = null;
    }

    public function getOneInsurance(Insurance $ins){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("SELECT * FROM insurance WHERE id=?");
        $stmt->bindValue(1,$ins->getId(),1);
        $stmt->execute();
        $result = $stmt->fetchObject("Insurance");
        $link = null;
        return $result;
    }

    public function updInsurance(Insurance $ins){
        $link = DBHelper::createConnection();
        $query = "UPDATE insurance SET name_class=? WHERE id=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $ins->getNameClass(), 2);
        $stmt->bindValue(2, $ins->getId(), 1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }
        else{
            $link->rollBack();
        }
        $link = null;
    }

    public function delInsurance(Insurance $ins){
        $link = DBHelper::createConnection();
        $stmt = $link->prepare("DELETE FROM insurance WHERE id=?");
        $stmt->bindValue(1,$ins->getId(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }
}