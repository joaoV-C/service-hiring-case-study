<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") { // check if the user got here through a POST request,
                                             // if not, send them back to the index.
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        // If the functions return true, it means that there is an error.
        $errors = [];

        if (is_input_empty($username, $password, $email)) { 
            $errors["empty_input"] = "Fill in all fields";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "This username is already taken";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "This email is already registered";        
        }

        // Link to the config_session file, where there is a session started already.
        require_once 'config_session.inc.php';

        if ($errors) {
            // Store the errors stored in the $errors array in the session variable.
            $_SESSION["errors_signup"] = $errors;

            // Store the username and email inputs in an array, and then store them in 
            // session super-global varaible, for it to be displayed again if the user
            // get an error.
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../login_reg.php");
            die();
        }

        create_user($pdo, $password, $username, $email);

        header("Location: ../login_reg.php?signup=success"); // ../ => back one directory
        
        $pdo = null; // Close connection.
        $stmt = null; // Close statement.
        
        die();

    } catch (PDOException $e) { // $e is for Exceptions 
        die("Query failed: " . $e->getMessage());
    }
} else { 
    header("Location: ../login_reg.php"); // ../ => back one directory and access the login_reg.php
    die();
}