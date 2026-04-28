create database empresaLaravel;
use empresaLaravel;

create table Funcionarios(
	id int auto_increment primary key,
    nome varchar(255),
    cargo varchar(255),
    email varchar(255),
    dataAdmissao date, 
    salario int,
    sobrenome varchar(255),
	created_at timestamp null,
    updated_at timestamp null
);

create table dadosPessoais(
	id int auto_increment primary key,
    cpf varchar (255),
    rg varchar (255),
    data_nascimento date,
    cep varchar(255),
	created_at timestamp null,
    updated_at timestamp null
);

create table Departamento(
	id int auto_increment primary key,
	nome varchar(255),
    dataCriacao date,
    sigla varchar(255),
    orcamento int,
	created_at timestamp null,
    updated_at timestamp null
);

select * from Funcionarios;
select * from dadosPessoais;
select * from Departamento;