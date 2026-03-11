<?php

Class Aluno{
    public $ra;
    public $nome;
    public $email;
    public $telefone;
    public $login;
    public $senha;
    public $img;
    public $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function LerTodos(){
        $sql = "SELECT * FROM alunos";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaAluno($ra){
        $sql = "SELECT * FROM alunos WHERE RA = :ra";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":ra", $ra);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

    public function cadastrar(){
        $sql = "INSERT INTO alunos(nome, email, telefone, login, senha, imagem) VALUES(:nome, :email, :telefone, :login, :senha, :imagem)";

        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":imagem", $this->img, PDO::PARAM_STR);


        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function excluir(){
        $sql = "DELETE FROM alunos WHERE ra = :RA";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":RA", $this->ra, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function atualizar(){
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "UPDATE alunos SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, login = :login WHERE ra = :RA";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindParam(":RA", $this->ra, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function buscaAluno($ra){
        $sql = "SELECT * FROM alunos WHERE RA = :RA";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":RA", $ra);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

}