<?php

declare(strict_types=1);

function output_username() {
    if (isset($_SESSION["user_id"])) {
        echo "You are logged in as " . $_SESSION["user_username"];
    } else {
        echo "You are not logged in";
    }
}

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo '<br>';

        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';

            // Always unset the informations stored into the session variable 
            // when they are no longer needed.
            unset($_SESSION["errors_login"]);
        }
    } 
    // Checks if the 'login' information stored in the $_GET is equal to 'success'.
    elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Login success.</p>';
    }
}