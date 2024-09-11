# Introdução

# Adianti Framework

> [!WARNING]
> Lembrando existe o Adianti Template e Adianti Framework, veja [Apresentação > Ambiente](apresentacao.md#ambiente-adianti). Esse mini curso tem o foco no Adianti Framework


# [Estrutura de diretórios](estrutra_dir.md)
Conheça a [Estrutura de diretórios](estrutra_dir.md) do adianti antes ver alguns do elemenetos iniciais.

# Templates para a construção de sistemas

> [!WARNING]
> O Adianti framework utiliza o termo template para duas coisas diferentes:
* Template o esqueleto de sistema feito com Adianti, veja [Apresentação > Ambiente](apresentacao.md#ambiente-adianti)
* Template o esquema layout para o sistema.

Para evitar confusão desse ponto para frente o termo template será sempre o esqueleto e termo tema será o esquema cores e layout. 

O Adianti utiliza o [Twig](https://twig.symfony.com/) que é um motor de templates (template engine) para PHP. Ele permite separar a lógica da aplicação (PHP) da apresentação (HTML), promovendo uma arquitetura de código mais organizada e manutenível. Em conjunto com o [Admin LTE](https://adminlte.io/) para criar o Layout principal dos sistema criados. O Layout pode ser no estilo bootstrap ou [Material ](https://github.com/gurayyarar/AdminBSBMaterialDesign)

[Os temas são responsivos: seja qual for o tamanho da tela vai acompanham a demanda, proporcionando uma experiência de uso facilitada. Os menus se adaptam automaticamente, permitindo uma navegação fluida em qualquer dispositivo. E não para por aí! Os formulários, datagrids e outros componentes também se ajustam perfeitamente ao espaço disponível.](https://www.instagram.com/reel/Cu72aIZvb9F/)

[Veja exemplo de formulários responsivos!](https://www.instagram.com/reel/CuFxt4aPlDk/)


No GitHub existe um projeto com vários temas. Veja https://github.com/bjverde/adianti-theme


# Um controlador de página
Uma página é representada por uma classe de controle, que poder conter componentes do Framework: como formulários, datagrids, campos, botões, links e etc.

As classes de controle podem ser filhas de TPage ou de TWindow.

TPage são exibidas no quadro central do layout e as filhas de TWindow são sempre
exibidas em uma nova janela.

Existem ainda as cortinas laterais, vistas mais adiante.
A classe a seguir tem como função somente exibir uma imagem na página, o que é
realizado pela criação de um objeto TImage. Logo em seguida este objeto é adicionado à
página pelo método add(). Para criar layout’s mais elaborados usamos containers como
tabelas, divs, frames, caixas, e outros, que permitem empilhar elementos


# Navegação
* [Súmario](../README.md)
    * [Apresentação e Visão geral](apresentacao.md)
    * [Conhecimentos requeridos](conhecimento_requerido.md)
    * [Introdução](introducao.md)
    * [Instalação](instalacao.md)
    * [Banco de dados](banco_model.md)
    * [Componentes](componentes.md)
    * [Criando Sistema](criando_sistema.md)
    * [Vídeos complementares sobre Adianti no YouTube](videos_youtube.md)    