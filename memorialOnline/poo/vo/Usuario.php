<?php
    class Usuario {

        public $id;
        public $nome;
        public $cpf;
        public $email;
        public $senha;
        public $fk_nivel_acesso;
        public $cd_user;
        public $dt_user;
        public $foto;
        public $fk_status;

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

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }
        function getCpf() {
            return $this->cpf;
        }

        function setEmail($email) {
            $this->email = $email;
        }
        function getEmail() {
            return $this->email;
        }

        function setSenha($senha) {
            $this->senha = $senha;
        }
        function getSenha() {
            return $this->senha;
        }

        function setFkNivelAcesso($fk_nivel_acesso) {
            $this->fk_nivel_acesso = $fk_nivel_acesso;
        }
        function getFkNivelAcesso() {
            return $this->fk_nivel_acesso;
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

        function setFoto($foto) {
            $this->foto = $foto;
        }
        function getFoto() {
            return $this->foto;
        }

        function setStatus($fk_status) {
            $this->fk_status = $fk_status;
        }
        function getStatus() {
            return $this->fk_status;
        }
    }
?>