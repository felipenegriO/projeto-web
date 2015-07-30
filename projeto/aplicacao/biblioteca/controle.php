<?php

/**
 * 
 * Classe controle base para todos
 * os controles do nosso MVC em PHP.
 * Ela serve para compartilhar código
 * entre todos os controles.
 */
class Controle {

    /**
     * Variável usada como mecanismo
     * de renderização de visões.
     * O objeto Visao do arquivo visao.php
     */
    protected $visao = null;


    /* Construtor da classe, inicializando o
     * mecanismo de visão dos controles
     */
    public function __construct() {
        $this->visao = new Visao();
    }
    /**
     * Método index padrão usado
     * em todos os controles.
     */
    public function index() {
        die('Comando index do controle base');
    }

}
