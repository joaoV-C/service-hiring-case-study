<?php
declare(strict_types=1);

function set_contact(object $pdo, string $name, string $surname, string $email, string $motivo_contacto) {
    $query = "INSERT INTO contacts 
    (username, first_name, surname, email, contact_reason, users_id)
    VALUES 
    (:username, :first_name, :surname, :email, :contact_reason, :users_id)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $_SESSION["user_username"]);
    $stmt->bindParam(":first_name", $name);
    $stmt->bindParam(":surname", $surname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":contact_reason", $motivo_contacto);
    $stmt->bindParam(":users_id", $_SESSION["user_id"]);
    $stmt->execute();
}