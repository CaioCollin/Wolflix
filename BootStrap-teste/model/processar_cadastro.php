<?php
require_once('../components/conectaBD.php');
require_once('Filmes.php');

function renderizarAlerta($mensagem, $classe) {
    echo '<div class="container mt-3">';
    echo '<div class="alert ' . $classe . '">';
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo $mensagem;
    echo '</div>';
    echo '</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $favorito = isset($_POST['favorito']) ? true : false;
    $filmealta = isset($_POST['filmealta']) ? true : false;

    $uploadDir = '../components/assets/img/';
    $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
        $nomeImagem = $_FILES['imagem']['name'];

        $filme = new Filme(null, $titulo, $categoria, $favorito, $filmealta, $nomeImagem);
        $conn = conectarBanco();

        $titulo = $conn->real_escape_string($filme->getTitulo());
        $categoria = $conn->real_escape_string($filme->getCategoria());
        $favorito = $filme->isFavorito() ? true : false;
        $filmealta = $filme->getFilmeAlta() ? true : false;
        $img = $conn->real_escape_string($filme->getImg());

        criarBancoETabela($conn);

        $sql = "INSERT INTO filmescards (titulo, categoria, favorito, filmealta, img) 
                VALUES ('$titulo', '$categoria', '$favorito', '$filmealta', '$img')";

        if ($conn->query($sql) === TRUE) {
            renderizarAlerta("Filme cadastrado com sucesso!", "alert alert-success");

            // Exibir informações do filme
            echo '<div class="container mt-3">';
            echo '<h4>Informações do Filme:</h4>';
            echo '<p><strong>Título:</strong> ' . $titulo . '</p>';
            echo '<p><strong>Categoria:</strong> ' . $categoria . '</p>';
            echo '<p><strong>Favorito:</strong> ' . ($favorito ? 'Sim' : 'Não') . '</p>';
            echo '<p><strong>Filme em Alta:</strong> ' . ($filmealta ? 'Sim' : 'Não') . '</p>';
            echo '<p><strong>Imagem:</strong> ' . $img . '</p>';
            echo '</div>';
        } else {
            renderizarAlerta("Erro ao cadastrar filme: " . $conn->error, "alert alert-danger");
        }

        $conn->close();
    } else {
        renderizarAlerta("Ocorreu um erro ao carregar a imagem.", "alert alert-danger");
    }
} else {
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filme</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *{
            font-family: 'Edu QLD Beginner', cursive;
        }
        .true {
            color: green;
        }
        .false {
            color: red;
        }
        .btn-voltar {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <a href="formularioADM.html" class="btn btn-voltar mt-2">&#8592; Voltar</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
