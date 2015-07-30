<?php

class Palavra {

    private $arquivoTxt;
    private $palavra;
    private $contNaoReservada;
    private $contReservada;
    private $reservadas;
    private $naoReservadas;

    public function __construct($palavra) {
        $this->palavra = $palavra;
        $this->contNaoReservada = 0;
        $this->contReservada = 0;
        if (empty($reservadas)) {//setar vetor reservadas
            $this->reservadas[0] = '';
        }
        if (empty($naoReservadas)) {//setar vetor não reservadas
            $this->naoReservadas[0] = '';
        }
    }

    function getReservadas() {
        return $this->reservadas;
    }

    function getNaoReservadas() {
        return $this->naoReservadas;
    }

    //-----------------------------RECONHECIMENTO DE PALAVRAS ---------------------------------------------------------
    //--------------------RECONHECER PALAVRAS RESERVADAS E ADD A UMA MATRIZ--------------------
    // Neste caso a ordem de variavel sera definida como a primeira até a ultima na lista de valores nao reconhecidos...
    // ex. aaa class publico será reconhecido como public class aaa CASO o usuario diga um extends a seração será feita em dois vetores
    // da mesma forma, porém o segundo valor não reconhecido será interpretado como extends... 
    // aaa classe bb public extends ... Deve ser public class aaa extends bb uma vez que aaa e bb não são reconhecidos.

    function reconhecerPalavras() {
        for ($i = 0; $i < count($this->palavra); $i++) {//Organiza todas as palavras reservadas e não reservadas
            $analisada = $this->cacaPalavra($this->palavra[$i], $this->reservadas); //procucar palavra
            if ($analisada !== '') { //fluxo perfeito
                if (!$this->verificaDuplicidadePalavra($this->contReservada, $this->reservadas, $analisada)) {//caso nao exista add 
                    $this->reservadas[$this->contReservada] = $analisada;
                    $this->contReservada++;
                }
            } else {// --------------------ADD PALAVRAS NÃO RECONHECIDAS A VETOR--------------------
                $this->naoReservadas[$this->contNaoReservada] = $this->palavra[$i];
                $this->contNaoReservada++;
            }
        }
    }

    //------------------------------------------------------------------------------------------------------------	
    //classificar para palavras de um array
    //Aqui iremos descobrir qual a força de cada palavra ou seja dentre as palavras private extends classe aaa 
    //descobrir a qual se trata ou seja neste caso uma classe. E assim defini - la conforme os parametros passado.
    //para essa analise foi disposto em um arquivo txt em ordem de grandesa ou seja qual palavra vai definir a que vai ser construido

    function ordenarPalavras($palavra){
        $NunsArr = null; //converter palavra para seu peso (numero)
        for ($i = 0; $i < count($palavra); $i++) {
            $NunsArr[$i] = $this->verificaForcaPalavra($palavra[$i]);
        }
        $nova = null; //ordenar numeros
        for ($i = 0; $i < count($NunsArr); $i++) {
            for ($j = 0; $j < count($NunsArr); $j++) {
                if ($NunsArr[$i] < $NunsArr[$j]) {
                    $nova = $NunsArr[$i];
                    $NunsArr[$i] = $NunsArr[$j];
                    $NunsArr[$j] = $nova;
                }
            }
        }
        //converter peso da palavra na palavra
        $vetorPalavra = null;
        $arquivo = UtilitariosInterpretador::lerConfiguracao("forcadapalavra");
        $partes = UtilitariosInterpretador::lerArquivo($arquivo);
        for ($i = 0; $i < count($NunsArr); $i++) {
            for ($j = 0; $j < count($partes); $j++) {
                if ($partes[$j] == $NunsArr[$i]) {
                    $vetorPalavra[$i] = $partes[$j + 1];
                }
            }
        }
        return $vetorPalavra;
    }

    function verificaForcaPalavra($palavra) {
        $arquivo = UtilitariosInterpretador::lerConfiguracao("forcadapalavra");
        $partes = UtilitariosInterpretador::lerArquivo($arquivo);
        for ($j = 0; $j < count($partes); $j++) {
            if ($partes[$j] == $palavra) {
                return $partes[$j - 1];
            }
        }
    }

    //recebe uma palavra e um vetor de palavras que nao podem ser retornadas
    function cacaPalavra($palavra, $diferente) {
        $ini = parse_ini_file(UtilitariosInterpretador::lerConfiguracao("palavrasReservadas"));
        for ($j = 0; $j < count($diferente); $j++) {//for de $palavras já utilizadas 
            if (isset($ini[$palavra]) && ($ini[$palavra] <> $diferente[$j])) {
                return $ini[$palavra];
            }
        }
        return '';
    }

    function verificaDuplicidadePalavra($contReservada, $reservadas, $analisada) {
        $confirmarDuplicidade = false;
        for ($j = 0; $j < $contReservada; $j++) {// verifica duplicidade de argumentos no array reservadas
            if ($reservadas[$j] == $analisada) {
                $confirmarDuplicidade = true;
            }
        }
    }

}

?>