<?php

include_once "objetos/AlunoController.php";

session_start();
if(!isset($_SESSION['aluno'])){
    header("location: login.php");
    exit();
}

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

<p><strong>Usuário logado: </strong><?= $_SESSION['aluno']->nome ?>
 - <a href="logout.php">Sair</a> </p>

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
    </tr>

    <?php if($alunos) : ?>
    <?php foreach($alunos as $aluno) : ?>
    <tr>
        <td><a href="ver-aluno.php?ra= <?= $aluno->ra; ?>"><?= $aluno->ra; ?></a></td>
        <td><?= $aluno->nome; ?></td>
        <td><?= $aluno->email;?></td>

<!--        --><?php //if($aluno->imagem == "") : ?>
<!--            <td><img style="width: 5%" src="imagens/image-fail.jpg"></td>-->
<!--        --><?php //else : ?>
<!--            <td><img style="width: 5%;" src="uploads/--><?php //= $aluno->imagem; ?><!--"></td>-->
<!--        --><?php //endif; ?>

        <td><a href="atualizar.php?alterar=<?= $aluno->ra ?>">Alterar</a> </td>
        <td><a href="index.php?excluir=<?= $aluno->ra ?>">Excluir</a> </td>
        <td><a href="ver-aluno.php?ra=<?= $aluno->ra ?>">Visualizar</a> </td>

    </tr>
    <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>


