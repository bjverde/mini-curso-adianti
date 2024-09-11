# Introdução

## Adianti Framework

> [!WARNING]
> Lembrando existe o Adianti Template e Adianti Framework, veja a diferença em [Apresentação > Ambiente](apresentacao.md#ambiente-adianti). Esse mini curso tem o foco no Adianti Framework

## Estrutura de diretórios
Um ponto importante é conheer a [estrutura de diretórios](estrutra_dir.md) do adianti para iniciar o entendimento.

## Apresentação, Tema e Layout

> [!WARNING]
> O Adianti framework utiliza o termo template para duas coisas diferentes:
* Template o esqueleto de sistema feito com Adianti, veja [Apresentação > Ambiente](apresentacao.md#ambiente-adianti)
* Template o esquema layout para o sistema.

> [!TIP]
> Para evitar confusão desse ponto para frente o termo template será sempre o esqueleto e termo tema será o esquema cores e layout. 

O Adianti utiliza o [Twig](https://twig.symfony.com/) que é um motor de templates (template engine) para PHP. Ele permite separar a lógica da aplicação (PHP) da apresentação (HTML), promovendo uma arquitetura de código mais organizada e manutenível. Em conjunto com o [Admin LTE](https://adminlte.io/) para criar o Layout principal dos sistema criados. O Layout pode ser no estilo bootstrap ou [Material ](https://github.com/gurayyarar/AdminBSBMaterialDesign)

Os temas são responsivos: seja qual for o tamanho da tela vai acompanham a demanda, proporcionando uma experiência de uso facilitada. Os menus se adaptam automaticamente, permitindo uma navegação fluida em qualquer dispositivo. E não para por aí! Os formulários, datagrids e outros componentes também se ajustam perfeitamente ao espaço disponível.

Veja exemplos no Instragram do Adianti
* [Veja exemplos gerais!](https://www.instagram.com/reel/Cu72aIZvb9F/)
* [Veja exemplo de formulários responsivos!](https://www.instagram.com/reel/CuFxt4aPlDk/)


No GitHub existe um projeto com vários temas. Veja https://github.com/bjverde/adianti-theme


## Um controlador de página
Uma página é representada por uma classe de controle, que poder conter diversos componentes do Framework: formulários, datagrids, campos, botões, links e etc.


As classes de controle podem ser filhas de TPage ou de TWindow.
* TPage são exibidas no quadro central do layout.
* TWindow são sempre exibidas em uma nova janela.
* outra opção é cortinal lateral

> [!TIP]
> Para sistema que serão usados no celular evite usar Janelas! Pois vai perder um parte consideravel da responsividade. Prefira cortina lateral. 

A classe a seguir é parte do código da de uma tela da aplicação de exemplo. Que mostrar a tela cadastro de tipo.

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

# Navegação
* [Súmario](../README.md)
    * [Apresentação e Visão geral](apresentacao.md)
    * [Conhecimentos requeridos](conhecimento_requerido.md)
    * [Introdução](introducao.md)
        * [Estrutura de diretórios](estrutra_dir.md)
    * [Instalação](instalacao.md)
    * [Banco de dados](banco_model.md)
    * [Componentes](componentes.md)
    * [Criando Sistema](criando_sistema.md)
    * [Vídeos complementares sobre Adianti no YouTube](videos_youtube.md)    