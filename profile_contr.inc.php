<?php
declare(strict_types=1);

require_once 'includes/profile_model.inc.php';

/*
function show_users_orders(object $pdo) {

    if (isset($_SESSION["user_username"])) {
        $username = $_SESSION["user_username"];
        $pedidos = get_users_order($pdo, $username);
        
        if ($pedidos) {
            show_orders($pedidos);
        } else {
            echo '<p>Você ainda não realizou nenhum pedido.</p>';
        }
    } else {
        echo '<p>Por favor, faça login para visualizar seus pedidos.</p>';
    }
}
*/

function users_orders(object $pdo) {
    $_SESSION["get_users_order"] = get_users_order($pdo);
    return $_SESSION["get_users_order"];
}

function users_appointments(object $pdo) {
    $_SESSION["get_users_appointments"] = get_users_appointments($pdo);
    return $_SESSION["get_users_appointments"];
}
