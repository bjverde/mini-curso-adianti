# Banco de dados

O Adianti pode conectar com diversos banco:  PostgreSQL, MySQL, SQLite, Oracle, Sql Server, ou Firebird.

Configure o conector dentro da aplicação:
* Arquivo INI: app/config/meu-banco.ini
* Arquivo PHP: app/config/meu-banco.php

Cada banco de dados deve ser configurado na pasta app/config por um INI ou PHP. Para usar um conector, você deve ter o driver correto habilitado no php.ini.

> [!TIP]
> Recomento usar arquivos PHP irá subir um pouco a segurança do seu sistema. Arquivos INI por padrão o Apache mostrar o seu conteúdo diferente do arquivo PHP


Veja exemplos no Guia Rápido do Adianti
https://adiantiframework.com.br/guia-rapido



```php
return [
     "host" => "127.0.0.1"
    ,"port" => ""
    ,"name" => "tutor"
    ,"user" => "root"
    ,"pass" => "mysql"
    ,"type" => "mysql"
    ,"prep" => "1"
    ,"zone" => "America/Sao_Paulo"
    ,"char" => "utf8mb4"
];
```



# Classe modelo
As classes model representam as tabelas do banco de dados. Uma classe modelo é filha de TRecord. Esta classe do framework fornece métodos básicos de persistência como store(), delete() e load() que manipulam um objeto na base de dados.

Veja exemplos no Guia Rápido do Adianti
https://adiantiframework.com.br/guia-rapido


# Navegação
* [Súmario](../README.md)