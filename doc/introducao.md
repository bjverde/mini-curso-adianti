# Introdução

# Adianti Framework

É um framework de desenvolvimento PHP voltado para a construção rápida de aplicações web, especialmente sistemas de gestão, como ERP, CRM, e outros aplicativos de back-office. Vantegens do Adianti:

* Componentes prontos para formulários, datagrids, relatórios, gráficos, etiquetas, kanban, calendários, e outros. Templates prontos com recursos de login, menus, responsividade, permissões de acesso, logs, mensagens, etc. Foque na regra de negócios e não em detalhes técnicos.
* Compatível com PHP8
* Código-fonte baseado em mais de 30 Design Patterns clássicos
* Código limpo
* Faça muito mais escrevendo menos linhas de código
* Integrações - Integre sistemas usando REST, SOAP, e outros tipos
* Segurança - Métodos de proteção contra SQL injection, session fixation, e outros
* Muitos logs - Logs de acesso, de SQL, de API, de alteração de registros, de erros
* Templates Templates Bootstrap, Material design, com recursos prontos
* Responsivo Template adaptado para tablets e smartphones
* [Páginas, janelas, cortinas deslizantes. O que muitos batem cabeça para implementar em outras tecnologias, no Adianti Framework é tão transparente que você só precisa de uma linha para habilitar estes comportamento. O resto, o framework cuida de tudo.](https://www.instagram.com/reel/C8p5gzdJuh6/)


## Outros FrameWorks
O Adianti *não*  tem objetico ser um framework mais genetico com os listados abaixo. 

* Laravel - O Laravel tem como objetivo facilitar o desenvolvimento rápido de aplicações web, fornecendo uma sintaxe elegante e intuitiva. O Laravel é ideal para quem busca um desenvolvimento ágil, com menos configuração e mais ferramentas prontas.
* Symfony- O Symfony tem como objetivo ser um framework robusto e modular para grandes projetos. Ele é conhecido pela sua flexibilidade e pela capacidade de ser customizado ao extremo. O Symfony é uma ótima escolha para aplicações complexas e de nível empresarial, onde o controle granular sobre os componentes é essencial. Além disso, seus componentes são amplamente reutilizados por outros frameworks e bibliotecas.
* CodeIgniter - O CodeIgniter tem como objetivo ser um framework leve, rápido e fácil de aprender, sem uma curva de aprendizado muito acentuada. Seu foco é em fornecer um ambiente simples, sem muitas dependências externas, ideal para aplicações menores ou para quem precisa de uma solução rápida, com desempenho eficiente e menos configurações.

## Templates para a construção de sistemas

O Adianti framework utiliza o termo template para duas coisas diferentes:
* Template o esqueleto de sistema feito com Adianti, veja [Apresentação > Ambiente](apresentacao.md#ambiente-adianti)
* Template o esquema layout para o sistema.

Para evitar confusão desse ponto para frente o termo template será sempre o esqueleto e termo tema será o esquema cores e layout. 

O Adianti utiliza o [Twig](https://twig.symfony.com/) que é um motor de templates (template engine) para PHP. Ele permite separar a lógica da aplicação (PHP) da apresentação (HTML), promovendo uma arquitetura de código mais organizada e manutenível. Em conjunto com o [Admin LTE](https://adminlte.io/) para criar o Layout principal dos sistema criados. O Layout pode ser no estilo bootstrap ou [Material ](https://github.com/gurayyarar/AdminBSBMaterialDesign)

[Os temas são responsivos: seja qual for o tamanho da tela vai acompanham a demanda, proporcionando uma experiência de uso facilitada. Os menus se adaptam automaticamente, permitindo uma navegação fluida em qualquer dispositivo. E não para por aí! Os formulários, datagrids e outros componentes também se ajustam perfeitamente ao espaço disponível.](https://www.instagram.com/reel/Cu72aIZvb9F/)

[Veja exemplo de formulários responsivos!](https://www.instagram.com/reel/CuFxt4aPlDk/)


No GitHub existe um projeto com vários temas. Veja https://github.com/bjverde/adianti-theme

## [Estrutura de diretórios](estrutra_dir.md)

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