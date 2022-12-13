<?php

    class Peixe {

        public $id;
        public $especie;
        public $cor;
        public $peso;

        function __construct($especie, $cor, $peso) {
            $this->especie = $especie;
            $this->cor = $cor;
            $this->peso = $peso;
        }

        function get_id(){
            return $this->id;
        }

        function set_id($id){
            $this->id = $id;
        }

        function get_especie(){
            return $this->especie;
        }

        function set_especie($especie){
            $this->especie = $especie;
        }

        function get_cor(){
            return $this->cor;
        }

        function set_cor($cor){
            $this->cor = $cor;
        }

        function get_peso(){
            return $this->peso;
        }

        function set_peso($peso){
            $this->peso = $peso;
        }

    }
?>