<?php
include('includes/header.inc.php');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Orçamento</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Orçamento -->
    <main>
        <h1 id="pedido-h1">Pedido de Orçamento</h1>
        <form id="orcamento-form" action="includes/pedido.inc.php" method="post">

            <h2 id="orcamento-h2">Pedido de Orçamento</h2>

            <label for="tipo-pagina">Tipo de Página</label>
            <select id="tipo-pagina" name="tipo-pagina" onchange="calcularOrcamento()">
                <option value="0"> --- Escolha um tipo --- </option>
                <option value="500">Página Simples - 500€</option>
                <option value="1000">Página Interativa - 1000€</option>
                <option value="1500">E-commerce - 1500€</option>
            </select>
            <br> <br>

            <label for="prazo">Prazo em Meses</label>
            <input type="number" id="prazo" name="prazo" value="1" min="1" max="4" onchange="calcularOrcamento()">
            
            <h4>Marque os separadores desejados</h4>

            <label for="quem-somos">Quem Somos</label>
            <input type="checkbox" id="quem-somos" class="checkbox" name="separadores[]" value="quem-somos" data-key="quem-somos" > 
            <br>
            <label for="onde-estamos">Onde estamos</label>
            <input type="checkbox" id="onde-estamos" class="checkbox" name="separadores[]" value="onde-estamos" data-key="onde-estamos"> 
            <br>
            <label for="galeria-fotografias">Galeria de fotografias</label>
            <input type="checkbox" id="galeria-fotografias" class="checkbox" name="separadores[]" value="galeria-fotografias" data-key="galeria-fotografias"> 
            <br>
            <label for="gestao-interna">Gestão interna</label>
            <input type="checkbox" id="gestao-interna" class="checkbox" name="separadores[]" value="gestao-interna" data-key="gestao-interna"> 
            <br>

            <h3>Orçamento Final: <span id="orcamento-final">0</span>€</h3>

            <button>Enviar</button>
            
            <?php
                //check_order_errors();
            ?>

        </form>
    </main>

    <script src="js/main.js"></script>
</body>
</html>
