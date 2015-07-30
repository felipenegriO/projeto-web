<?php
class Pilha {

    private $lista = [];
    private $topo = -1;
    
    public function getLista(){
        return $this->lista;
    }
    public function empilha($valor) {
        $this->topo++;
        $this->lista[$this->topo] = $valor;
    }

    public function remove($posicao) {
        if($this->_isset())
            unset($this->lista[$posicao]);
            $this->topo--;
    } 

    public function _isset() {
        $ret = true;

        if($this->topo < 0) {
            $ret = false;
        }

        return $ret;
    }

    public function getTopo(){
        return $this->lista[$this->topo];
    }
}