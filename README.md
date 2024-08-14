# Mini Curso do Adianti Framework

# Introdução 

## Adianti Framework
Adianti Framework é um framework de desenvolvimento PHP voltado para a construção rápida de aplicações web, especialmente sistemas de gestão, como ERP, CRM, e outros aplicativos de back-office. Foi criado por Pablo Dall’Oglio e é amplamente utilizado no Brasil.
Principais Características:
* Arquitetura MVC: Segue o padrão de arquitetura Model-View-Controller (MVC), que separa a lógica de negócios, a interface do usuário e o controle de fluxo da aplicação.
* Widgets Reutilizáveis: Oferece uma vasta biblioteca de componentes visuais (widgets) como botões, tabelas, formulários, menus, e gráficos, que podem ser facilmente reutilizados em diferentes partes da aplicação.
* ORM (Object-Relational Mapping): O framework inclui um ORM que facilita o mapeamento de classes e objetos PHP para tabelas de banco de dados, permitindo operações de CRUD (Create, Read, Update, Delete) com menos código.
* Integração com Banco de Dados: Suporta múltiplos bancos de dados, como MySQL, PostgreSQL, SQLite, Oracle, entre outros, e permite trocar de banco de dados sem precisar alterar a lógica da aplicação.
* Relatórios: Inclui ferramentas para a criação de relatórios em PDF e gráficos, o que é útil para aplicações de gestão que requerem a geração de relatórios.
* Interface Web Moderna: Permite a construção de interfaces modernas e responsivas, utilizando templates e temas que podem ser customizados.
* Internacionalização: Suporta múltiplos idiomas, permitindo que a aplicação seja facilmente adaptada para diferentes regiões.

## Casos de Uso Comuns:
* Desenvolvimento de sistemas de gestão interna (back-office).
* Aplicações administrativas e de controle.
* Sistemas de cadastro e gerenciamento de informações.

## Vantagens:
* Produtividade: Facilita a construção de aplicações complexas com menos esforço, graças à sua biblioteca de componentes e ferramentas integradas.
* Comunidade: Tem uma comunidade ativa, principalmente no Brasil, com documentação em português e fóruns de discussão.
* Flexibilidade: Pode ser utilizado para desenvolver desde pequenos sistemas até grandes aplicações empresariais.

O Adianti Framework é uma ótima opção para desenvolvedores PHP que buscam uma solução eficiente e robusta para construir aplicações empresariais de forma rápida e estruturada.

## Ambiente Adianti

Compreendendo o ambiente do Adianti

* Adianti Soluttion - É a empresa criada responsável pela criação e manutenção do Adianti FrameWork que tem uma licença livre 
* Adianti Templete  - O Template é um grande gabarito para criação de novos projetos que possui controle de login e permissões de acesso por usuários, grupos de usuários e programas, controles multi unidade, e multi idioma, gestão de documentos, messageria e notificações, logs de acesso, logs de alterações, de SQL, logs de HTTP, REST.
* Adianti FrameWork - Você pode baixar o Framework puro caso não precise dos Templates padrão de sistemas em seus projetos. Geralmente usuários avançados utilizam o Framework puro para construir seus próprios controles de login, permissão, menu, template e outros.
* Adianti Reports and BI - Dashboards analíticos e Relatórios para Empresas e Produtores de Software.
* Adianti Studio - antiga IDE feia em PHP-GTK para trabalhar com o Adianti FrameWork. Foi descontinuada
* Mad Builder - Ferramenta LowCode web para construir sistema usando o Adianti Templete com alguns componentes próprios. 

## Licença 

Resuminod o uso é livre. Uso Permitido. Você tem permissão para usar, copiar, modificar e distribuir o Software e sua documentação, com ou sem modificação, para qualquer propósito, desde que as seguintes condições sejam atendidas

No link poderá ver a licença detalhada
https://adiantiframework.com.br/license


# Conhecimentos requeridos.

Para trabalhar com Adianti Framework é recomendavel que tenha conhecimento das tecnologias abaixo
* PHP - exigido 
* PHP com POO - desejável 
* HTML 5 - desejável 
* JavaScript - desejável

Para quem não tem esses conhecimentos recomendo os cursos abaixo:
* Curso em vídeo, Gustavo Guanabara. PHP Moderno - https://www.youtube.com/watch?v=TfsO0BGvGn0&list=PLHz_AreHm4dlFPrCXCmd5g92860x_Pbr_
* Curso em vídeo, Gustavo Guanabara. HTML 5 + CSS 3 - https://www.youtube.com/watch?v=rqvn_c2n9Eg&list=PLHz_AreHm4dn1bAtIJWFrugl5z2Ej_52d
* Curso em vídeo, Gustavo Guanabara. PHP Iniciante - https://www.youtube.com/watch?v=F7KzJ7e6EAc&list=PLHz_AreHm4dm4beCCCmW4xwpmLf6EHY9k
* Curso em vídeo, Gustavo Guanabara. PHP POO - https://www.youtube.com/watch?v=KlIL63MeyMY&list=PLHz_AreHm4dmGuLII3tsvryMMD7VgcT7x
* Curso PHP 8 do zero ao proficional. https://www.youtube.com/watch?v=O73xbQvGhHk&list=PL0N5TAOhX5E9eJ9Ix6YUIgEw3lNmaIEE9


# Estrutura de diretórios

No Link a seguir detalha a estrutura de diretórios utilizada pelo Adianti framework. Todas os componente do framework estão localizados sob o diretório /lib/adianti. O diretório /lib ainda possui outras bibliotecas utilizadas pelo framework. O diretório app contém a aplicação desenvolvida. 

https://adiantiframework.com.br/estrutura
 
[Estrutura do Projeto no Adianti Framework, por ScriptDevBR (Fabricio)](https://www.youtube.com/watch?v=1f3biISX4Ag)

# Banco de dados

O Adianti pode conectar com diversos banco:  PostgreSQL, MySQL, SQLite, Oracle, Sql Server, ou Firebird.

Configure o conector dentro da aplicação: app/config/meu-projeto.ini

Cada banco de dados deve ser configurado na pasta app/config por um INI. Para usar um conector, você deve ter o driver correto habilitado no php.ini.

Veja exemplos no Guia Rápido do Adianti
https://adiantiframework.com.br/guia-rapido

# Classe modelo
As classes model representam as tabelas do banco de dados. Uma classe modelo é filha de TRecord. Esta classe do framework fornece métodos básicos de persistência como store(), delete() e load() que manipulam um objeto na base de dados.

Veja exemplos no Guia Rápido do Adianti
https://adiantiframework.com.br/guia-rapido

# Cursos sobre o Adianti
https://www.youtube.com/watch?v=HPWBY6cl-LA&list=PLLExJS8y-2LKjK05hVEL3sHr8XupCyZt9
