create database avaliacao;
use avaliacao;

create table Estoque(
	id int auto_increment primary key,
    nome varchar(255),
    tipoMateria varchar(255),
	dataFabricacao date, 
    quantidade int,
    preco varchar(255),
	created_at timestamp null,
    updated_at timestamp null
);
