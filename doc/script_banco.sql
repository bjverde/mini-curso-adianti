PRAGMA foreign_keys=OFF; 
DROP TABLE if exists endereco;
DROP TABLE if exists telefone;
DROP TABLE if exists pessoa;
DROP TABLE if exists tipo;
DROP TABLE if exists municipio;
DROP TABLE if exists uf;
DROP TABLE if exists regiao;

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

 
INSERT INTO tipo (idtipo,descricao,dat_exclusao) VALUES (1,'pessoal',null); 
INSERT INTO tipo (idtipo,descricao,dat_exclusao) VALUES (2,'comercial',null); 
INSERT INTO tipo (idtipo,descricao,dat_exclusao) VALUES (3,'cobrança',null); 


INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (1,'Norte',null); 
INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (2,'Nordeste',null); 
INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (3,'Sudeste',null); 
INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (4,'Centro-Oeste',null); 
INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (5,'Sul',null); 
INSERT INTO regiao (cod_regiao,nom_regiao,dat_exclusao) VALUES (9,'Brasil',null); 

-- Incluido UF
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (11,'RO','RONDONIA',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (12,'AC','ACRE',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (13,'AM','AMAZONAS',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (14,'RR','RORAIMA',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (15,'PA','PARA',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (16,'AP','AMAPA',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (17,'TO','TOCANTINS',1);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (21,'MA','MARANHAO',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (22,'PI','PIAUI',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (23,'CE','CEARA',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (24,'RN','RIO GRANDE DO NORTE',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (25,'PB','PARAIBA',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (26,'PE','PERNAMBUCO',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (27,'AL','ALAGOAS',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (28,'SE','SERGIPE',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (29,'BA','BAHIA',2);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (31,'MG','MINAS GERAIS',3);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (32,'ES','ESPIRITO SANTO',3);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (33,'RJ','RIO DE JANEIRO',3);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (35,'SP','SAO PAULO',3);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (41,'PR','PARANA',4);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (42,'SC','SANTA CATARINA',4);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (43,'RS','RIO GRANDE DO SUL',4);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (50,'MS','MATO GROSSO DO SUL',5);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (51,'MT','MATO GROSSO',5);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (52,'GO','GOIÁS',5);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (53,'DF','DISTRITO FEDERAL',5);
INSERT INTO uf (cod_uf,sig_uf,nom_uf,cod_regiao) VALUES (99,'UC','Unico',9);
