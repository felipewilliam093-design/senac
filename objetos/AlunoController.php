<?php

include_once "configs/database.php";
include_once "aluno.php";

Class ALunoController{
    private $bd;
    private$aluno;

    public function __construct(){
        $banco = new Database();
        $this->bd = $banco->conectar();
        $this->aluno = new Aluno($this->bd);
    }

    public function index(){
        return $this->aluno->LerTodos();
    }
}