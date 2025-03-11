<?php

declare(strict_types=1);

function is_input_empty(string $name, string $surname, string $email, string $motivo_contacto) {
    // Checks if the input fields are empty, and returns true if
    // at least one of them are.

    if (empty($name) || empty($surname) || empty($email) || empty($motivo_contacto)) {
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

function is_user_logged() {

    if (!isset($_SESSION["user_id"])) {
        return true;
    } else {
        return false;
    }
}