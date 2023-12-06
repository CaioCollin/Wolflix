<?php

function obterFilmesDoBanco() {
    $conn = conectarBanco();

    // Realizar a consulta SQL para obter os filmes
    $sql = "SELECT * FROM filmescards";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Saída de dados de cada linha
        while ($row = $result->fetch_assoc()) {
            $id_filme = $row['id_filme'];
            $titulo = $row['titulo'];
            $categoria = $row['categoria'];
            $imagem = $row['img'];
            $favorito = $row['favorito']; // Assumindo que a coluna no banco de dados é chamada 'favorito'
        
            // Determinar a classe do ícone favorito com base no valor do banco de dados
            $favoritoClass = ($favorito == 1) ? 'bxs-star' : 'bx-star';
        
            // Exibir os dados com o estilo HTML
            echo '<div class="filmes-content">';
            echo '<div class="filme-box">';
            echo '<img src="assets/img/' .  $imagem . '" alt="" class="filme-box-img">';
            echo '<div class="box-titulo">';
            echo '<h2 class="titulo-filme">' . $titulo . '</h2>';
            echo '<span class="Categoria-fime">' . $categoria . '</span>';
            //echo '<a href="ver-filme.php" class="ver-btn play-btn"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a href="../components/carregarfilme.html" class="ver-btn play-btn" data-imagem="' . urlencode($imagem) . '"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a class="fav-btn playbtn">';
            echo '<i id="favoriteIcon' .  $id_filme . '" class="bx ' . $favoritoClass . '" onclick="toggleFavorite(' .  $id_filme . ')"></i>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
               
    } else {
        echo "Nenhum filme encontrado.";
    }

    $conn->close();

}



function obterFilmesFavoritosDoBanco() {
    $conn = conectarBanco();

    // Realizar a consulta SQL para obter os filmes favoritos
    $sql = "SELECT * FROM filmescards WHERE favorito = 1";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Saída de dados de cada linha
        while ($row = $result->fetch_assoc()) {
            $id_filme = $row['id_filme'];
            $titulo = $row['titulo'];
            $categoria = $row['categoria'];
            $imagem = $row['img'];
            $favorito = $row['favorito']; // Assumindo que a coluna no banco de dados é chamada 'favorito'
        
            // Determinar a classe do ícone favorito com base no valor do banco de dados
            $favoritoClass = ($favorito == 1) ? 'bxs-star' : 'bx-star';
        
            // Exibir os dados com o estilo HTML
            echo '<div class="filmes-content">';
            echo '<div class="filme-box">';
            echo '<img src="assets/img/' .  $imagem . '" alt="" class="filme-box-img">';
            echo '<div class="box-titulo">';
            echo '<h2 class="titulo-filme">' . $titulo . '</h2>';
            echo '<span class="Categoria-fime">' . $categoria . '</span>';
            //echo '<a href="ver-filme.php" class="ver-btn play-btn"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a href="../components/carregarfilme.html" class="ver-btn play-btn" data-imagem="' . urlencode($imagem) . '"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a class="fav-btn playbtn">';
            echo '<i id="favoriteIcon' .  $id_filme . '" class="bx ' . $favoritoClass . '" onclick="toggleFavorite(' .  $id_filme . ')"></i>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
       
    } else {
        echo "Nenhum filme favorito encontrado.";
    }

    $conn->close();
}


// Supondo que você tenha uma função para conectar ao banco de dados

// Função para obter os filmes do banco de dados
function obterFilmesEmAlta() {
    $conn = conectarBanco();

    // Realizar a consulta SQL para obter os filmes
    $sql = "SELECT id_filme, titulo, categoria, img FROM filmescards";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Saída de dados de cada linha
        while ($row = $result->fetch_assoc()) {
            $id_filme = $row['id_filme'];
            $titulo = $row['titulo'];
            $categoria = $row['categoria'];
            $imagem = $row['img'];

            // Exibir os dados com o estilo HTML
            echo '<div class="swiper-slide">';
            echo '<div class="filme-box">';
            echo '<img src="assets/img/' .  $imagem . '" alt="" class="filme-box-img">';
            echo '<div class="box-titulo">';
            echo '<h2 class="titulo-filme">' . $titulo . '</h2>';
            echo '<span class="Categoria-fime">' . $categoria . '</span>';
            //echo '<a href="ver-filme.php?id=' . $id_filme . '" class="ver-btn play-btn"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a href="ver-filme.php?id=' . $id_filme . '" class="ver-btn play-btn"><i class="bx bxs-right-arrow"></i></a><a href="../components/carregarfilme.html" class="ver-btn play-btn" data-imagem="' . urlencode($imagem) . '"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a href="" class="fav-btn playbtn"></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Nenhum filme encontrado.";
    }

    $conn->close();
}



?>