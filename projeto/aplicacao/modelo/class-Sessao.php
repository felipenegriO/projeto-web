<?php
	class Sessao{
		private $sessao;
		
		function __construct($sessao) {
			$this->sessao = $sessao;
		}
		
		function iniciarSessao(){
			if(empty($_SESSION[$this->sessao])){
				$_SESSION[$this->sessao] = " ";
			}
			if(isset($_SESSION[$this->sessao])){
				$_SESSION[$this->sessao];
			}
		}
		
		function setSessao($sessao){
			$this->sessao = $sessao;
		}
		
		function getSessao(){
			return $this->sessao;
		}
		
		function destruirSessao(){
			unset($_SESSION[$this->sessao]);
		}
			
	}
?>