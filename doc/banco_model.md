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


# Navegação
* [Súmario](../README.md)