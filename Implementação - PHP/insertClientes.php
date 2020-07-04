<?php
require_once "banco.php";

if (!$conexao->query("INSERT INTO cliente(nome, e_mail, logradouro, numero, bairro, cidade, estado, telefone) VALUES
('" . $_REQUEST['nome'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['logradouro'] . "', " . $_REQUEST['numero'] . ", '" . $_REQUEST['bairro'] . "', '" . $_REQUEST['cidade'] . "', '" . $_REQUEST['estado'] . "', '" . $_REQUEST['telefone'] . "')")) {
    echo "falha na criação: (" . $conexao->errno . ") " . $conexao->error;
}

header("Location: index.php");