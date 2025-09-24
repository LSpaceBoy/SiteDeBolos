<?php
$host = "localhost";
$banco = "bolos";
$usuario = "root";
$senha = "";

// criar a conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// validar se a conexão deu certo
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
