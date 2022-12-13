<?php
    include_once "PeixeDao.php";

    class PeixeController{
        private $dao;

        function __construct(){
            $this->dao = new PeixeDao();
        }

        function cadastrar_peixe($especie, $cor, $peso){
            $this->dao->cadastrar_peixe($especie, $cor, $peso);
        }

        function listar_peixes(){
            $peixes = $this->dao->listar_peixes();
            return $peixes;
        }

        function get_peixe($id){
            $peixe = $this->dao->get_peixe($id);
            return $peixe;
        }

        function alterar_peixe($id, $especie, $cor, $peso){
            $this->dao->alterar_peixe($id, $especie, $cor, $peso);
        }

        function excluir_peixe($id){
            $this->dao->excluir_peixe($id);
        }

    }
?>