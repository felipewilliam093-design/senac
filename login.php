<?php

include_once "objetos/AlunoController.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["login"]) && isset($_POST["senha"])) {
        $controller = new AlunoController();
        $controller->login($_POST["login"], $_POST["senha"]);
    }
}

?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Senac Rio Claro</title>
    <!-- CSS Externo -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">

<div class="login-wrapper">
    <div class="card login-card">
        <div class="login-header">
            <h2>Senac Rio Claro</h2>
            <p>Acesse sua conta</p>
        </div>
        
        <form method="POST" action="login.php" class="login-form">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" id="login" name="login" placeholder="Digite seu usuário" required>
            </div>
            
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block mt-3">Entrar</button>
        </form>
    </div>
</div>

</body>
</html>