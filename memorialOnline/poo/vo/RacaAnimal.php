<?php
    class RacaAnimal {

        public $id;
        public $fk_categoria_animal;
        public $descricao;
        public $cd_user;
        public $dt_user;

        function setId($id) {
            $this->id = $id;
        }
        function getId() {
            return $this->id;
        }

        function setFkCategoriaAnimal($fk_categoria_animal) {
            $this->fk_categoria_animal = $fk_categoria_animal;
        }
        function getFkCategoriaAnimal() {
            return $this->fk_categoria_animal;
        }

        function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
        function getDescricao() {
            return $this->descricao;
        }

        function setCdUser($cd_user) {
            $this->cd_user = $cd_user;
        }
        function getCdUser() {
            return $this->cd_user;
        }

        function setDtUser($dt_user) {
            $this->dt_user = $dt_user;
        }
        function getDtUser() {
            return $this->dt_user;
        }
    }
?>