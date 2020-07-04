<?php
require_once "banco.php";

if (!$conexao->query("DELETE FROM cliente WHERE id = " . $_REQUEST["id"] . ";")) {
    die("não foi possivel deletar");
}

header("Location: index.php");
