<?php
$clientes = $conexao->query("SELECT * FROM cliente;");

if (!$clientes) {
    die("Não foi possivel obter a lista de clientes.");
}
