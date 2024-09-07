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


No Link a seguir detalha a estrutura de diretórios utilizada pelo Adianti framework. Todas os componente do framework estão localizados sob o diretório /lib/adianti. O diretório /lib ainda possui outras bibliotecas utilizadas pelo framework. O diretório app contém a aplicação desenvolvida. 



https://adiantiframework.com.br/estrutura

[Vídeo Estrutura do Projeto no Adianti Framework, por ScriptDevBR (Fabricio)](https://www.youtube.com/watch?v=1f3biISX4Ag)

# Navegação
* [Súmario](../README.md)
