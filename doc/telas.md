# Telas

As telas do Adianti são compostas por vários elementos !

> [!IMPORTANT]
> Para o Pablo Dall’Oglio é criado do Adianti. Na arquitetura padrão as telas criadas dinamente são Controller. As View são HTML com elementos injetados.

Qualquer elemento a ser apresentado pelo Framework deve estar contido em uma página (Controller em `<RAIZ_SISTEMA>/app/control/SuaClasse.php'). Para criarmos uma nova página, devemos criar uma classe. Existem basicamente dois controladores de páginas: TPage e TWindow. Qualquer página deve ser subclasse de um desses dois controladores padrão.
* TPage são exibidas no quadro central do layout.
* TWindow são sempre exibidas em uma nova janela.
* outra opção é cortina lateral, geralmente com TPage.

> [!IMPORTANT]
> Para sistema que serão usados também no celular ou exclusivamente no celular. Evite usar Janelas! Pois vai perder uma parte considerável da responsividade. Prefira cortina lateral. 
> Esse minicurso *NÃO* vai tratar TWindow. 

A classe a seguir é parte do código da de uma tela da aplicação de exemplo. Que mostrar a tela cadastro de tipo com filha de TPage


Imagem de uma tela mostrando uma tela com TPage
<br><img src="img/tela_tipo.png" width="500"/>


## Exemplo de uma tela simples

Veja o código abaixo com os comentários para entender como criar um formulário

```php
class TipoFormList extends TPage
{
    private $form; // form

    //$param recebe os resultado do $_REQUEST
    public function __construct($param)
    {
        parent::__construct();
        //Na linha abaixo está criando um formulário do tipo bootstrap
        $this->form = new BootstrapFormBuilder('form_TipoFormList'); //id do form
        $this->form->setFormTitle("tipo"); //Título do Form que irá aparecer

        //Nesse exemplo tempos apenas UM campo de texto livre
        $descricao = new TEntry('descricao'); //tipo de campo e seu id descricao
        $descricao->setMaxLength(100); //tamanho maximo de caracteres
        $descricao->setSize('100%'); //largura do campo no grid layout do bootstrap. NÃO é na tela

        //Abaixo estamos incluindo no form os Label e campos criados
        $this->form->addFields(
            [new TLabel("Descrição:", '#ff0000', '14px', null)]
           ,[$descricao]
           );


        //Criamos um conteiner que será incluido 2 elementos
        $container = new TVBox; //Tipo de conteiner
        $container->style = 'width: 100%'; //largura na tela
        $container->add(TBreadCrumb::create(["Básico","tipo"])); //incluido o primeiro elemento que é um caminho de migalha da pão
        $container->add($this->form);//incluido o formulário com os elementos filhos

        parent::add($container);//o conteiner é incluido na Classe TPage
    }
}
```
No método construtor da página acrescentamos seu conteúdo, por meio do método add(). No exemplo acima foi incluido o $container. Um elemento muito importante na tela é o Contêineres, que é uma forma de agrupar diversos elementos. [Veja no link do tutor os diversos Contêineres do Adianti](https://framework.adianti.me//tutor/index.php?class=HomeView&method=onLoad&menu=Presentation&submenu=Containers)


<br>
<a href="https://www.youtube.com/watch?v=ly4C2oqpzK8">
    <br>Canal ScriptDevBR, no Youtube: Classe Controlle no Adianti Framework
    <br><img src="https://img.youtube.com/vi/ly4C2oqpzK8/maxresdefault.jpg" width="400"/>
</a>

## Disposição dos elementos da tela.

> [!IMPORTANT]
> Cuidado para não confundir o layout do componentes usando GRID com o Data Grid. O primeiro é disposição de componentes de tela e o segundo é apresentadas de dados em tabela.


O Adianti utiliza sistema de GRID do bootstrap. Isso quer dizer que o BootStrap tem 12 colunas na telas para dispor os elementos e assim facilitar a responsividade. Imagem uma tela com label e campo, então em mais linha vc pode ter 6 campos. Sim é possível incluir mais campos porém isso será uma combinação de elmentos. 

O Código abaixo tem um label e compo
```php
        $this->form->addFields(
            [new TLabel("Descrição:", '#ff0000', '14px', null)]
           ,[$descricao]
           );
```

No exemplo abaixo temos 3 campos e label. Sempre no modelo de label na frente do campo. Isso vai usar 6 colunas
```php
        $this->form->addFields(
            [new TLabel("campo 1:", '#ff0000', '14px', null)]
           ,[$campo1]
           ,[new TLabel("campo 2:", '#ff0000', '14px', null)]
           ,[$campo2]
           ,[new TLabel("campo 3:", '#ff0000', '14px', null)]
           ,[$campo3]
           );
```

O exemplo tem os labels sobre os campos, logo vai usar 3 colunas
```php
        $this->form->addFields(            
            [new TLabel("campo 1:", '#ff0000', '14px', null)][$campo1]
           ,[new TLabel("campo 2:", '#ff0000', '14px', null)][$campo2]
           ,[new TLabel("campo 3:", '#ff0000', '14px', null)][$campo3]
           );
```

Para compreender melhor sobre o grid bootstrap veja os links abaixo
* https://www.w3schools.com/bootstrap/bootstrap_grid_system.asp
* https://getbootstrap.com.br/docs/4.1/layout/grid/

No links abaixo verá no tutor como dispor os elementos
* https://framework.adianti.me//tutor/index.php?class=FormBuilderGridView
* https://framework.adianti.me//tutor/index.php?class=FormNestedBuilderView

## Componentes
O Adianti tem diversos componentes de telas prontos. Para maiores detalhes veja em [componentes](componentes.md)

## Grids
Um componente especial que merece um capitulo separado o [Data Grids](data_grid.md)


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