<?php

function conectarBanco() {
    $servername = "localhost";
    $username = "root"; // Substitua isso pelo seu nome de usuário do MySQL
    $password = ""; // Substitua isso pela sua senha do MySQL
    $dbname = "wolfix"; // Substitua isso pelo nome do seu banco de dados

    // Conectar ao MySQL
    $conn = new mysqli($servername, $username, $password);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o servidor MySQL: " . $conn->connect_error);
    }

    // Verificar se o banco de dados existe
    $query = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($query) === TRUE) {
    } else {
        die("Erro ao criar o banco de dados: " . $conn->error);
    }

    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão ao banco de dados
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    
    return $conn;
}

$conn = conectarBanco();

function criarBancoETabela($conn) {
    // Selecionar o banco de dados recém-criado ou existente
    $conn->select_db("wolfix");

    // Verificar se a tabela já existe
    $sqlCheckTable = "SHOW TABLES LIKE 'filmescards'";
    $result = $conn->query($sqlCheckTable);

    if ($result->num_rows == 0) {
        // Criar a tabela se não existir
        $sqlCreateTable = "CREATE TABLE filmescards (
                            id_filme INT AUTO_INCREMENT PRIMARY KEY,
                            titulo VARCHAR(255) NOT NULL,
                            categoria VARCHAR(255) NOT NULL,
                            favorito BOOLEAN NOT NULL,
                            filmealta BOOLEAN NOT NULL,
                            img VARCHAR(255) NOT NULL
                        )";

        if ($conn->query($sqlCreateTable) === TRUE) {
            echo "Tabela criada com sucesso.";
        } else {
            die("Erro ao criar tabela: " . $conn->error);
        }
    } else {
        
    }

    // Verificar se há dados na tabela
    $sqlCheckData = "SELECT COUNT(*) as count FROM filmescards";
    $result = $conn->query($sqlCheckData);
    $row = $result->fetch_assoc();

    if ($row['count'] == 0) {
        // Inserir os filmes apenas se não houver dados na tabela
        cadastrarFilmes($conn);
    } else {
        
    }
}

function cadastrarFilmes($conn) {
    $sqlInsertData = "INSERT INTO filmescards (titulo, categoria, img) VALUES
    ('Gênesis', 'Documentario', 'filme-1.jpg'),
    ('Mario bros the Super', 'Aventura', 'filme-2.jpg'),
    ('Jungle Cruise', 'Aventura', 'filme-4.jpg'),
    ('Avengers endgame', 'Ação', 'filme-5.jpg'),
    ('The falcon and the winter soldier', 'Ação', 'filme-6.jpg'),
    ('Howkeye', 'Ação', 'filme-7.jpg'),
    ('Psicose', 'Suspense', 'filme-8.jpg'),
    ('Toy Story', 'Animação', 'filme-9.jpg'),
    ('Jumanji', 'Aventura', 'filme-10.jpg'),
    ('Shang-thi', 'Mistério', 'filme-11.jpg'),
    ('Wolverine', 'Ação', 'filme-12.jpg'),
    ('The Flash Armageddon', 'Avetura', 'filme-13.jpg'),
    ('Spectre', 'Documentário', 'filme-14.jpg'),
    ('Money Heist', 'Ação', 'filme-15.jpg'),
    ('Três Homens em Conflito', 'Western', 'filme-16.jpg'),
    ('God Of War III', 'Ação', 'filme-17.jpg'),
    ('Homem-Aranha', 'Ação/Ficção científica', 'filme-18.jpg'),
    ('Vingadores: Guerra Infinita', 'Ação/Ficção científica', 'filme-19.jpg'),
    ('Round 6', 'Terror/Acão', 'filme-20.jpg'),
    ('Sonic', 'Animação', 'filme-21.jpg')";

    if ($conn->query($sqlInsertData) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        die("Erro ao inserir dados: " . $conn->error);
    }
}

?>

