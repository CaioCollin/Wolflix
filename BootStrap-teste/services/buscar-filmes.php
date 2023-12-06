<?php

require_once('../components/conectaBD.php'); 
// Obtém o termo de busca do parâmetro POST
$termoBusca = $_POST['busca'] ?? '';

// Chama a função para buscar filmes com base no termo de busca
buscarFilmesPorNome($termoBusca);

function buscarFilmesPorNome($termoBusca) {
    $conn = conectarBanco();

    // Use a busca no SQL se um termo de busca for fornecido
    $sql = "SELECT * FROM filmescards";
    if (!empty($termoBusca)) {
        $sql .= " WHERE titulo LIKE '%$termoBusca%'";
    }

    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(['error' => 'Erro ao executar a consulta SQL']);
        exit;
    }

    // Exibe os resultados da busca
    // Exibe os resultados da busca
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_filme = $row['id_filme'];
            $titulo = $row['titulo'];
            $categoria = $row['categoria'];
            $imagem = $row['img'];
            $favorito = $row['favorito']; // Assumindo que a coluna no banco de dados é chamada 'favorito'
            
            // Determinar a classe do ícone favorito com base no valor do banco de dados
            $favoritoClass = ($favorito == 1) ? 'bxs-star' : 'bx-star';

            // Exibir o card do filme com o estilo HTML
            echo '<div class="filmes-content">';
            echo '<div class="filme-box">';
            echo '<img src="assets/img/' .  $imagem . '" alt="" class="filme-box-img">';
            echo '<div class="box-titulo">';
            echo '<h2 class="titulo-filme">' . $titulo . '</h2>';
            echo '<span class="Categoria-fime">' . $categoria . '</span>';
            echo '<a href="ver-filme.php" class="ver-btn play-btn"><i class="bx bxs-right-arrow"></i></a>';
            echo '<a class="fav-btn playbtn">';
            echo '<i id="favoriteIcon' .  $id_filme . '" class="bx ' . $favoritoClass . '" onclick="toggleFavorite(' .  $id_filme . ')"></i>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum filme encontrado.</p>';
    }


    $conn->close();
}
?>
