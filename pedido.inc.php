<?php

// check if the user got here through a POST request, if not, send them back 
// to the index page.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Link to the config_session file, where there is a session started already.
    require_once 'config_session.inc.php';

    if (isset($_SESSION["user_id"])) {
    
        try {

            require_once 'dbh.inc.php';
            require_once 'pedido_model.inc.php';
            require_once 'pedido_contr.inc.php';

            $mapa_separadores = [
                "quem-somos" => 400,
                "onde-estamos" => 400,
                "galeria-fotografias" => 400,
                "gestao-interna" => 400,
            ];

            $separadores = isset($_POST["separadores"]) ? $_POST["separadores"] : [];
            $separadores_detalhados = [];
            $tipo_pagina = (int)$_POST["tipo-pagina"];
            $prazo = (int)$_POST["prazo"];
            $desconto = min($prazo * 5, 20);
            $total = (int)$tipo_pagina;

            $errors = [];

            if (out_prazo_range($prazo)) { 
                $errors["out_prazo_range"] = "O prazo deve ser maior que 0 e menor que 6.";
            }

            foreach ($separadores as $separador) {
                if (isset($mapa_separadores[$separador])) {
                    $separadores_detalhados[] = [
                        "valor" => $mapa_separadores[$separador],
                        "descricao" => $separador
                    ];
                }
            }

            $total = calc_total($separadores_detalhados, $total, $desconto);

            $separadores_json = json_encode($separadores_detalhados);

            $users_id = $_SESSION["user_id"];
            $username = $_SESSION["user_username"];

            create_order($pdo, $username, $tipo_pagina, $prazo, $separadores_json, $total, $users_id);

            header("Location: ../pedido.php?order_place=success"); // ../ => back one directory
            
            $pdo = null; // Close connection.
            $stmt = null; // Close statement.
            
            die();

        } catch (PDOException $e) { // $e is for Exceptions 
            die("Query failed: " . $e->getMessage());
        }
    } else {
        header("Location: ../pedido.php?order_place=fail");
        // echo "login first";
    }
} else { 
    header("Location: ../pedido.php"); // ../ => back one directory and access the login_reg.php
    die();
}