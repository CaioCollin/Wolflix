<?php
require_once('conectaBD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os parâmetros estão presentes
    if (isset($_POST['id_filme'], $_POST['favorito'])) {
        $idFilme = $_POST['id_filme'];
        $favorito = $_POST['favorito'];

        // Validar os dados se necessário (dependendo dos requisitos do seu aplicativo)

        // Atualizar o banco de dados com a informação de favorito usando prepared statements
        $conn = conectarBanco();
        $sql = "UPDATE filmescards SET favorito = ? WHERE id_filme = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $favorito, $idFilme);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $conn->error]);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
