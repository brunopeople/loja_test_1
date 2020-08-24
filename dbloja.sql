create database dbloja;
create table funcionarios
(
	Id INT PRIMARY KEY auto_increment,
    NOME VARCHAR(60) NOT NULL,
    DATA_ENTRADA DATE NOT NULL,
    DATA_NASCIMENTO DATE NOT NULL,
    CARGO VARCHAR(255) NOT NULL
);