<?php

class UtilitariosInterpretador {

    //este está todos os dados dos arquivos a serem utilizados...
    public function lerConfiguracao($nome) {
        $ini = parse_ini_file("../config/conf.ini");
        if (isset($ini[$nome])) {
            return $ini[$nome];
        } else {
            print "erro";
        }
    }

    public function verificapariedade($conteudo) {
        require_once 'modelo/class-Pilha.php';
        $p = new Pilha();
        $conteudo = implode(' ', $conteudo);
        $conteudo = explode(' ', $conteudo);

        for ($i = 0; $i < count($conteudo); $i++) {
            $pilha = $p->getLista();
            //  print_r($pilha);
            switch ($conteudo[$i]) {
                case "{":$p->empilha($conteudo[$i]);
                    break;
                case "}":$p->empilha($conteudo[$i]);
                    break;
                case "(":$p->empilha($conteudo[$i]);
                    break;
                case ")":$p->empilha($conteudo[$i]);
                    break;
            }
        }
        $lista = $p->getLista();
        for ($i = 0; $i < count($lista); $i++) {
            for ($j = 0; $j < count($lista); $j++) {
                if ($lista[$i] == '{' && $lista[$j] == '}') {
                    $p->remove($i);
                    $p->remove($j);
                }
                if ($lista[$i] == '(' && $lista[$j] == ')') {
                    $p->remove($i);
                    $p->remove($j);
                }
            }
        }
        $lista =$p->getLista();
        print "<br><br>";
        print_r($p->getLista());
        print "<br><br>";
        $arr = [];
        if (sizeof($p->getLista()) === 0) {
            return $conteudo;
        } else {

            for ($i = count($conteudo); $i > 0; $i--) {
                for ($j =1; $j <=  count($lista); $j++) {
                    if ($lista[$j] == '{') {
                        print "fooasdasdasdsaoi";
                        $arr[$cont] = '{';
                        $cont++;
                        $arr[$cont] = " ";
                        $cont++;
                        $arr[$cont] = "}";
                        $cont++;
                    } else if ($lista[$j] == '}') {
                        $arr[$cont] = "{";
                        $cont++;
                        $arr[$cont] = " ";
                        $cont++;
                        $arr[$cont] = $conteudo[$i];
                        $cont++;
                    } else if ($lista[$i] == '(') {
                        $arr[$cont] = $conteudo[$i];
                        $cont++;
                        $arr[$cont] = " ";
                        $cont++;
                        $arr[$cont] = ")";
                        $cont++;
                    } else if ($lista[$j] == ')') {
                        $arr[$cont] = "(";
                        $cont++;
                        $arr[$cont] = " ";
                        $cont++;
                        $arr[$cont] = $conteudo[$i];
                        $cont++;
                    }
                }
            }
            print "<br><br>";
            print "<br><br>";
            print_r($arr);
            print "teste <br><br>";
            print "<br><br>";
        }
        if (sizeof($arr) == 0) {
            return $conteudo;
        } else {
            return $arr;
        }
    }

    public function lerArquivoIni($arquivo) {
        return parse_ini_file($arquivo);
    }

    public function lerArquivo($arquivo) {
        return explode(' ', implode('', file($arquivo)));
    }

    public function lerArquivoProjeto() {
        require_once 'modelo/class-Projeto.php';
        $projeto = unserialize($_SESSION['projeto']);
        return implode('', file($projeto->getCaminho() . $projeto->getNomeProjeto() . ".java"));
    }

    public function reconherPalavra($palavra) {
        require_once("modelo/class-Palavra.php");
        $objPalavra = new Palavra($palavra);
        $objPalavra->reconhecerPalavras();
        return $objPalavra;
    }

    //método utilizado para converter string para array neste caso acada espaço a string é cortada
    public function stringParaArray($array) {
        $string = explode(" ", $array);
        return $string;
    }

    public function incluirVariaveis($sentenca, $variaveis) {
        require_once("modelo/class-Variavel.php");
        $objVariavel = new Variavel($sentenca, $variaveis);
        return $objVariavel->inserirVariavel();
    }

    public function setarVariaveis() {
        $ini = parse_ini_file("../config/conf.ini"); //pega os dados do arquivo de configuração a qual facilita a manutençã0
        $this->visao->set('tituloMenu', $ini['nomeSoftware']);
        $this->visao->set('descricao', $ini['descricao']);
        $this->visao->set('autor', $ini['autor']);
        $this->visao->set('mic', '../imagens/mic.gif');
        $this->visao->set('titulo', 'Editor');
    }

}
