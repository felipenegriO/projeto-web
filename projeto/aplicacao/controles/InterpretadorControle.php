<?php

class InterpretadorControle extends Controle {

    /**
     * método form para ser
     * executado dentro de nosso MVC
     */
    public function form() {
        die('Método form executado.');
    }

    /**
     * Método listar que será
     * executado pela URL.
     */
    public function listar() {
        die('O método listar foi executado.');
    }

    /**
     * Método que será chamado
     * caso nenhuma acao seja informada
     */
    public function index() {
        $ini = parse_ini_file("../config/conf.ini");
//pega os dados do arquivo de configuração a qual facilita a manutençã0
        $this->visao->set('tituloMenu', $ini['nomeSoftware']);
        $this->visao->set('descricao', $ini['descricao']);
        $this->visao->set('autor', $ini['autor']);
        $this->visao->set('mic', '../imagens/mic.gif');
        $this->visao->set('titulo', 'Editor');
        include_once("UtilitariosInterpretador.php");
        $utilitario = new UtilitariosInterpretador();
        $this->visao->set('conteudo', ($utilitario::lerArquivoProjeto()));
        $this->visao->render('interpretador/index');
    }

    public function tratarMorfologia() {
        include_once("UtilitariosInterpretador.php");

        $utilitario = new UtilitariosInterpretador();

        $conteudoParaTRatar = $_GET['texto'];
        $conteudoParaTRatar = $utilitario->stringParaArray($conteudoParaTRatar);

//--------------RETIRAR CARACTERES E PALAVRAS NÃO CONCIDERADAS------------------

        $conteudoParaTRatar = $utilitario->excluirCaracteres($conteudoParaTRatar);

//--------------------------------------------RECONHER PALAVRAS-----------------
//Primeiro passo: Descobrir o comando envolvido... criação de variavel? 
//De classe? Metodo?
//Interpretar a palavra dita e torna-la reservada do Java

        $objPalavra = $utilitario->reconherPalavra($conteudoParaTRatar);
        $arr = $objPalavra->getReservadas();
        print_r($arr);
        print "<br>";

//Neste momento fica-se dois vetores.. um de palavras reservadas e um de não 
//reservadas a qual vamos tratar a abaixo
//----------------------------------------------MONTAR FRASE------------
        // if (count($objPalavra->getReservadas()) > 0) {

        require_once("modelo/class-Sentenca.php");
        $objSentenca = new Sentenca($objPalavra);
        //  print_r($objSentenca->getSentenca());
        print "<br>";
        //----------------------------------------------MONTAR SENTENCA-----
//Nesta parte insere de acordo com o pedido chaves, parenteses e ponto e virgula
//Primeiramente classificamos a sentenca, ou seja qual operacao..
// um classe um metodo uma variavel
        print_r($objSentenca->getSentenca());
        $op = $objSentenca->ClassificarSentenca($objSentenca->getSentenca());
        print "<br>" . $op . "<br>";
        if(isset($op) && $op !== null){
            $projeto =unserialize($_SESSION['projeto']);
            include_once("modelo/class-Projeto.php");
            print $projeto->getNomeProjeto();
             $utilitario->addVetor($op,$projeto);
        }
        //caso exista uma op adiciona ao vetor ...
       
        // print $op;
//Neste segundo momento inserimos os caracteres especiais

        $objSentenca->implementarSintaxe($op, $objSentenca->getSentenca());
//----------------------------------------------TRATAR VARIAVEIS DA FRASE-------

        $resultado = $utilitario->incluirVariaveis($objSentenca, $objPalavra);
        print"<br><br>";
//----------------------------------------------CONCATENANDO--------------------
        //$conteudo = explode(' ', $conteudo);
        print"<br><br>";
        $conteudo = $utilitario::lerArquivoProjeto();
//-------------------------------Aqui sera implementado pilha-------------------
        print "<br><br><br><br><br>";
        //verifica se chaves e parenteses do conteudo
        $auxCont = $utilitario->verificapariedade(explode(' ', $conteudo));
        print_r($auxCont);
        $auxResultado = $utilitario->verificapariedade($resultado);
        print_r($auxResultado);
//salvar no arquivo e voltar a visao 
        $this->visao->set('conteudo', $conteudo);
    }

}
