<?php

include_once 'modelo/class-Pacote.php';
include_once("modelo/class-Classe.php");
include_once("modelo/class-Metodo.php");

class Projeto {

    private $nomeProjeto; //no do projeto String
    private $NomeClassePrincipal; //nome da classe principal String
    private $NomePackgePrincipal; //Nome do pacote que tera a classe principal String
    private $caminho; //pasta com arquivos fisicos do projeto
    private $criadoPor; // dono do projeto
    private $arrPacotes;
    private $contadorPacotes;

    public function __construct($nomeProjeto, $NomeClassePrincipal, $NomePackgePrincipal) {
        $NomeClassePrincipal = $this->verificaVariavel($NomeClassePrincipal, $nomeProjeto);
        $NomePackgePrincipal = $this->verificaVariavel($NomePackgePrincipal, $nomeProjeto);
        $this->nomeProjeto = $nomeProjeto;
        $this->NomeClassePrincipal = $NomeClassePrincipal;
        $this->NomePackgePrincipal = $NomePackgePrincipal;
        $this->arrPacotes = [];
        $this->contadorPacotes = 0;
        $this->criarProjeto();
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

    private function criarProjeto() {//cria projeto fisicamente
        //cria a pasta do projeto aqui o codigo aqui o pacote principal aqui a classe principal
        $this->caminho = 'projetos/' . $this->nomeProjeto . '/src/' . $this->NomePackgePrincipal . '/';
        if (!is_dir($this->caminho) && strlen($this->caminho) > 0) {
            mkdir($this->caminho, 0777, true);
        } else {
            return;
        }
        $pacote = new Pacote($this->NomePackgePrincipal);
        //cria classe inicial do projeto contendo ou nao classe principal
        
        //cria o objeto da classe
        $classe = new Classe("public",false,$this->NomeClassePrincipal,false,false,$this->NomePackgePrincipal);
        //cria o arquivo fisicamente
        $classePrincipal = $this->caminho . $this->NomeClassePrincipal . ".java";
        //cria o metodo main
         
         $metodo = new Metodo("public","static","void","main","String[] arg");
         //adicionar o metodo main para a classe criada;
         $classe->addMetodo($metodo);
         //adicionamos a classe ao pacote
         $pacote->addClasse($classe);
         $this->arrPacotes[$this->contadorPacotes] = $pacote;
         $this->contadorPacotes++;
        //abrir o arquivo para gravar os dados...
        $fp = fopen($classePrincipal, "a");
        //pega o conteudo da classe criada e seta para ser escrito fisicamente
        $texto =implode(' ',$classe->getClasse());
        fwrite($fp, $texto);
        // Fecha o arquivo
        fclose($fp);
    }

    public function deletarProjeto() {
        rmdir("projetos/" . $this->nomeProjeto) or die("erro ao excluir diretório");
    }

}
