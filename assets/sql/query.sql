#criar usuarios para acessar o mysql

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

update alunos
SET tur_ant = "f1c"
where codcur=22 and codper=2;

update usuarios
set curso = "f9"
where usuario = "lucas.assuncao";

select * from alunos
where codcur = 20 and codper = 3;

update alunos
SET
tur_ant = "i2"
where codcur=20 and codper=3;

update alunos
SET
tur_ant = "i1c"
where codcur=21 and codper=2;

update alunos
SET
tur_ant = "i2c"
where codcur=22 and codper=1;