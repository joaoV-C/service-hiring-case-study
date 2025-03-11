<?php

// Functions here will take care of querying the database
// or submitting, updating, delete data. Always things 
// related to the db.

declare(strict_types=1);

function get_username(object $pdo ,string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    
    // stmt = statement
    // $pdo is pointing to the prepare method, that separates the
    // data from the query itself. It prevents SQL injection
    $stmt = $pdo->prepare($query);

    // Bind the data to the query. Set the ":username" placeholder to be 
    // substituted by $username
    $stmt->bindParam(":username", $username);

    // Actually query the database 
    $stmt->execute();

    // Check if the username queried resulted in a real data
    // Fetch method grabs a piece of data from the db. FETCH_ASSOC fetches the
    // data as an associative array, which means that it can be referred to by
    // the name, instead of the index. 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo ,string $email) {
    $query = "SELECT username FROM users WHERE username = :email;";
    
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $password, string $username,string $email) {
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
    $stmt = $pdo->prepare($query);

    $options = ['cost' => 12];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPassword);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}