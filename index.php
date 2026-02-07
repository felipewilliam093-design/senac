<?php
include_once "configs/database.php";

$banco = new Database();
$bd = $banco->conectar();

if ($bd) {
    $sql = "select * from alunos";
    $resultado = $bd->query($sql);
    $resultado->execute();
    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $aluno) {
        echo $aluno['nome'] . "<br>";
        echo $aluno['email'] . "<br>";
        echo $aluno['telefone'] . "<br>";
        echo $aluno['login'] . "<br>";
        echo $aluno['senha'] . "<br>";
    }
} else {
    echo "Falha ao conectar com o banco de dados";
}