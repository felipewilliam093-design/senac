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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Rio Claro</title>
    <!-- CSS Externo -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="top-header">
    <div class="container header-container">
        <div class="user-info">
            <p><strong>Usuário logado:</strong> <?= $_SESSION['aluno']->nome ?></p>
            <a href="logout.php" class="btn btn-logout">Sair</a>
        </div>
    </div>
</header>

<main class="container main-content">
    <div class="page-header">
        <h1>Senac Rio Claro</h1>
        <!--Link da página Cadastro de Aluno-->
        <a href="cadastro.php" class="btn btn-primary">Cadastrar Aluno</a>
    </div>

    <section class="search-section card">
        <h3>Pesquisar Aluno</h3>
        <form method="POST" action="index.php" class="search-form">
            <div class="form-group">
                <label for="pesquisar">RA</label>
                <input type="number" name="pesquisar" id="pesquisar" placeholder="Digite o RA do aluno">
            </div>
            <button type="submit" class="btn btn-secondary">Pesquisar</button>
        </form>

        <?php if($a) : ?>
        <table class="styled-table mt-3">
            <thead>
                <tr>
                    <th>RA</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $a->ra; ?></td>
                    <td><?= $a->nome; ?></td>
                </tr>
            </tbody>
        </table>
        <?php endif; ?>
    </section>

    <section class="students-section card mt-4">
        <h2>Alunos Cadastrados</h2>
        <div class="table-responsive">
            <table class="styled-table full-width">
                <thead>
                    <tr>
                        <th>RA</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th colspan="3">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($alunos) : ?>
                    <?php foreach($alunos as $aluno) : ?>
                    <tr>
                        <td><a href="ver-aluno.php?ra=<?= $aluno->ra; ?>" class="link-ra"><?= $aluno->ra; ?></a></td>
                        <td><?= $aluno->nome; ?></td>
                        <td><?= $aluno->email;?></td>
                        
                        <td class="action-cell"><a href="atualizar.php?alterar=<?= $aluno->ra ?>" class="btn btn-sm btn-edit">Alterar</a></td>
                        <td class="action-cell"><a href="index.php?excluir=<?= $aluno->ra ?>" class="btn btn-sm btn-delete" onclick="return confirm('Deseja realmente excluir?')">Excluir</a></td>
                        <td class="action-cell"><a href="ver-aluno.php?ra=<?= $aluno->ra ?>" class="btn btn-sm btn-view">Visualizar</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum aluno cadastrado.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

</body>
</html>


