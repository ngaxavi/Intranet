<?php

session_start();

if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    // errors handlers
    // check if input is empty
    if(empty($username) || empty($password)) {
        header("Location: ../../login.php?login=empty");
        exit();
    }

    $statement = "SELECT * FROM users WHERE username = :username OR email = :username";
    $query = $pdo->prepare($statement);
    $query->execute(array(':username' => $username));
    $nums_rows = $query->rowCount();

    if($nums_rows < 1) {
        header("Location: ../../login.php?login=username");
        exit();
    }

    if($row = $query->fetch(PDO::FETCH_ASSOC)) {
        // verify the password
        $hashedPasswordCheck = password_verify($password, $row['password']);

        if($hashedPasswordCheck == false) {
            header("Location: ../../login.php?login=password");
            exit();

        } else if($hashedPasswordCheck == true) {
            // retrieve the user role
            $role = $pdo->prepare("SELECT r.name FROM user_role ur, roles r WHERE ur.role_id = r.id AND ur.user_id = :user_id");
            $role->execute(array(':user_id' => $row['id']));
            $role_name = $role->fetch(PDO::FETCH_ASSOC);
        

            // log in the user here
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['lastName'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_role'] = $role_name['name'];
            header("Location: ../../index.php");
            exit();
        }
    }

} else {
    header("Location: ../../login.php?login=error");
    exit();
}