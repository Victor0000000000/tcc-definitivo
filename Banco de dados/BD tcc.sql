CREATE TABLE  `usuarios` (
  `nome`VARCHAR(40) NOT NULL ,
`email` VARCHAR(40) NOT NULL,
`senha` VARCHAR(40) NOT NULL,
 `cod` INT PRIMARY KEY,
 `data_nasc` VARCHAR(40) NOT NULL
);
CREATE TABLE curta (
     cod INT PRIMARY KEY,
     protagonista VARCHAR(255),
     titulo VARCHAR(255),
     video VARCHAR(255),
     imagem VARCHAR(255),
     sinopse TEXT,
     duracao TIME,
     Ano INT,
     Tema int,
     Genero int,
     titulo varchar(100),
 

FOREIGN KEY (Ano) REFERENCES ano (cod),
 FOREIGN KEY (Tema) REFERENCES tema (cod),
 FOREIGN KEY (Genero) REFERENCES genero (cod)
 );
 CREATE TABLE votacao (
    cod INT PRIMARY KEY,
    Data DATE,
    hora TIME,
    nota INT,
    codusa INT,
    codcurta INT,
    FOREIGN KEY (codusa) REFERENCES usuarios(cod),
    FOREIGN KEY (codcurta) REFERENCES curta(cod)
);
create table genero(
`descricao` VARCHAR(255),
   cod INT PRIMARY KEY
);
create table ano(
`descricao` VARCHAR(255),
   cod INT PRIMARY KEY
);
create table tema(
`descricao` VARCHAR(255),
   cod INT PRIMARY KEY
);
create table premiacao(
`Des` VARCHAR(255),
`cod` varchar(255),
`ano` varchar(255),
`obs` varchar(255),
   curta INT PRIMARY KEY
);
 
  