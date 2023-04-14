<?php
    class Pet {

        public $id;
        public $nome;
        public $fk_raca_animal;
        public $data_nascimento;
        public $cd_user;
        public $dt_user;

        function setId($id) {
            $this->id = $id;
        }
        function getId() {
            return $this->id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }
        function getNome() {
            return $this->nome;
        }

        function setFkRacaAnimal($fk_raca_animal) {
            $this->fk_raca_animal = $fk_raca_animal;
        }
        function getFkRacaAnimal() {
            return $this->fk_raca_animal;
        }

        function setDataNascimento($data_nascimento) {
            $this->data_nascimento = $data_nascimento;
        }
        function getDataNascimento() {
            return $this->data_nascimento;
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