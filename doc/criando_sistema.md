# Criando sistema

Essa seção tem como objetivo de ser um guia das etapas para criar um sistema em adianti, mostrando os pontos principais. Se for a sua primeira leitura use apenas para ter um visão geral do processo. Não é o momento de aprofundar, faça isso depois de ver todo o curso.

## 1 Ambiente e infraestrutura 

### 1.1 Banco de Dados
Tenha um banco de dados relacional: SqLite, MySql/MariDb, Oracle, PostgreSQL, SqlServer

### 1.2 Baixar o Adianti FrameWork
Você baixar o [Adianti FrameWork](https://adiantiframework.com.br/) original ou um [Adianti Fork FrameWork](https://github.com/bjverde/adianti-fork-framework)

### 1.3 Instalar
Faça a [Instalação](instalacao.md)

## 2 Configuração inicial

### 2.1 Banco de dados modelado
Tenha um banco de dados modelado e/ou iniciado para o seu sistema. Lembre-se de seguir as [dicas modelagem](banco_model.md#dicas-para-modelar-o-banco-de-dados)

### 2.2 Configura o application.ini
As configurações gerais do sistema ficam no arquivo `<RAIZ_SISTEMA>/app/config/application.ini` veja mais detalhes em [arquivo_config_app](arquivo_config_app.md)

### 2.3 Configura o banco
[Veja como configura o banco de dados no sistema](banco_model.md#arquivo-config)

## 3 Desenvolvimento

### 3.1 Criar models
[Veja em Banco de dados > Model](banco_model.md#classe-modelo)

### 3.3 Criar telas
[Crie as telas seguindo as dicas](telas.md)

### 3.4 Alterar o Menu
Siga as intruções conforme [introdução > Menu](introducao.md#menu)

# Navegação
* [Súmario](../README.md)
    * [Apresentação e Visão geral](apresentacao.md)
    * [Conhecimentos requeridos](conhecimento_requerido.md)
    * [Criando Sistema](criando_sistema.md)
    * [Instalação](instalacao.md)
    * [Introdução](introducao.md)
        * [Estrutura de diretórios](estrutra_dir.md)
        * [Arquivo Application.ini](arquivo_config_app.md)
    * [Banco de dados](banco_model.md)
    * [Telas](telas.md)
        * [Componentes](componentes.md)
        * [Grids](data_grid.md)
    * [Vídeos complementares sobre Adianti no YouTube](videos_youtube.md)