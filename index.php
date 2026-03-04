<?php

include_once "objetos/AlunoController.php";

$controller = new AlunoController();
$alunos = $controller->index();
global $alunos;
$a = null;

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["pesquisar"])){
        $a = $controller->pesquisaAluno($_POST["pesquisar"]);
    }
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["excluir"])){
        $a = $controller->excluirAluno($_GET["excluir"]);
        $a = $controller->atualizarAluno($_GET["alterar"]);
    }
}

?>


<!doctype html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Rio Claro</title>
    <!--    Estilização da tabela-->
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>
<body>

<h1>Senac Rio Claro</h1>

<!--Link da página Cadastro de Aluno-->
<a href="cadastro.php">Cadastrar Aluno</a>

<h3>Pesquisar Aluno</h3>

<form method="POST" action="index.php">
    <label>RA</label>
    <input typep="number" name="pesquisar">
    <button>Pesquisar</button>
</form>

<table>
    <tr>
        <td>RA</td>
        <td>Nome</td>
    </tr>

    <?php if($a) : ?>
<!--        <?php //foreach($a as $aluno) : ?> -->
            <tr>
                <td><?= $a->ra; ?></td>
                <td><?= $a->nome; ?></td>
            </tr>
<!--        --><?php //endforeach; ?>
    <?php endif; ?>

</table>

<h2>Alunos Cadastrados</h2>

<table>
    <tr>
        <td>RA</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Telefone</td>
        <td>Login</td>
    </tr>

    <?php if($alunos) : ?>
    <?php foreach($alunos as $aluno) : ?>
    <tr>
        <td><?= $aluno->ra; ?></td>
        <td><?= $aluno->nome; ?></td>
        <td><?= $aluno->email; ?></td>
        <td><?= $aluno->telefone; ?></td>
        <td><?= $aluno->login; ?></td>
        <td><a href="atualizar.php?alterar=<?= $aluno->ra ?>">Alterar</a> </td>
        <td><a href="index.php?excluir=<?= $aluno->ra ?>">Excluir</a> </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>


