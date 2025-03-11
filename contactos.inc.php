<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["nome"];
    $surname = $_POST["apelido"];
    $email = $_POST["email"];
    $motivo_contacto = $_POST["motivo"];
    

    try {

        require_once 'dbh.inc.php';
        require_once 'contactos_model.inc.php';
        require_once 'contactos_contr.inc.php';
        require_once 'config_session.inc.php';

        $errors = [];

        if (is_input_empty($name, $surname, $email, $motivo_contacto)) {
            $errors["empty_input"] = "Preencha todos os campos";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Email utilizado inválido";
        }
        if (is_user_logged()) {
            $errors["user_not_logged"] = "Você deve estar logado";
        }

        if ($errors) {
            $_SESSION["errors_contactos"] = $errors;

            header("Location: ../contactos.php");
            die();
        }

        set_contact($pdo, $name, $surname, $email, $motivo_contacto);

        header("Location: ../contactos.php?appointment=success");
        
        $pdo = null; // Close connection.
        $stmt = null; // Close statement.
        
        die();

    } catch (PDOException $e) { // $e is for Exceptions 
        die("Query failed: " . $e->getMessage());
    }
} else { 
    header("Location: ../contactos.php");
    die();
}