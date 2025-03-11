<?php
declare(strict_types=1);
require_once 'profile_model.inc.php';
require_once 'profile_contr.inc.php';

function show_orders(object $pdo) {

    users_orders($pdo);

    if ($_SESSION["get_users_order"]) {
        echo '<h1>Seus Pedidos</h1>';
        echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%;">';
        echo '<tr>
                <th>Usuário</th>
                <th>Tipo de Página</th>
                <th>Prazo em Meses</th>
                <th>Páginas Selecionadas</th>
                <th>Total</th>
                <th>Data do Pedido</th>
              </tr>';

        foreach ($_SESSION["get_users_order"] as $pedido) {
            echo '<tr>';
            echo '<td class="td">' . htmlspecialchars($pedido['username']) . '</td>';
            echo '<td class="td">' . $pedido['page_type'] . '</td>';
            echo '<td class="td">' . $pedido['deadline'] . '</td>';
            echo '<td class="td">' . $pedido['selected_pages'] . '</td>';
            echo '<td class="td">' . $pedido['total'] . '</td>';
            echo '<td class="td">' . $pedido['created_at'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Você ainda não realizou nenhum pedido.</p>';
    }
    
}

function show_appointments(object $pdo) {

    users_appointments($pdo);

    //$users_appointments = get_users_appointments($pdo);

    if ($_SESSION["get_users_appointments"]) {
        echo '<h1>Suas Marcações</h1>';
        echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%;">';
        echo '<tr>
                <th>Usuário</th>
                <th>Primeiro Nome</th>
                <th>Apelido</th>
                <th>Email</th>
                <th>Motivo da Consulta</th>
                <th>Data da Marcação</th>
              </tr>';

        foreach ($_SESSION["get_users_appointments"] as $appointment) {
            echo '<tr>';
            echo '<td class="td">' . htmlspecialchars($appointment['username']) . '</td>';
            echo '<td class="td">' . $appointment['first_name'] . '</td>';
            echo '<td class="td">' . $appointment['surname'] . '</td>';
            echo '<td class="td">' . $appointment['email'] . '</td>';
            echo '<td class="td">' . $appointment['contact_reason'] . '</td>';
            echo '<td class="td">' . $appointment['created_at'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Você ainda não marcou nenhuma consulta.</p>';
    }
    
}
