#criar usuarios para acessar o mysql

create table funcionarios(
	id_funcionario int primary key auto_increment,
	chapa varchar(10) not null,
	nome_funcionario varchar(150) not null,
	nome_funcao varchar(50) not null,
	descricao_secao varchar(50) not null

)

create table comportamentos(
	id_comportamento int primary key auto_increment,
	nome_comportamento varchar(50) not null
);

insert into comportamentos VALUES
(default, 'DEMONSTRA DIFICULDADE'),
(default, 'EM AQUISIÇÃO'),
(default, 'BOM DESEMPENHO');




CREATE USER 'server'@'localhost' IDENTIFIED BY 'server';
GRANT ALL PRIVILEGES ON * . * TO 'server'@'localhost';


use csa;

update usuarios set id_perfil = 3 where usuario = 'lucas.assuncao';

INSERT INTO perfis VALUES 
(default, 'ANALISTA/PROFESSOR'),
(default, 'SECRETÁRIA'),
(default, 'ADMINISTRADOR');


update usuarios
set id_perfil  = 1
where id_perfil is null;

alter table usuarios
drop column admin; 

alter table usuarios
add id_perfil int;

create table perfis(
	id_perfil int primary key auto_increment,
	perfil varchar(150)
);

ALTER TABLE usuarios
add admin int;


update alunos
SET
tur_ant = "f3c"
where codcur=22 and codper=4;

