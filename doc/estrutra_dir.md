# Estrutura de diretórios

Um ponto importante é conhecer o a estrutura de diretórios do Adianti.

A estrutura pode ser separada basicamente em 6 partes: 
1. diretório APP - contém a aplicação desenvolvida
2. diretório LIB  - possui outras bibliotecas utilizadas pelo framework
3. diretório LIB/ADIANTI  - o frame work propriamente dito
4. diretório TMP  - arquivos temporários
5. diretório VENDOR  - bibliotecas utilizadas pelo framework, instalada vai composer
6. arquivo na raiz

## Detalhando direito na raiz e arquivos
* cmd.php - Utilitário para execuções em linha de comando
* download.php - Script auxiliar para download de arquivos
* engine.php - Motor de execução do Framework
* index.php - Ponto de entrada para a aplicação
* init.php - Carregamento das classes do Framework
* menu.xml - Estrutura do menu da aplicação
* rest.php - Servidor REST embarcado

## Detalhando direito na APP 
* app (diretório) - Contém a aplicação desenvolvida
  * config (diretório) - Arquivos de configuração da aplicação e do BD
  * control (diretório) - Classes controladoras da aplicação
  * database (diretório) - Bancos de dados locais (ex: sqlite)
  * images (diretório) - Imagens da aplicação
  * lib (diretório) - Bibliotecas e componentes específicos da aplicação
  * model (diretório) - Classes de modelo da aplicação (entities)
  * output (diretório) - Arquivos temporários gerados (Ex. relatórios)
  * reports (diretório) - Relatórios em XML, criados no Adianti PDF Designer
  * resources (diretório) - Fragmentos HTML para usar em templates
  * service (diretório) - Serviços disponibilizados pela aplicação
  * templates (diretório) - Templates da aplicação (Layout)
  * view (diretório) - Classes de apresentação reutilizáveis


## Detalhando os outros direitos
Nos Links abaixos detalha a estrutura de diretórios utilizada pelo Adianti framework.

https://adiantiframework.com.br/estrutura

<br>
<a href="https://www.youtube.com/watch?v=1f3biISX4Ag">
    <br>Vídeo Estrutura do Projeto no Adianti Framework, por ScriptDevBR (Fabricio)
    <br><img src="https://img.youtube.com/vi/1f3biISX4Ag/maxresdefault.jpg" width="400"/>
</a>

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
