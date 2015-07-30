<?php

class Metodo {

    private $nome;
    private $conteudo;

    public function __construct($modificadorVisibilidade, $modificadorAcesso, $retorno, $nome, $parametros) {
        $this->conteudo.="\n	";
        if (isset($modificadorVisibilidade) && $modificadorVisibilidade !== false) {
            $this->conteudo = "	".$modificadorVisibilidade . " ";
        }
        if (isset($modificadorAcesso) && $modificadorAcesso !== false) {
            $this->conteudo.=$modificadorAcesso . " ";
        }
        if (isset($retorno) && $retorno !== false) {
            $this->conteudo.=$retorno . " ";
        }
        if (isset($nome) && $nome !== false) {
            $this->nome =$nome;
            $this->conteudo.=$nome;
        }
        
        $this->conteudo.=" ( ";
        
        if (isset($parametros) && $parametros !== false) {
            $this->conteudo.=$parametros;
        }
        
        $this->conteudo.=" ) { \n\n	} ";
    }
    
    public function getConteudo(){
        return $this->conteudo;
    }

}
