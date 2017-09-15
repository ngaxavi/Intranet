<?php

if (isset($_POST['submit'])) {
    include_once 'dbh.inc.php';
    
    
    // retrieve the value of all fields
    $username        = $_POST['username'];
    $firstName       = $_POST['firstName'];
    $lastName        = $_POST['lastName'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    // Error handlers
    // check for empty fields
    if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        header("Location: ../../register.php?register=empty");
        exit();
    }


    // check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../register.php?register=email");
        exit();
    }
    // check if the username is already taken
    /* Password Matching Validation */
    if ($password != $confirmPassword) {
        header("Location: ../../register.php?register=password");
        exit();
    }

    $sql       = "SELECT * FROM users WHERE username=:username";
    $result    = $pdo->prepare($sql);
    $result->execute(array(':username' => $username));
    $nums_rows = $result->rowCount();
    
    if ($nums_rows > 0) {
        header("Location: ../../register.php?register=usernametaken");
        exit();
    }

    // check the email is already taken
    $sql       = "SELECT * FROM users WHERE email=:email";
    $result    = $pdo->prepare($sql);
    $result->execute(array(':email' => $email));
    $nums_rows = $result->rowCount();
    
    if ($nums_rows > 0) {
        header("Location: ../../register.php?register=emailtaken");
        exit();
    }

    // hashing the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // insert the user into the database
    $statement = "INSERT INTO users(username, first_name, last_name, email, password)
                                            VALUES(:username, :firstName, :lastName, :email, :password)";
    
    $query = $pdo->prepare($statement);
    $query->execute(array(
        ':username' => $username,
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':email' => $email,
        ':password' => $hashedPassword
    ));


    // add role USER to each new registred user
    $user_statement = "SELECT id FROM users WHERE username = :username";

    $user_id = $pdo->prepare($user_statement);
    $user_id->execute(array(':username' => $username));
    $user_row = $user_id->fetch(PDO::FETCH_ASSOC);

    // get role id that corresponding to USER
    $role_id = $pdo->prepare("SELECT id FROM roles WHERE name = 'USER'");
    $role_id->execute();
    $role_row = $role_id->fetch(PDO::FETCH_ASSOC);

    // add this role to the new user
    $statement = "INSERT INTO user_role(user_id, role_id) VALUES (:user_id, :role_id)";
    $user_role = $pdo->prepare($statement);
    $user_role->execute(array(':user_id' => $user_row['id'], ':role_id' => $role_row['id']));
    
    header("Location: ../../register.php?register=success");
    exit();
} else {
    header("Location: ../../register.php");
    exit();
}
