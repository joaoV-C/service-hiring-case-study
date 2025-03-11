<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorect"] = "Incorrect login Info";
        }

        if (!is_username_wrong($result) && is_password_wrong($password, $result["pwd"])) {
            $errors["login_incorect"] = "Incorrect login Info";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            // Store the errors stored in the $errors array in the session variable.
            $_SESSION["errors_login"] = $errors;

            header("Location: ../login_reg.php");
            die();
        }

        // Store the actual user id and name, queried from the db, into the session variable.
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../login_reg.php?login=success");

        // Close the connection and the statement.
        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) { // $e is for Exceptions 
        die("Query failed: " . $e->getMessage());
    }

} else { 
    header("Location: ../login_reg.php"); // ../ => back one directory and access the login_reg.php
    die();
}