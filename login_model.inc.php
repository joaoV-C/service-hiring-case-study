<?php

declare(strict_types=1);

// If this function finds a match between the username inputed and a username in the db,
// it will return an array with all the information of the row that corresponds
// to where the username was grabbed from.

function get_user(object $pdo, string $username) {
    $query = "SELECT * FROM users WHERE username = :username;"; // '*' Is for everything
    
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