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

No método construtor da página acrescentamos seu conteúdo, por meio do método add().

A classe a seguir é parte do código da de uma tela da aplicação de exemplo. Que mostrar a tela cadastro de tipo com filha de TPage


```php
class TipoFormList extends TPage
{
    private $form; // form
    private $datagrid; // listing
    private $pageNavigation;
    private $loaded;
    private static $database = 'maindatabase';
    private static $activeRecord = 'Tipo';
    private static $primaryKey = 'idtipo';
    private static $formName = 'form_TipoFormList';
    private $limit = 20;

    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct($param)
    {
        parent::__construct();
        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);

        // define the form title
        $this->form->setFormTitle("tipo");
        $this->limit = 20;
```

Imagem da tela código acima, mostrando uma tela com TPage
<br><img src="img/tela_tipo.png" width="500"/>

> [!IMPORTANT]
> Esse Para sistema que serão usados também no celular ou exclusivamente no celular. Evite usar Janelas! Pois vai perder uma parte considerável da responsividade. Prefira cortina lateral. 


<br>
<a href="https://www.youtube.com/watch?v=ly4C2oqpzK8">
    <br>Canal ScriptDevBR, no Youtube: Classe Controlle no Adianti Framework
    <br><img src="https://img.youtube.com/vi/ly4C2oqpzK8/maxresdefault.jpg" width="400"/>
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