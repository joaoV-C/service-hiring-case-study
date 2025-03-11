<?php
header("Location: ../profile.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    try {
        require_once 'dbh.inc.php';
        require_once 'profile_model.inc.php';
        require_once 'profile_contr.inc.php';
        require_once 'config_session.inc.php';
        

        $appointments_result["username"] = $_SESSION["user_id"];
        $_SESSION["first_name"] = $appointments_result["first_name"];
        $_SESSION["surname"] = $appointments_result["surname"];
        $_SESSION["email"] = $appointments_result["email"];
        $_SESSION["contact_reason"] = $appointments_result["contact_reason"];
        $_SESSION["created_at"] = $appointments_result["created_at"];

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