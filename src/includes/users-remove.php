<?php

include_once 'dbh.inc.php';


if(isset($_GET['user_id'])) {

    // get user id from url parameter
    $user_id = $_GET['user_id'];

    // remove user from database

    $statement = "DELETE FROM users WHERE id = :id";

    $delete = $pdo->prepare($statement);

    $delete->execute(array(':id' => $user_id));

    header("Location: ../../users.php?remove=success");
    exit();

} else {

    header("Location: ../../users.php?remove=error");
    exit();

}