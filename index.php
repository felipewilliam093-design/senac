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
                <td><?php echo $a->ra; ?></td>
                <td><?php echo $a->nome; ?></td>
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
        <td><?php echo $aluno->ra; ?></td>
        <td><?php echo $aluno->nome; ?></td>
        <td><?php echo $aluno->email; ?></td>
        <td><?php echo $aluno->telefone; ?></td>
        <td><?php echo $aluno->login; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>


