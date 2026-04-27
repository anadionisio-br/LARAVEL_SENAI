create database produtoLaravel;
use produtoLaravel;

create table produtos(
	id int auto_increment primary key,
    nome varchar(100),
    quantidade int,
    preco decimal(10,2),
    setor_id int,

    foreign key (setor_id) references setores(id)
);


create table setores(
	id int auto_increment primary key,
    nome varchar(100),
    numCorredor int NOT NULL,
	created_at timestamp null,
    updated_at timestamp null
);

create table detalheProduto(
	id int auto_increment primary key,
    descricao varchar(100),
    tamanho varchar(100),
    peso varchar(100),
	created_at timestamp null,
    updated_at timestamp null
    
);


select * from detalheProduto;