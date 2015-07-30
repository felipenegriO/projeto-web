<?php

class Variavel {

    private $vetorvariavel;
    private $objSentenca;
    
    public function __construct($objSentenca,$vetorvariavel) {
        $this->vetorvariavel = $vetorvariavel;
        $this->objSentenca = $objSentenca;
    }

    function inserirVariavel() {
        $sentenca = $this->objSentenca->getSentenca();
        $cont = 0;
        $vetorvariavel = $this->vetorvariavel->getNaoReservadas();

        for ($i = 0; $i < count($sentenca); $i++) {
            for ($j = 0; $j < count($sentenca); $j++) {
                if ($sentenca[$i] == 'var') {
                    $sentenca[$i] = $vetorvariavel[$cont];
                    $cont++;
                }
            }
        }
        $this->objSentenca->setSentenca($sentenca);
        return $sentenca;
    }

}
