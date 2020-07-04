<?php
require_once "banco.php";

if (!$conexao->query("UPDATE cliente SET nome = '" . $_REQUEST["nome"] . "', e_mail = '" . $_REQUEST["email"] . "', logradouro = '" . $_REQUEST["logradouro"] . "', numero = '" . $_REQUEST["numero"] . "', bairro = '" . $_REQUEST["bairro"] . "', cidade = '" . $_REQUEST["cidade"] . "', estado = '" . $_REQUEST["estado"] . "', telefone = '" . $_REQUEST["telefone"] . "' WHERE id = " . $_REQUEST["id"])) {
    echo "falha na criação: (" . $conexao->errno . ") " . $conexao->error;
}

header("Location: index.php");
