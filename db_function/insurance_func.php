<?php

function getAllInsurance() {
    $link = new PDO('mysql:host=localhost;dbname=prakpw220191', 'root', '');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * FROM insurance;';
    $result = $link->query($query);
    $link = null;
    return $result;
}

function addInsurance($id, $name_class) {
    $link = new PDO('mysql:host=localhost;dbname=prakpw220191', 'root', '');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = 'INSERT INTO insurance(id, name_class) VALUES(?, ?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id, PDO::PARAM_INT);
    $statement->bindParam(2, $name_class, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

?>