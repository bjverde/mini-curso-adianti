PRAGMA foreign_keys=OFF; 

CREATE TABLE endereco( 
      idendereco  INTEGER    NOT NULL  , 
      idpessoa int   NOT NULL  , 
      idtipo_endereco int   NOT NULL  , 
      cod_municipio int   NOT NULL  , 
      endereco varchar  (300)   NOT NULL  , 
      cidade varchar  (300)   , 
      cep varchar  (8)   , 
      numero varchar  (5)   , 
      complemento varchar  (300)   , 
      bairro varchar  (300)   , 
      dat_inclusao datetime   NOT NULL  , 
      dat_alteracao datetime   , 
      dat_exclusao datetime   , 
 PRIMARY KEY (idendereco),
FOREIGN KEY(idpessoa) REFERENCES pessoa(idpessoa),
FOREIGN KEY(idtipo_endereco) REFERENCES tipo(idtipo),
FOREIGN KEY(cod_municipio) REFERENCES municipio(id_municipio)) ; 

CREATE TABLE municipio( 
      id_municipio  INTEGER    NOT NULL  , 
      cod_uf int   NOT NULL  , 
      nom_municipio varchar  (200)   NOT NULL  , 
      dat_exclusao datetime   , 
 PRIMARY KEY (id_municipio),
FOREIGN KEY(cod_uf) REFERENCES uf(cod_uf)) ; 

CREATE TABLE pedido( 
      idpedido  INTEGER    NOT NULL  , 
      idpessoa int   NOT NULL  , 
      dat_pedido datetime   NOT NULL  , 
      idtipo_pagamento int   NOT NULL  , 
 PRIMARY KEY (idpedido),
FOREIGN KEY(idtipo_pagamento) REFERENCES tipo(idtipo),
FOREIGN KEY(idpessoa) REFERENCES pessoa(idpessoa)) ; 

CREATE TABLE pessoa( 
      idpessoa  INTEGER    NOT NULL  , 
      nome varchar  (200)   NOT NULL  , 
      cpf varchar  (11)   , 
      dat_nascimento date   , 
      id_municipio_nascimento int   , 
      dat_inclusao datetime   NOT NULL  , 
      dat_alteracao datetime   , 
      dat_exclusao datetime   , 
 PRIMARY KEY (idpessoa),
FOREIGN KEY(id_municipio_nascimento) REFERENCES municipio(id_municipio)) ; 

CREATE TABLE regiao( 
      cod_regiao  INTEGER    NOT NULL  , 
      nom_regiao varchar  (45)   NOT NULL  , 
      dat_exclusao datetime   , 
 PRIMARY KEY (cod_regiao)) ; 

CREATE TABLE telefone( 
      idtelefone  INTEGER    NOT NULL  , 
      numero varchar  (45)   NOT NULL  , 
      idpessoa int   NOT NULL  , 
      idtipo_telefone int   NOT NULL  , 
      idendereco int   , 
      sit_fixo char  (1)   , 
      whastapp char  (1)   , 
      telegram char  (1)   , 
      dat_inclusao datetime   NOT NULL  , 
      dat_alteracao datetime   , 
      dat_exclusao datetime   , 
 PRIMARY KEY (idtelefone),
FOREIGN KEY(idpessoa) REFERENCES pessoa(idpessoa),
FOREIGN KEY(idtipo_telefone) REFERENCES tipo(idtipo),
FOREIGN KEY(idendereco) REFERENCES endereco(idendereco)) ; 

CREATE TABLE tipo( 
      idtipo  INTEGER    NOT NULL  , 
      descricao varchar  (100)   NOT NULL  , 
      dat_exclusao datetime   , 
 PRIMARY KEY (idtipo)) ; 

CREATE TABLE uf( 
      cod_uf  INTEGER    NOT NULL  , 
      cod_regiao int   NOT NULL  , 
      nom_uf varchar  (45)   NOT NULL  , 
      sig_uf varchar  (45)   NOT NULL  , 
      dat_exclusao datetime   , 
 PRIMARY KEY (cod_uf),
FOREIGN KEY(cod_regiao) REFERENCES regiao(cod_regiao)) ; 

 
 INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (1,'Norte',null); 

INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (2,'Nordeste',null); 

INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (3,'Sudeste',null); 

INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (4,'Centro-Oeste',null); 

INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (5,'Sul',null); 

INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (9,'Brasil',null); 

INSERT INTO tipo (idtipo,descricao,dat_exclusao) VALUES (1,'pessoal',null); 

INSERT INTO tipo (idtipo,descricao,dat_exclusao) VALUES (2,'comercial',null); 

INSERT INTO tipo (idtipo,descricao,dat_exclusao) VALUES (3,'cobrança',null); 

INSERT INTO uf (cod_uf,cod_regiao,nom_uf,sig_uf,dat_exclusao) VALUES (11,1,'RONDONIA','RO',null); 
