<?php
include_once ("objetos/AlunoController.php");

$controller = new AlunoController();

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ra'])){
$a = $controller->localizarAluno($_GET['ra']);
}

session_start();
if(!isset($_SESSION['aluno'])){
    header("location: login.php");
    exit();
}

//var_dump($a);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aluno: <?= $a->nome?></title>
</head>
<body>

<h1><?= $a->nome?></h1>

<a href="index.php">Voltar</a>

<p><strong>Email: </strong><?= $a->email?></p>
<p><strong>Telefone: </strong><?= $a->telefone?></p>
<p><strong>Login: </strong><?= $a->login?></p>

<?php if($a->imagem == "") : ?>
            <img style="width: 15%" src="imagens/image-fail.jpg">
        <?php else : ?>
            <img style="width: 15%;" src="uploads/<?= $a->imagem; ?>">
        <?php endif; ?>





</body>
</html>
