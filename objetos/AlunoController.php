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

    public function pesquisaAluno($ra){
        return $this->aluno->PesquisaAluno($ra);
    }

    public function cadastrarAluno($dados){

        $this->aluno->nome = $dados["nome"];
        $this->aluno->email = $dados["email"];
        $this->aluno->telefone = $dados["telefone"];
        $this->aluno->login = $dados["login"];
        $this->aluno->senha = $dados["senha"];

        if($this->aluno->Cadastrar()){
            header("location: index.php");
            exit();
        }
    }

    public function excluirAluno($ra){
        $this->aluno->ra = $ra;

        if($this->aluno->Excluir()){
            header("location: index.php");
        }
    }

    public function atualizarAluno($dados){
        $this->aluno->ra = $dados["ra"];
        $this->aluno->nome = $dados["nome"];
        $this->aluno->email = $dados["email"];
        $this->aluno->telefone = $dados["telefone"];
        $this->aluno->login = $dados["login"];
        $this->aluno->senha = $dados["senha"];

        if($this->aluno->Atualizar()){
            header("location: index.php");
        }
    }

    public function localizarAluno($ra){
        return $this->aluno->buscaAluno($ra);

    }
}