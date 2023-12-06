<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wolflix</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- sitezin com icones etc -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>


/* Adicione um estilo para o ícone de busca */
/* Adicione uma classe à seção para aplicar o estilo */
.filmes {
    margin-top: 40px; /* Ajuste o valor conforme necessário */
    scroll-margin-top: 40px; /* Ajuste o valor conforme necessário */
    display: block; /* Certifique-se de que a seção é exibida como bloco */
}

</style>


<body>
    <!-- INICIO CABEÇALHO DO SITE WOLFLIX -->
    <?php
        require_once('conectaBD.php');
        $conn = conectarBanco();
        criarBancoETabela($conn);
    ?>
    <header>
        <div class="nav container">

            <!-- Inicio logo -->
            <a href="main.php" class="logo" title="Wolflix">
                Wol<span>Flix</span>
            </a>
            <!--Fim logo -->

            <!--Inicio busca-->
            <div class="busca-site">
                <input type="search" id="busca-input" placeholder="Buscar Filmes">
                <i class='bx bx-search' id="icone-busca"></i>
            </div>
            <!-- fim busca-->

            <!--  colocar a imagem fornecida pelo usuario depois atraves do BD. -->
            <a href="" class="user">
                <img src="assets/img/p1logo.png" alt="Yoshi" class="user-img">
            </a>
            <!-- fim imagem do usuario -->

            <!-- inicio menu principal -->
            <!-- inicio menu principal -->
            <div class="navbar">
                <a href="usuario.php" class="nav-link">
                    <i class='bx bxs-home'></i>
                    <span class="nav-link-title">home</span>
                </a>

                <a href="#filmesemalta " class="nav-link">
                    <i class='bx bxs-hot'></i>
                    <span class="nav-link-title">Em alta</span>
                </a>

                <a href="#" class="nav-link" onclick="navigateTo('section-filmes')">
                    <i class='bx bx-tv'></i>
                    <span class="nav-link-title">Filmes</span>
                </a>

                <a href="#" class="nav-link" onclick="navigateTo('section-favoritos')">
                    <i class='bx bx-star'></i>
                    <span class="nav-link-title">Favoritos</span>
                </a>

            </div>

    </header>

    <!-- INICIO CABEÇALHO DO SITE WOLFLIX -->

    <!--inicio banner destaque-->

    <section class="banner container">

        <!-- inicio imagem destaque-->

        <img src="assets/img/home-background.png" alt="" class="banner-img">

        <!-- fim imagem destaque-->

        <!-- inicio texto destaque-->
        <div class="banner-texto">
            <h1 class="banner-titulo">Super Mario Bros. <br> O filme</h1>

            <p> Lançamento em Novembro</p>

            <?php require_once("carregartreiler.php"); ?>

            <!-- fim texto destaque-->
            
        </div>

    </section>

    <!--fim banner destaque-->

    <!-- inicio em alta-->
    <section class="popular container" id="popular">

        <!-- Topo em alta-->
        <div class="topofilmes" id="filmesemalta">
            <h2 class="topoTitulo"> Em alta</h2>
            <!-- setas slide-->
            <div class="swiper-btn">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <!-- fim setas slide-->
        </div>
        <!-- box slide em alta-->
        <div class="popular-content swiper">
            <div class="swiper-wrapper">

                <?php 
                require_once('conectaBD.php');
                require_once('../services/filmesservices.php');
                obterFilmesEmAlta(); 
                ?>

            </div>
        </div>

    </section>
    <!---  FIM EM ALTA -->

    <section class="filmes container" id="section-filmes">
        <!-- TOPO FILMES -->
        <div class="topofilmes" id="filmes">
            <h2 class="topotitulo">Filmes e Shows</h2>
        </div>
        <!-- FIM TOPO FILMES TRAZ TODOS OS FILMES-->

        <!-- CORPO FILMES   TRAZ-->
        <div class="filmes-content">
            <?php
            obterFilmesDoBanco();
            ?>
        </div>
        <!-- FIM CORPO FILMES-->

    </section>

    <!---  FIM FILMES FAVORITOS -->
    <section class="filmes container" id="section-favoritos">
        <!-- TOPO FILMES -->
        <div class="topofilmes">
            <h2 class="topotitulo">Filmes Favoritos</h2>
        </div>
        <!-- FIM TOPO FILMES-->

        <!-- CORPO FILMES   TRAZ TODOS OS FILMES FAVORITOS-->
        <div class="filmes-content">
            <?php
            obterFilmesFavoritosDoBanco();
            ?>
        </div>

    </section>

    <!-- ------ ISSO É UM TEXTE PARA CHAMAR FILME PELO NOME QUE FOI DADO ----- -->

    <section class="filmes container" id="filmespesquisa" >
        <!-- TOPO FILMES -->
        <div class="topofilmes" id="busca-input">
            <h2 class="topotitulo" >PESQUISA</h2>
        </div>
        <!-- FIM TOPO FILMES-->

        <!-- CORPO FILMES   TRAZ TODOS OS FILMES FAVORITOS-->
        <div class="filmes-content" id="resultados-busca">
            
        </div>

    </section>


<!-- teste para saber qual o nome da imagem  -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Adicionar um evento de clique a todos os elementos com a classe "ver-btn"
        var verButtons = document.querySelectorAll('.ver-btn');
        verButtons.forEach(function (verButton) {
            verButton.addEventListener('click', function (event) {
                // Impedir o comportamento padrão do link para não navegar para outra página
                event.preventDefault();

                // Obter o nome da imagem do atributo de dados "data-imagem"
                var imagemNome = verButton.getAttribute('data-imagem');

                // Redirecionar para a página "carregarfilme" com o nome da imagem como parâmetro
                window.location.href = 'carregarfilme.php?imagem=' + encodeURIComponent(imagemNome);
            });
        });
    });
</script>




<!--   FOCOS EM ICONES ----- -->

<script>
        function navigateTo(sectionId) {
            // Remove a classe 'focused' de todos os elementos
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.classList.remove('focused');
            });

            // Adiciona a classe 'focused' apenas ao elemento clicado
            var clickedLink = event.target;
            clickedLink.classList.add('focused');

            // Rola a página para a seção correspondente
            var section = document.getElementById(sectionId);
            section.scrollIntoView({ behavior: 'smooth' });


            // Rola a página para a seção correspondente com uma velocidade personalizada
       
        }

</script>
 

<!-- BUSCA FILME POST - BUSCA POR NOME  -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Adicionar evento de clique no ícone de busca
        $('#icone-busca').on('click', function() {
            // Dar foco ao campo de busca
            $('#busca-input').focus();

            // Rolar até o campo desejado
            $('html, body').animate({
                scrollTop: $('#filmespesquisa').offset().top
            }, 1500); // O valor 1000 representa a velocidade da animação em milissegundos
        });

        // Adicionar evento de entrada no campo de busca
        $('#busca-input').on('input', function() {
            const termoBusca = $(this).val().trim();

            // Envia uma solicitação AJAX para o servidor com o termo de busca
            $.ajax({
                type: 'POST',
                url: '../services/buscar-filmes.php', // Substitua pelo nome do seu script PHP
                data: { busca: termoBusca },
                success: function(data) {
                    // Atualiza dinamicamente a lista de resultados da busca
                    $('#resultados-busca').html(data);
                    console.log('ola mundo');
                },
                error: function(error) {
                    console.error('Erro na busca:', error);
                }
            });
        });
    });
</script>


<script src="assets/js/swiper-bundle.min.js"> </script>
<script src="assets/js/scripts.js"> </script>

<!-- Aqui fica responsalvel pelos FAVORITOS  -->
<script>
    let isFavorite = [];
    function toggleFavorite(id_filme) {
        const iconElement = document.getElementById('favoriteIcon' + id_filme);

        // Toggle the icon
        if (isFavorite[id_filme]) {
            iconElement.classList.remove('bxs-star');
            iconElement.classList.add('bx-star');
        } else {
            iconElement.classList.remove('bx-star');
            iconElement.classList.add('bxs-star');
        }

        // Toggle the state
        isFavorite[id_filme] = !isFavorite[id_filme];

        // Send the value to the server
        const favoritoValue = isFavorite[id_filme] ? 1 : 0;
        console.log(favoritoValue, id_filme);

        // Use Fetch API to send data to the server
        fetch('favorito.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'favorito=' + favoritoValue + '&id_filme=' + id_filme,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server if needed
            console.log('Resposta do servidor:', data);

            // Reload the page after a short delay (100 milliseconds)
            setTimeout(() => {
                location.reload();
            }, 1000);
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }
</script>


</body>

</html>