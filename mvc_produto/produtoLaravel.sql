create database produtoLaravel;
use produtoLaravel;

create table produtos(
	id int auto_increment primary key,
    nome varchar(100),
    quantidade varchar(100),
    preco varchar(100),
	created_at timestamp null,
    updated_at timestamp null
);

select * from produtos;