<?php

class HomeControle extends Controle {

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

    public function cadastrarProjeto() {
        if (isset($_GET['nomeProjeto']) == true) {//verifica se foi setado o nome do projeto
            include_once 'modelo/class-Projeto.php';
            // verifica se tem classe principal
               print $_GET['classePrincipal'];
                    $arr = explode("/", $_GET['classePrincipal']);
                    $projeto = new Projeto($_GET['nomeProjeto'], $arr[0], $arr[1]);
            //  require 'modelo/dao/DAOProjeto.php';
            /* $arrProjetos = Lista(null); //recebe todos os projetos cadastrados
              foreach ($arrProjetos as $arr) {
              /* @var $_POST type */
            /*    if ($arr[0] === $projeto->getNomeProjeto()) {//se for igual retorna ao usuario
              ?><script src="../js/funcao_novoProjeto_nomeInvalido.js"></script> <?php
              }
              } */
            //se nao cria o projeto
            //criar fisicamente uma pasta com nome do arquvo
             
            $projeto->criarProjeto();
            //inserir no banco de dados 
            //ciar sessao do projeto com seus dados em um string com a funcao serialize
            if (!isset($_SESSION['projeto']) == true and empty($_SESSION['projeto'])) {
                $_SESSION['projeto'] = serialize($projeto);
            }
            //setar index com controle do interpretador e acao default
            //feito isso sera direcionado para a  janela do editor
            ?><SCRIPT>location.href = 'index.php?controle=Interpretador&acao=';</SCRIPT><?php
        }
    }

    /**
     * Método que será chamado
     * caso nenhuma acao seja informada
     */
    public function index() {
        # Agora esse método usa o mecanismo de visão
        $this->visao->set('index', '../../../index.php');
        $this->visao->set('titulo', 'Gerenciar Projetos');
        $this->visao->set('subtituloMenu', 'Gerenciador de projetos');
        $this->visao->set('opcao1', 'Novo Projeto');
        $this->visao->set('opcao2', 'Abrir Projeto');
        $this->visao->set('opcao3', 'Configurações');
        $this->visao->set('opcao4', 'Importar Projeto');
        $this->visao->set('opcao5', 'Exportar Projeto');
        $this->visao->set('opcao6', 'Contatar');
        $this->visao->set('opcao1var', 'NovoProjeto');
        $this->visao->set('opcao2var', 'AbrirProjeto');
        $this->visao->set('opcao3var', 'Configuracoes');
        $this->visao->set('opcao4var', 'ImportarProjeto');
        $this->visao->set('opcao5var', 'ExportarProjeto');
        $this->visao->set('opcao6var', 'Contatar');
        $ini = parse_ini_file("../config/conf.ini"); //pega os dados do arquivo de configuração a qual facilita a manutençã0
        $this->visao->set('tituloMenu', $ini['nomeSoftware']);
        $this->visao->set('descricao', $ini['descricao']);
        $this->visao->set('autor', $ini['autor']);
        $this->visao->set('imagem1', $ini['imagem1']);
        $this->visao->set('imagem2', $ini['imagem2']);
        $this->visao->set('imagem3', $ini['imagem3']);
        # Diz ao nosso mecanismo de visão
        # para renderizar os seus dados
        # usando o arquivo de visão 
        # visoes/home/index.php
        $this->visao->render('home/index');
    }

}
