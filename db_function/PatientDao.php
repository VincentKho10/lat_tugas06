<?php


class PatientDao
{
    public function getAllPatient(){
        $link = DBHelper::createConnection();
        $query = "SELECT med_record_number, citizen_id_number, name, address, birth_place, birth_date, phone_number, photo, name_class FROM patient JOIN insurance ON insurance_id = id";
        $result = $link->query($query);
        $result->setFetchMode(8|1048576,"Patient");
        $link = null;
        return $result;
    }

    public function getOnePatient(Patient $pat){
        $link = DBHelper::createConnection();
        $query = "SELECT * FROM patient WHERE med_record_number=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$pat->getMedRecordNumber(),2);
        $stmt->execute();
        $result = $stmt->fetchObject("Patient");
        $link = null;
        return $result;
    }

    public function addPatient(Patient $pat){
        $link = DBHelper::createConnection();
        $query = "INSERT INTO patient(med_record_number, citizen_id_number, name, address, birth_place, birth_date, phone_number, photo, insurance_id) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$pat->getMedRecordNumber(),2);
        $stmt->bindValue(2,$pat->getCitizenIdNumber(),2);
        $stmt->bindValue(3,$pat->getName(),2);
        $stmt->bindValue(4,$pat->getAddress(),2);
        $stmt->bindValue(5,$pat->getBirthPlace(),2);
        $stmt->bindValue(6,$pat->getBirthDate(),2);
        $stmt->bindValue(7,$pat->getPhoneNumber(),2);
        $stmt->bindValue(8,$pat->getPhoto(),2);
        $stmt->bindValue(9,$pat->getInsurance(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }
        else{
            $link->rollBack();
        }
        $link = null;
    }

    public function delPatient(Patient $pat){
        $link = DBHelper::createConnection();
        $query = "DELETE FROM patient WHERE med_record_number=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1,$pat->getMedRecordNumber(),2);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link = null;
    }

    public function updPatient(Patient $pat){
        $link = DBHelper::createConnection();
        $query = "UPDATE patient SET citizen_id_number=?, name=?, address=?, birth_place=?, birth_date=?, phone_number=?, photo=?, insurance_id=? WHERE med_record_number=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(9,$pat->getMedRecordNumber(),2);
        $stmt->bindValue(1,$pat->getCitizenIdNumber(),2);
        $stmt->bindValue(2,$pat->getName(),2);
        $stmt->bindValue(3,$pat->getAddress(),2);
        $stmt->bindValue(4,$pat->getBirthPlace(),2);
        $stmt->bindValue(5,$pat->getBirthDate(),2);
        $stmt->bindValue(6,$pat->getPhoneNumber(),2);
        $stmt->bindValue(7,$pat->getPhoto(),2);
        $stmt->bindValue(8,$pat->getInsurance(),1);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }
        else{
            $link->rollBack();
        }
        $link = null;
    }
}