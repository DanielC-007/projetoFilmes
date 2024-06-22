create database projetoFilmes;
use projetoFilmes;


create table filme(
codigo_Filme int NOT NULL AUTO_INCREMENT,
nome_Filme varchar(100),
sinopse varchar(2000),
produtora varchar(50),
data_Lancamento int(4),
genero varchar(50),
orcamento double(12,2),
idioma varchar(15),
receita double(12,2),
PRIMARY KEY (codigo_Filme)
);
create table producaoFilme(
codigo_producaoFilme int NOT NULL AUTO_INCREMENT,
codigo_Filme int NOT NULL,
diretor varchar(25),
elenco varchar(200),
distribuicao varchar(100),
roteiro varchar(60),
musica varchar(100),
PRIMARY KEY (codigo_producaoFilme),
foreign key (codigo_Filme) REFERENCES filme(codigo_Filme)
);
create table complementaresFilmes(
codigo_Complementares int NOT NULL AUTO_INCREMENT,
codigo_Filme int NOT NULL,
imagem_Capa varchar(100),
link_Trailer1 varchar(2000),
link_Trailer2 varchar(2000),
PRIMARY KEY (codigo_Complementares),
foreign key (codigo_Filme) REFERENCES filme(codigo_Filme)
);