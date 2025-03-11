/*
function carregarRSS() {
    fetch('rss/noticias.xml')
        .then(response1 => {
            if (!response1.ok) {
                throw new Error('Erro ao carregar o RSS');
            }
            return response1.text();
        })
        .then(data1 => {
            const parser = new DOMParser();
            const xml = parser.parseFromString(data1, 'text/xml');

            const items = xml.querySelectorAll('item');
            let htmlContent = '';
            
            items.forEach(item => {
                const title = item.querySelector('title').textContent;
                const link = item.querySelector('link').textContent;
                const description = item.querySelector('description').textContent;
                const pubDate = item.querySelector('pubDate').textContent;

                htmlContent += `
                    <div class="rss-item">
                        <h3><a href="${link}" target="_blank">${title}</a></h3>
                        <p>${description}</p>
                        <small>${new Date(pubDate).toLocaleDateString()}</small>
                    </div>
                `;
            });

            document.getElementById('rss-content').innerHtml = htmlContent;
        })
        .catch(error1 => {
            console.error('Erro:', error1);
        });
}
window.onload = carregarRSS;
*/

// Carregar noticias
const noticias = document.querySelectorAll('.noticias');

function carregarNoticias(event) {
    const mapaNoticias = {
        "noticia1" : "noticias/noticia1.php",
        "noticia2" : "noticias/noticia2.php",
        "noticia3" : "noticias/noticia3.php",
        "noticia4" : "noticias/noticia4.php",
        "noticia5" : "noticias/noticia5.php",
    };

    const noticiaKey = event.currentTarget.getAttribute('data-key');

    if (noticiaKey in mapaNoticias) {
        console.log(noticiaKey);

        fetch(mapaNoticias[noticiaKey])
            .then(response => response.text())
            .then(html => {
                document.documentElement.innerHTML = html;
            })
            .catch(error => {
                console.error("Erro ao carregar a notícia:", error);
            });
        //document.innerText = mapaNoticias[noticiaKey];
    }
}

noticias.forEach(noticia => {
    noticia.addEventListener('click', carregarNoticias);
});

// Pedido
const checkboxes = document.querySelectorAll('.checkbox');

function calcularOrcamento() {
    let tipoPagina = parseInt(document.getElementById('tipo-pagina').value);
    let prazo = parseInt(document.getElementById('prazo').value);
    let desconto = Math.min(prazo * 5, 20);
    let total = tipoPagina;

    const mapa_separadores = {
        "quem-somos" : 400,
        "onde-estamos" : 400,
        "galeria-fotografias" : 400,
        "gestao-interna" : 400,
    };

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const key = checkbox.getAttribute('data-key');
            if (key in mapa_separadores) {
                console.log(key);
                total += mapa_separadores[key];
            }
        }
    });
    total -= total * (desconto / 100);

    document.getElementById('orcamento-final').innerText = total.toFixed(2);
}

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', calcularOrcamento);
})

// Galeria
function abrirGaleria(event) {
    const nome = event.target.alt || 'Imagem';
    const imagem = event.target.src;
    window.open(imagem, nome, 'width=800,height=600');
}

const images = document.querySelectorAll('.images');

images.forEach(image => {
    image.addEventListener('click', abrirGaleria);
})
