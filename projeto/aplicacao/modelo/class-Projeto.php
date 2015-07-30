<?php

class Projeto {

    private $nomeProjeto; //no do projeto String
    private $NomeClassePrincipal; //nome da classe principal String
    private $NomePackgePrincipal; //Nome do pacote que tera a classe principal String
    private $caminho; //pasta com arquivos fisicos do projeto
    private $criadoPor; // dono do projeto

    function __construct($nomeProjeto, $NomeClassePrincipal, $NomePackgePrincipal) {
        $NomeClassePrincipal = $this->verificaVariavel($NomeClassePrincipal, $nomeProjeto);
        $NomePackgePrincipal = $this->verificaVariavel($NomePackgePrincipal, $nomeProjeto);
        $this->nomeProjeto = $nomeProjeto;
        $this->NomeClassePrincipal = $NomeClassePrincipal;
        $this->NomePackgePrincipal = $NomePackgePrincipal;
    }

    //GETTERS E SETTERS   
    //Nome projeto
    public function getNomeProjeto() {
        return $this->nomeProjeto;
    }

    public function setNomeProjeto($nomeProjeto) {
        $this->nomeProjeto = $nomeProjeto;
    }

    //nome classe principal
    public function getNomeClassePrincipal() {
        return $this->NomeClassePrincipal;
    }

    public function setNomeClassePrincipal($NomeClassePrincipal) {
        $this->NomeClassePrincipal = $NomeClassePrincipal;
    }

    //nome pacote principal
    public function getNomePackgePrincipal() {
        return $this->NomePackgePrincipal;
    }

    public function setNomePackgePrincipal($NomePackgePrincipal) {
        $this->NomePackgePrincipal = $NomePackgePrincipal;
    }

    public function getCaminho() {
        return $this->caminho;
    }

    public function setCaminho($caminho) {
        $this->$caminho = $caminho;
    }

    public function getCriadoPor() {
        return $this->$criadoPor;
    }

    public function setCriadoPor($criadoPor) {
        $this->$criadoPor = $criadoPor;
    }

    private function verificaVariavel($analisada, $substituta) {
        if (!isset($analisada) || $analisada === null || !property_exists($this, $analisada)) {
            return $substituta;
        } else {
            return $analisada;
        }
    }

    public function criarProjeto() {//cria projeto fisicamente
        //cria a pasta do projeto aqui o codigo aqui o pacote principal aqui a classe principal
        $this->caminho = 'projetos/' . $this->nomeProjeto . '/src/' . $this->NomePackgePrincipal . '/';
        if (!is_dir($this->caminho) && strlen($this->caminho) > 0) {
            mkdir($this->caminho, 0777, true);
        } else {
            return;
        }
        //cria classe inicial do projeto contendo ou nao classe principal
        $classePrincipal = $this->caminho . $this->NomeClassePrincipal . ".java";
        $fp = fopen($classePrincipal, "a");
        if (true) {//se tiver classe principal 
            $texto = "package " . $this->NomePackgePrincipal . ";\n\n"
                    . "public class " . $this->NomeClassePrincipal . " {\n\n"
                    . "	public static void  main (String[] arg){\n\n"
                    . "	}\n"
                    . "}";
        } else {//se nao cria só a classe
            $texto = "\npackage " . $this->NomePackgePrincipal . ";\n\n"
                    . "public class " . $this->NomeClassePrincipal . " {\n\n"
                    . "}";
        }// Escreve classe principal no arquivo
        $escreve = fwrite($fp, $texto);
        // Fecha o arquivo
        fclose($fp);
        print $texto;
    }

    function deletarProjeto() {
        rmdir("projetos/" . $this->nomeProjeto) or die("erro ao excluir diretório");
    }

}
