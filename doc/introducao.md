# Introdução

## Adianti Framework

> [!WARNING]
> Lembrando existe o Adianti Template e Adianti Framework, veja a diferença em [Apresentação > Ambiente](apresentacao.md#ambiente-adianti). Esse minicurso tem o foco no Adianti Framework



## Carregando o sistema

O que acontece quando chama seu sistema feito em Adianti ?

Acesse a url do Adianti Tutor como exemplo
https://framework.adianti.me/tutor/

1. chama o index.php
2. chama o inti.php
3. carrega o tema
4. inicia seção TSession
5. cerrega o menu.xml
6. chama o engine.php
7. chama o class padrão ou clicada no menu

# Index, Init, Engine

Toda aplicação inicia no arquivo `<RAIZ_SISTEMA>/index.php` *somente na primeira vez em que o usuário acessa o sistema ou sempre que o mesmo forçar a recarga da página (F5 ou CTRL+R)*. Isto ocorre por que toda a ação realizada é carregada por meio de requisições Javascript assíncronas, por meio do back-end `<RAIZ_SISTEMA>/engine.php`, não necessitando recarga da página. Em seguida é iniciada uma nova seção. TSession é a classe responsável por manipular a sessão. Logo depois é chamado o arquivo `<RAIZ_SISTEMA>/init.php` que carrega todas as libs e informações do arquivo `<RAIZ_SISTEMA>/app/config/application.ini`. Logo depois é carregado o tema, injetando as várias informações como: MENU, LIBRARIES, {class} e etc.


No arquivo `<RAIZ_SISTEMA>/index.php` tem a linha abaixo o atributo class é o nome da classe que é um controlador.
```php
AdiantiCoreApplication::loadPage($_REQUEST['class'], $method, $_REQUEST);
```
## Arquitetura

* Model: Uma entidade do modelo. Estas entidades manipulam dados e desempenham algumas regras de negócio. São representadas por classes armazenadas em app/model. Ex: Cliente, Venda, Pedido;

* View: Interface visual na fronteira entre o sistema e o usuário. Pode ser representada por um Template HTML (app/resources), ou um grupo de objetos compondo um objeto maior (app/view). Estes objetos geralmente lidam com aspectos de apresentação ou coleta de informações ao usuário final;

* Controller: Responsável por receber ações vindas de uma classe View e tomar ações. Coordena a sequência de atividades em resposta a uma ação. Para isto, geralmente interage com vários objetos Model para oferecer uma resposta ao objeto View; A telas criadas dinamicamente ficam aqui

* Service: Responsável por prestar um serviço para a aplicação (serviço interno), como, por exemplo, processar uma regra de negócio complexa, ou prestar um serviço para outra aplicação (ex: REST Service). Representada por uma classe armazenada na pasta app/service.


## Estrutura de diretórios
Um ponto importante é conhecer a [estrutura de diretórios](estrutra_dir.md) do adianti para iniciar o entendimento especialmente [arquivos na raiz](estrutra_dir.md#detalhando-direito-na-raiz-e-arquivos) e [diretório APP](estrutra_dir.md#detalhando-direito-na-app)

## Arquivo Application.ini
As configurações gereais do sistema ficam no arquivo `<RAIZ_SISTEMA>/app/config/application.ini` veja mais detalhes em [arquivo_config_app](arquivo_config_app.md)


## Apresentação, Tema e Layout

> [!WARNING]
> O Adianti framework utiliza o termo template para duas coisas diferentes:
* Template o esqueleto de sistema feito com Adianti, veja a diferença em [Apresentação > Ambiente](apresentacao.md#ambiente-adianti)
* Template o esquema layout para o sistema.

> [!TIP]
> Para evitar confusão desse ponto para frente o termo template será sempre o esqueleto de sistema e termo TEMA será usado para aparência (esquema cores, layout, fonte e etc).

Se acesse a url do Adianti Tutor nos dois links e repare as diferenças
* Bootstrap theme3- https://framework.adianti.me/tutor/
* Material theme4 - https://framework.adianti.me/tutor-material/

O Adianti tem dois temas básicos um com estilo BootStrap e outro com tema Material. O Tema é feito usando o [Twig](https://twig.symfony.com/) que é um motor de templates (template engine) para PHP. Ele permite separar a lógica da aplicação (PHP) da apresentação (HTML), promovendo uma arquitetura de código mais organizada e manutenível. Em conjunto com o [Admin LTE](https://adminlte.io/) para criar o Layout principal dos sistemas criados. O Layout pode ser no estilo bootstrap ou [Material](https://github.com/gurayyarar/AdminBSBMaterialDesign)

Os temas são responsivos: seja qual for o tamanho da tela vai acompanham a demanda, proporcionando uma experiência de uso facilitada. Os menus se adaptam automaticamente, permitindo uma navegação fluida em qualquer dispositivo. E não para por aí! Os formulários, datagrids e outros componentes também se ajustam perfeitamente ao espaço disponível.

Veja exemplos no Instragram do Adianti, exemplos da responsividade 
* [Veja exemplos gerais!](https://www.instagram.com/reel/Cu72aIZvb9F/)
* [Veja exemplo de formulários responsivos!](https://www.instagram.com/reel/CuFxt4aPlDk/)


No GitHub existe um projeto com vários temas. Veja https://github.com/bjverde/adianti-theme

<br>
<a href="https://www.youtube.com/watch?v=L8rqwF-VQqw">
    <br>Canal ScriptDevBR, no Youtube: Personalizando o Template do Adianti Framework
    <br><img src="https://img.youtube.com/vi/L8rqwF-VQqw/maxresdefault.jpg" width="400"/>
</a>


## Um controlador de página ou Tela
Uma página é representada por uma classe de controle, que poder conter diversos componentes do Framework: formulários, datagrids, campos, botões, links e etc.


As classes de controle podem ser filhas de TPage ou de TWindow.
* TPage são exibidas no quadro central do layout.
* TWindow são sempre exibidas em uma nova janela.
* outra opção é cortina lateral, geralmente com TPage.

Imagem de uma tela de exemplo
<br><img src="img/tela_tipo.png" width="500"/>


## Menu 

O menu é renderizado por meio da classe TMenuBar, que faz a sua interpretação. O Arquivo do menu fica em `<RAIZ_SISTEMA>/menu.xml` o menu é composto basicamente dos itens
* menuitem com o atributo label="Nome que vai aparecer"
* icon geralmente do font awesome, olhe o [Tutor no componente Ticon](https://framework.adianti.me//tutor/index.php?class=FormComponentsView) seguido da cor do icone
* action é nome da classe podendo ter o nome do metodo ou não

> [!IMPORTANT]
> Só crie um item de menu para uma classe que existe! Se criar sem existir vai gerar um erro!.

```xml
<?xml version="1.0" encoding="utf-8"?>
<menu>
  <menuitem label="Básico">
    <icon> fa-fw </icon>
    <menu>
      <menuitem label="Pessoa">
        <icon>fas:users fa-fw </icon>
        <action>PessoaList#method=onShow</action>
      </menuitem>
      <menuitem label="Telefone">
        <icon>fas:phone fa-fw </icon>
        <action>TelefoneList#method=onShow</action>
      </menuitem>
  </menuitem>
</menu>      
```


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