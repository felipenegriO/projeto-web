<?php

class Pacote {

    private $nome;
    private $arrClasses;
    private $contador;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->arrClasses = [];
    }

    public function getClasses() {
        return $this->arrClasses;
    }
    public function addClasse($classe) {
        $this->arrClasses[$this->contador] = $classe;
        $this->contador++;
    }

}
