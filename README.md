# Minicurso do Adianti Framework

> [!WARNING]
> **Esse é um minicurso sobre o Adianti. NÃO tem como objetivo explorar todos os recursos ou algo profundo. Quem deseja um curso completo e profundo procure os cursos oficiais**
https://adiantiframework.com.br/cursos

# [Introdução](doc/introducao.md)
# [Conhecimentos requeridos.](doc/conhecimento_requerido.md)


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
