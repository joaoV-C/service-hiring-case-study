<?php
    include('includes/header.inc.php');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website AJAX</title>
    <link rel="stylesheet" href="css/styles.css">
   
</head>
<body>

    <div id="container">
        <!-- Barra Lateral para Notícias RSS -->
        <aside id="index-aside">
            <div id="rss-feed">
                <h2 id="noticias-h2">Últimas Notícias</h2>
                <figure>
                    <p>Notícia 1</p>
                    <img src="images/imagem3.jpg" class="noticias" data-key="noticia1" alt="Noticia 1" >
                </figure>
                <figure>
                    <p>Notícia 2</p>
                    <img src="images/imagem4.jpg" class="noticias" data-key="noticia2" alt="Noticia 2" >
                </figure>
                <figure>
                    <p>Notícia 3</p>
                    <img src="images/imagem5.jpg" class="noticias" data-key="noticia3" alt="Noticia 3" >
                </figure>
                <figure>
                    <p>Notícia 4</p>
                    <img src="images/imagem6.jpg" class="noticias" data-key="noticia4" alt="Noticia 4" >
                </figure>
                <figure>
                    <p>Notícia 5</p>
                    <img src="images/imagem7.jpg" class="noticias" data-key="noticia5" alt="Noticia 5" >
                </figure>
                
                <div id="rss-content"></div>
            </div>
        </aside>
    
        <!-- Conteúdo Principal -->
        <main id="index-main">
            <div id="content">
                <h1>Bem-vindo ao Nosso Website</h1>
                <p id="show-info">Mais Informações</p>
            </div>
            <div id="hide-container">
                <p id="hide-info">Esconder</p>
            </div>
        </main>
    </div>
    

    <script src="js/main.js"></script>
    <script type="text/javascript">

        // Seta o timer para dispara o alerta.
        setTimeout(() => {
            //alert('Bem-vindo ao nosso website!');
        }, 5000);

        // Mostrar e esconder mais informações

        const showInfo = document.getElementById('show-info');
        const hideInfo = document.getElementById('hide-info');
        const originalContent = showInfo.innerHTML;

        showInfo.addEventListener('click',
            function carregarHtml () {

                showInfo.style.textAlign = "justify";
                showInfo.style.textDecoration = "none";
                showInfo.style.cursor = "auto";

                fetch('pagina.html')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erro ao carregar o HTML');
                        }
                        return response.text();
                    })
                    .then(data => {
                        showInfo.innerHTML = data;
                        hideInfo.style.display = 'inline-block';
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
            }
        )

        hideInfo.addEventListener('click', 
            function () {
                showInfo.innerHTML = originalContent;
                showInfo.style.textAlign = 'center';
                showInfo.style.textDecoration = 'underline';
                showInfo.style.cursor = 'pointer';
                hideInfo.style.display = 'none';
            }
        )
        
    </script>
</body>
</html>
