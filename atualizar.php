<?php
include_once ("objetos/AlunoController.php");

$controller = new AlunoController();

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['alterar'])){
    $a = $controller->localizarAluno($_GET['alterar']);
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aluno'])){
    $a = $controller->atualizarAluno($_POST['aluno']);
}else{
    header("location: index.php");
}

?>



<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Aluno</title>
</head>
<body>

<h1>Atualização de alunos</h1>

<a href="index.php">Voltar</a>

<form action="atualizar.php" method="post">
    <input type="text" name="aluno[ra]" value="<?= $a->ra ?>" hidden>
    <label>Nome</label>
    <input type="text" name="aluno[nome]" value="<?= $a->nome ?>"<br><br>
    <label>e-mail</label>
    <input type="email" name="aluno[email]" value="<?= $a->email ?>"><br><br>
    <label>Telefone</label>
    <input type="tel" name="aluno[telefone]" value="<?= $a->telefone ?>"><br><br>
    <label>Login</label>
    <input type="text" name="aluno[login]" value="<?= $a->login ?>"><br><br>
    <label>Senha</label>
    <input type="password" name="aluno[senha]" value="<?= $a->senha ?>"><br><br>

    <button name="atualizar">Atualizar</button>
</form>

</body>
</html>