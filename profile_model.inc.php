<?php
declare(strict_types=1);

function get_users_order(object $pdo) {
    $query = "SELECT 
    username, page_type, deadline, selected_pages, total, created_at
    FROM projects 
    WHERE username = :username
    ORDER BY created_at DESC";
        
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $_SESSION["user_username"]);
        $stmt->execute();
        $result_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if ($result_orders) {
            return $result_orders;
        } else {
            return null;
        }
    } catch (PDOException $e) {
        die("Erro ao buscar pedidos: " . $e->getMessage());
    }
}

function get_users_appointments(object $pdo) {
    $query = "SELECT 
    username, first_name, surname, email, contact_reason, created_at
    FROM contacts
    WHERE username = :username
    ORDER BY created_at DESC";
        
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $_SESSION["user_username"]);
        $stmt->execute();
        $appointments_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if ($appointments_result) {
            return $appointments_result;
        } else {
            return null;
        }
    } catch (PDOException $e) {
        die("Erro ao buscar pedidos: " . $e->getMessage());
    }
}
