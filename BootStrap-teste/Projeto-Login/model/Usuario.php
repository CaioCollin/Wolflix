<?php
class Usuario {
    private $nome;
    private $email;
    private $senhaHash;

    // Construtor para criar um novo usuário
    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    // Métodos getters
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenhaHash() {
        return $this->senhaHash;
    }

    // Métodos setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Não permitimos alterar diretamente a senha; a senha só pode ser definida no construtor
    // Se desejar permitir alterações de senha, pode adicionar um método setSenha() com a lógica adequada

    // Método para exibir informações do usuário
}

?>