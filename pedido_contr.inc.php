<?php
declare(strict_types=1);
// Input and information handling

function calc_total(array $separadores_detalhados, int $total, int $desconto) {
    if (isset($separadores_detalhados) && is_array($separadores_detalhados)) {
        foreach ($separadores_detalhados as $separador) {
            $total += (int)$separador["valor"];
        }
    }
    $total -= $total * ($desconto / 100);
    return $total;
}


function out_prazo_range(int $prazo) {
    if ($prazo < 1 && $prazo > 5) {
        header("Location: ../pedido.php?order_place=fail");
    }
}

function create_order(object $pdo, string $username, int $tipo_pagina, int $prazo, string $separadores_json, int $total, string $users_id) {
    place_order($pdo, $username, $tipo_pagina, $prazo, $separadores_json, $total, $users_id);
}