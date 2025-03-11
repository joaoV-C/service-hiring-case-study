<?php
// Input and information handling

declare(strict_types=1);

                        // Data type declaration. It helps with error prevention
function is_input_empty(string $username, string $password, string $email) {
    // Checks if the input fields are empty, and returns true if
    // at least one of them are.

    if (empty($username) || empty($password) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) {
    // Checks if the email is valid through a built in filter.
    // If it's not a valid email, the funtion will return true.

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {
    // Checks if the email is valid through a built in filter.
    // If it's not a valid email, the funtion will return true.
    
    if (get_username($pdo , $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) {
    // Checks if the email is already registered.
    
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $password, string $username, string $email) {
    set_user($pdo, $password, $username, $email);
}