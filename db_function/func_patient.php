<?php
function getAllPatient(){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "SELECT med_record_number, citizen_id_number, name, address, birth_place, birth_date, phone_number, photo, name_class FROM patient JOIN insurance ON insurance_id = id";
    $result = $link->query($query);
    $link = null;
    return $result;
}

function getOnePatient($mrn){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;", "root", "");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "SELECT * FROM patient WHERE med_record_number=?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$mrn,2);
    $stmt->execute();
    $result = $stmt->fetch();
    $link = null;
    return $result;
}

function addPatient($med_record_number,$citizen_id_number,$name,$address,$birth_place,$birth_date,$phone_number,$photo,$insurance_id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "INSERT INTO patient(med_record_number, citizen_id_number, name, address, birth_place, birth_date, phone_number, photo, insurance_id) VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$med_record_number,2);
    $stmt->bindParam(2,$citizen_id_number,2);
    $stmt->bindParam(3,$name,2);
    $stmt->bindParam(4,$address,2);
    $stmt->bindParam(5,$birth_place,2);
    $stmt->bindParam(6,$birth_date,2);
    $stmt->bindParam(7,$phone_number,2);
    $stmt->bindParam(8,$photo,2);
    $stmt->bindParam(9,$insurance_id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;
}

function delPatient($med_record_number){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "DELETE FROM patient WHERE med_record_number=?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1,$med_record_number,2);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link = null;
}

function updPatient($med_record_number,$citizen_id_number,$name,$address,$birth_place,$birth_date,$phone_number,$photo,$insurance_id){
    $link = new PDO("mysql:host=localhost;dbname=pwl20191;","root","");
    $link->setAttribute(0,false);
    $link->setAttribute(3,2);
    $query = "UPDATE patient SET citizen_id_number=?, name=?, address=?, birth_place=?, birth_date=?, phone_number=?, photo=?, insurance_id=? WHERE med_record_number=?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(9,$med_record_number,2);
    $stmt->bindParam(1,$citizen_id_number,2);
    $stmt->bindParam(2,$name,2);
    $stmt->bindParam(3,$address,2);
    $stmt->bindParam(4,$birth_place,2);
    $stmt->bindParam(5,$birth_date,2);
    $stmt->bindParam(6,$phone_number,2);
    $stmt->bindParam(7,$photo,2);
    $stmt->bindParam(8,$insurance_id,1);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link = null;
}