<?php
$servername = "localhost";
$username = "root";
$password = "";

// Cria a conexão
$conexao = new mysqli($servername, $username, $password);

// Checa a conexão
if ($conexao->connect_error) {
    die("Falha na Conexão: " . $conexao->connect_error);
}

// Banco de Dados 
if (!$conexao->query("CREATE DATABASE IF NOT EXISTS transportadora;")) {
    die("Erro na criação do danco de dados.");
}

if (!$conexao->query("USE transportadora;")) {
    die("Erro no uso do banco de dados 'transportadora'.");
}

// Tabela Endereço
if (!$conexao->query("CREATE TABLE IF NOT EXISTS endereco (
	id INT NOT NULL AUTO_INCREMENT,
    logradouro VARCHAR(45),
    numero INT(5),
    bairro VARCHAR(45),
    cidade VARCHAR(25),
    estado VARCHAR(25),
    PRIMARY KEY (id)
);")) {
    die("Erro na criação da tabela 'endereco'.");
}

// Tabela Tamanho
if (!$conexao->query("CREATE TABLE IF NOT EXISTS tamanho (
	id INT NOT NULL AUTO_INCREMENT,
    largura INT(5),
    altura INT(5),
    comprimento INT(5),
    PRIMARY KEY (id)
);")) {
    die("Erro na criação da tabela 'tamanho'.");
}

// Tabela Status_Pacote
if (!$conexao->query("CREATE TABLE IF NOT EXISTS statuspacote (
	id INT NOT NULL AUTO_INCREMENT,
    cancelado INT(1),
    entregue INT(1),
    emprocessamento INT(1),
    emtransporte INT(1),
    PRIMARY KEY (id)
);")) {
    die("Erro na criação da tabela 'statuspacote'.");
}

// Tabela Cliente
if (!$conexao->query("CREATE TABLE IF NOT EXISTS cliente (
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30),
    e_mail VARCHAR(45),
	logradouro VARCHAR(45),
    numero INT(5),
    bairro VARCHAR(45),
    cidade VARCHAR(25),
    estado VARCHAR(25),
    telefone VARCHAR(15),
    PRIMARY KEY (id)
);")) {
    die("Erro na criação da tabela 'cliente'.");
}

// Tabela Pacote
if (!$conexao->query("CREATE TABLE IF NOT EXISTS pacote (
	id INT NOT NULL AUTO_INCREMENT,
    id_endereco INT NOT NULL,
	id_tamanho  INT NOT NULL,
	id_statuspacote  INT NOT NULL,
	id_cliente  INT NOT NULL,
    datadeentrada DATE,
    dataprevistaparaentrega DATE,
    peso DECIMAL(4,3),
    FOREIGN KEY (id_endereco) REFERENCES endereco (id),
    FOREIGN KEY (id_tamanho) REFERENCES tamanho (id),
	FOREIGN KEY (id_statuspacote) REFERENCES statuspacote (id),
    FOREIGN KEY (id_cliente) REFERENCES cliente (id),
    PRIMARY KEY (id)
);")) {
    die("Erro na criação da tabela 'pacote'.");
}
