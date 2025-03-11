<?php
include('includes/header.inc.php');
require_once 'includes/config_session.inc.php';
require_once 'includes/contactos_view.inc.php';
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <!-- Mapa e Formulário -->
    <main>
        <h1 id="contactos-h1">Contacte-nos</h1>
        <div id="map" style="height: 600px;"></div>
        <br>
        <div id="contact-container">
            <form id="contact-form" action="includes/contactos.inc.php" method="post">

                Nome
                <input type="text" class="contact-form" id="nome" name="nome" /*required* />

                Apelido
                <input type="text" class="contact-form" id="apelido" name="apelido" /*required* />

                Email
                <input type="text" class="contact-form" id="email" name="email" /*required* />

                Motivo do Contacto
                <textarea id="motivo" class="contact-form" name="motivo" /*required* /></textarea>

                <br>
                <br>

                <button type="submit">Enviar</button>

                <?php
                check_contact_errors();
                ?>

            </form>
        </div>
    </main>

    <script src="js/main.js"></script>
    <script type="text/javascript">
        // Função que inicializa o mapa
        function initMap() {

            const officeLocation = {
                lat: 38.728823,
                lng: -9.140401
            }; // Masterd Lisboa

            // Criar um novo mapa e exibi-lo na div #map
            const map = new google.maps.Map(document.getElementById('map'), {
                center: officeLocation,
                zoom: 15
            });

            // Adicionar um marcador na localização do escritório
            const marker = new google.maps.Marker({
                position: officeLocation,
                map: map,
                title: 'Nosso Escritório'
            });
        }
    </script>
</body>

</html>