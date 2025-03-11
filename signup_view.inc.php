<?php

declare(strict_types=1);

function signup_inputs() {
    /*
    <input type="text" name="email" placeholder="Email"> <br>
    <input type="text" name="username" placeholder="Username"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    */
    if (isset($_SESSION["signup_data"]["username"]) && 
        !isset($_SESSION["errors_signup"]["username_taken"])) {
        
        echo '<input type="text" name="username" placeholder="Username" 
        value="' . $_SESSION["signup_data"]["username"] . '" >';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo '<input type="password" name="password" placeholder="Password">';

    if (isset($_SESSION["signup_data"]["email"]) && 
        !isset($_SESSION["errors_signup"]["email_used"]) &&
        !isset($_SESSION["errors_signup"]["invalid_email"])) {
       
        echo '<input type="text" name="email" placeholder="Email" 
        value="' . $_SESSION["signup_data"]["email"] . '" >';
    } else {
        echo '<input type="text" name="email" placeholder="Email">';
    }
}

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        // Clear the data from the array after the script is done running
        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo '<p>Signup success!</p>';
    }
}