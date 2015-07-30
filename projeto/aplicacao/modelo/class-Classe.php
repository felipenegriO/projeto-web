<?php

class Classe {

    private $nome;
    private $metodos;
    private $contadorMetodo;
    private $conteudo;
    public function __construct($modificadorVisibilidade,$modificador,$nome,$extends,$implements,$pacote) {
        //nesta parte iremos criar a classe aqui verificando os modificadores para cria-la
        if(isset($pacote) && $pacote!== false ){
            $this->conteudo= "\npackage ".$pacote."; \n\n";
        }
        if(isset($modificadorVisibilidade) && $modificadorVisibilidade!== false ){
            $this->conteudo.=$modificadorVisibilidade;
        }
        if(isset($modificador) &&$modificador!== false ){
            $this->conteudo.=" abstract ";
        }
        $this->conteudo .= " Class ";
        if(isset($nome) &&$nome!== false ){
            $this->conteudo .=$nome;
        }
        if(isset($extends) &&$extends!== false ){
            $this->conteudo.=" extends ".$extends;
        }
        if(isset($implements) &&$implements!== false ){
            $this->conteudo.=" implements ".$implements;
        }
        
        $this->conteudo .= " { \n\n }";
        
        $this->metodos = [];
        $this->contadorMetodo = 0;
        $this->nome = $nome;
    }

    public function addMetodo($metodo) {//recebe o objeto do método
        $this->metodos[$this->contadorMetodo] = $metodo;
        $this->contadorMetodo++;
    }
    public function getClasse(){//aqui estou retornando a classe com seus metodos em string
        $aux ="";
        print count($this->metodos);
        for($i = 0;count($this->metodos) > $i;$i++){
            $aux= $this->metodos[$i]->getConteudo();
        }
        $arr = explode(" ",$this->conteudo);
        $arrNovo = "";
        $cont = 0;
        for($i = 0;count($arr)> $i;$i++){
        if( (isset($arr[$i])) && ($arr[$i] === '}')){
                $arrNovo[$cont]= $aux."\n";
                $cont++;
                $arrNovo[$cont]= "}";
            }else if(isset($arr[$i])){
                $arrNovo[$cont]= $arr[$i];
            }
            $cont++;
        }
        $arrNovo = explode(" ",implode(' ',$arrNovo));
        return $arrNovo;
    }
}
