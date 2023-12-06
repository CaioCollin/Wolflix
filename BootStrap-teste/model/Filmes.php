<?php

class Filme {
    private $id_filme;
    private $titulo;
    private $categoria;
    private $favorito;
    private $filmealta;
    private $img;

    // Construtor
    public function __construct($id_filme, $titulo, $categoria, $favorito, $filmealta, $img) {
        $this->id_filme = $id_filme;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->favorito = $favorito;
        $this->filmealta = $filmealta;
        $this->img = $img;
    }

    // Métodos de acesso (getters e setters)
    public function getIdFilme() {
        return $this->id_filme;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function isFavorito() {
        return $this->favorito;
    }

    public function setFavorito($favorito) {
        $this->favorito = $favorito;
    }

    public function getFilmeAlta() {
        return $this->filmealta;
    }

    public function setFilmeAlta($filmealta) {
        $this->filmealta = $filmealta;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }
}
