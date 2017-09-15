<?php

include_once 'dbh.inc.php';


if(isset($_POST['submit'])) {

    $id_0 = strtoupper($_POST['id_0']);
    $id_1 = strtoupper($_POST['id_1']);
    $id_2 = strtoupper($_POST['id_2']);
    $company = $_POST['company'];

    // check if the fields are empty
    if(empty($id_0) || empty($id_1) || empty($id_2) || empty($company)) {
        header("Location: ../../network.php?add=empty");
        exit();
    }

    // check if the the mac id exists already
    $base = $id_0 . $id_1 . $id_2;

    $statement = "SELECT * FROM drivers WHERE company_id_base = :base";

    $query = $pdo->prepare($statement);
    $query->execute(array(':base' => $base));

    $nums_rows = $query->rowCount();
    
    if($nums_rows > 0) {
        header("Location: ../../network.php?add=exists");
        exit();
    }

    // insert the new network card to the database
    $hex = $id_0 . "-" . $id_1 . "-" . $id_2;

    $statement = "INSERT INTO drivers(company_id_hex, company_id_base, company_name) 
                  VALUES (:hex, :base, :company)";
    
    $insert = $pdo->prepare($statement);
    $insert->execute([':hex' => $hex, ':base' => $base, ':company' => $company]);

    header("Location: ../../infos.php?add=success");
    exit();



} else {
    header("Location: ../../network.php?add=error");
    exit();
}