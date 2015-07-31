<?php

require_once 'biblioteca/requisicao.php';
require_once 'biblioteca/visao.php';
require_once 'biblioteca/controle.php';
require_once 'biblioteca/config.php';
require_once 'biblioteca/banco.php';
require_once 'modelo/class-Projeto.php';
require_once 'modelo/class-Pacote.php';
require_once 'modelo/class-Classe.php';
require_once 'modelo/class-Metodo.php';
session_start();

if (!isset($_SESSION['usuario']) == true and empty($_SESSION['usuario'])) {//aqui define primeiro acesso
    $_SESSION['usuario'] = "teste";//só para testar aqui vai o usuario logado
    run();//chama o metodo para construir a pagina
} else {//caso já esteja logado vamos para outras verificacoes
    if (isset($_SESSION['projeto']) == true) {//aqui verifica se existe um projeto aberto...
        //este é aberto definido na sessao projeto
        //se sim fazemos com que seja direcionado para pagina de edicao
        $controle = Requisicao::set('controle','Interpretador');
        run();
    } else {//caso nao exista projeto vamos ver setar a ação requerida.. 
        $confere = false;
        if (isset($_GET['acao']) == true) {
            $acao = $_GET['acao'];
            unset($_GET['acao']);
            $confere = true;
        }
        if (isset($_GET['controle']) == true) {
            $acao = $_GET['controle'];
            unset($_GET['controle']);
            $confere = true;
        }
        if ($confere) {
            $confere = false;
            run();
        }
    }
}

function run() {
    if (isset($_GET['acao'])) {
        $acao = $_GET['acao'];
    }
    /* @var $controle type */
    $controle = Requisicao::get('controle');
    /* @var $acao type */
    $acao = Requisicao::get('acao');

    if ($controle == '') {
        # agora definimos um controle padrão
        # quando nenhum controle for informado
        $controle = "Home";
    }

    # verifica se o arquivo de controle existe na pasta controle
    if (file_exists("controles/{$controle}Controle.php")) {
        # inclui o controle na página
        require_once "controles/{$controle}Controle.php";
    } else {
        die("O controle <strong>{$controle}</strong> 
        não existe na pasta controle do MVC");
    }

# adiciona a terminação Controle
# ao nome do controle
    $controle .= 'Controle';

# instancia o controle
    $controle = new $controle();
# agora,verificamos de a ação foi informada
    if ($acao == "") {
        # se não informamos a ação
        # usamos o método padrão index
        $acao = 'index';
    }

# verifica se o método existe no objeto controle
    if (method_exists($controle, $acao)) {
        # se existir, executa o método
        $controle->$acao();
    } else {
        # se não existir, emite uma mensagem de erro
        die('Page not found!!!' . "controle: " . "acao: " . $acao . "/");
    }
}
