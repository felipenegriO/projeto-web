<?php

class Sentenca {

    private $objP;
    private $sentenca;
    
    public function getSentenca() {
        return $this->sentenca;
    }
    public function setSentenca($sentensa) {
        $this->sentensa = $sentensa;
    }
    public function __construct($objP) {
        $this->sentensa = null;
        $this->objP = $objP;
        $this->criarSentenca();
    }

    //aqui se ordena as palavras reservadas
    private function criarSentenca() {
        $vetorOrdenado = $this->objP->ordenarPalavras($this->objP->getReservadas());
        $sentenca = null;
        $cont = 0;
        $arquivo = UtilitariosInterpretador::lerConfiguracao("sentenca");
        $ini = UtilitariosInterpretador::lerArquivoIni($arquivo);
        for ($i = 0; $i < count($vetorOrdenado); $i++) {
            if (isset($ini[$vetorOrdenado[$i]])) {
                $sentenca[$cont] = $ini[$vetorOrdenado[$i]] . " ";
                $cont++;
            }//algumas exceções 
             if($vetorOrdenado[$i] ==='public' && $vetorOrdenado[$i+1] === 'metodo'){
                     $sentenca[$cont]='var';
                     $cont++;
            }
        }
        $this->sentenca = $sentenca;
    }

    //aqui define-se qual a funcao a ser feita
    function ClassificarSentenca($vetorOrdenado) {
        if (count($vetorOrdenado) > 0) {
           
            $arquivo = UtilitariosInterpretador::lerConfiguracao("operacao");
            $linhas = UtilitariosInterpretador::lerArquivo($arquivo);
            
            $vetor = explode(' ', implode('', $vetorOrdenado));
            for ($j = 0; $j < count($linhas); $j++) {
                for ($i = 0; $i < count($vetor); $i++) {
                    if ($linhas[$j] == $vetor[$i]) {
                        return $vetor[$i];
                    }
                }
            }
        }
        
       
    }

    function VerificaSentenca($conteudo, $op) {
        if ($op == "class") {
            for ($i = 0; $i < count($conteudo); $i++) {
                if ($conteudo[$i] == $op) {
                    return true;
                }
            }
        } else {
            return false;
        }
    }



    function implementarSintaxe($op, $frase) {
        $Frasefinal = null;
        for ($j = 0; $j < count($frase); $j++) {
            $Frasefinal[$j] = $frase[$j];
        }
        
        $arquivo = UtilitariosInterpretador::lerConfiguracao("caracteresEspeciais");
        $ini = UtilitariosInterpretador::lerArquivoIni($arquivo);
        
        if (isset($ini[$op])) {
            $Frasefinal[$j] = $ini[$op];
        } else {//arquivo caracteres especiais
            //print "erro, não foi encontrado no arquivo de caracteres especiais: ".$op;
        }
        if (count($Frasefinal) > 0) {
            $this->sentensa =  explode(' ', implode('', $Frasefinal));
        }
    }

}

?>