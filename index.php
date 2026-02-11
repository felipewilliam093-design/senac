<?php

include_once "objetos/AlunoController.php";

$controller = new AlunoController();
$alunos = $controller->index();
global $alunos;

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Rio Claro</title>
</head>
<body>

<h1>Senac Rio Claro</h1>
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


