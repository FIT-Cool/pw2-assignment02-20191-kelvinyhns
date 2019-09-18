<?php

function getAllPatient() {
    $link = new PDO('mysql:host=localhost;dbname=prakpw220191', 'root', '');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * FROM patient p JOIN insurance i ON i.id = p.insurance_id;';
    $result = $link->query($query);
    $link = null;
    return $result;
}

function addPatient($medical, $citizen, $name, $address, $birthplace, $birdate, $id) {
    $link = new PDO('mysql:host=localhost;dbname=prakpw220191', 'root', '');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = 'INSERT INTO patient(med_record_number, citizen_id_number, name, address, birth_place, birth_date, insurance_id) VALUES(?, ?, ?, ?, ?, ?, ?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medical, PDO::PARAM_STR);
    $statement->bindParam(2, $citizen, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birthplace, PDO::PARAM_STR);
    $statement->bindParam(6, $birdate, PDO::PARAM_STR);
    $statement->bindParam(7, $id, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

?>