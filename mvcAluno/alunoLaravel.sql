create database alunoLaravel;
use alunoLaravel;

create table alunos(
	id int auto_increment primary key,
    nome varchar(100),
    email varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);