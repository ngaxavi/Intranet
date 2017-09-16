<?php

include_once 'dbh.inc.php';

if (isset($_POST['update'])) {

    $role_name = $_POST['role'];
    $user_id = $_POST['user_id'];

    // find the role id corresponding to the role name
    $statement = "SELECT id FROM roles WHERE name = :name";

    $query = $pdo->prepare($statement);
    $query->execute(array(':name' => $role_name));

    $role_id = $query->fetch(PDO::FETCH_ASSOC)['id'];

    // update the user role
    $statement = "UPDATE user_role SET role_id = :role_id WHERE user_id = :user_id";
    $update = $pdo->prepare($statement);
    $update->execute(array(':role_id' => $role_id, ':user_id' => $user_id));


    header("Location: ../../users.php?update_rechte=success");
    exit();

} else {


    header("Location: ../../users.php?update_rechte=error");
    exit();
}
