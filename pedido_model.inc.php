<?php
declare(strict_types=1);


function place_order (object $pdo, /*string $username,*/ int $tipo_pagina, 
    int $prazo, string $separadores_json, float $total/*, string $users_id*/) {
    
    
    $query = "INSERT INTO projects (username, page_type, deadline, selected_pages, total, users_id) 
    VALUES (:username, :tipo_pagina, :prazo, :separadores, :total, :users_id)";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $_SESSION["user_username"]);
    $stmt->bindParam(":tipo_pagina", $tipo_pagina);
    $stmt->bindParam(":prazo", $prazo);
    $stmt->bindParam(":separadores", $separadores_json);
    $stmt->bindParam(":total", $total);
    $stmt->bindParam(":users_id", $_SESSION["user_id"]);
    $stmt->execute();
}