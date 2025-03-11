<?php

declare(strict_types=1);

function check_contact_errors() {
    if (isset($_SESSION["errors_contactos"])) {
        $errors = $_SESSION["errors_contactos"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        // Clear the data from the array after the script is done running
        unset($_SESSION["errors_contactos"]);
    } else if (isset($_GET["appointment"]) && $_GET["appointment"] === "success") {
        echo "<br>";
        echo '<p>Contacto feito com sucesso!</p>';
    }
}