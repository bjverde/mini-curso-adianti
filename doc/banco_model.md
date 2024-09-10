# Banco de dados

O Adianti pode conectar com diversos SGBDs:  PostgreSQL, MySQL, SQLite, Oracle, Sql Server, ou Firebird.


## Arquivo config

Configure o conector dentro da aplicação:
* Arquivo INI: app/config/meu-banco.ini
* Arquivo PHP: app/config/meu-banco.php

Cada banco de dados deve ser configurado na pasta app/config por um INI ou PHP. Para usar um conector, você deve ter o driver correto habilitado no php.ini.

Vc pode poder inumeros conectores um para cada banco ou SGBD diferente. Exemplos:
* log no sqlite
* acesso no mysql
* arquivo no postgresql

> [!TIP]
> Recomento usar arquivos PHP, assim terá um pouco mais de segurança para seu sistema. Arquivos INI por padrão o Apache mostrar o seu conteúdo diferente do arquivo PHP


## Exemplo PHP
Arquivo em PHP de exemplo que poderá ser usado

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

Veja mais exemplos de config em banco no Guia Rápido do Adianti
https://adiantiframework.com.br/guia-rapido



# Classe modelo
Além do arquivo de config no banco. As classes model representam as tabelas do banco de dados. Uma classe modelo é filha de TRecord. Esta classe do framework fornece métodos básicos de persistência como store(), delete() e load() que manipulam um objeto na base de dados.

## Exemplo de classe model
```php
class Telefone extends TRecord
{
    const TABLENAME  = 'telefone';
    const PRIMARYKEY = 'idtelefone';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';
    const CREATEDAT  = 'dat_inclusao';
    const UPDATEDAT  = 'dat_alteracao';

    private $fk_idpessoa;
    private $fk_idtipo_telefone;
    private $fk_idendereco;
    private $idpessoa;
    private $idtipo_telefone;
    private $idendereco;

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('numero');
        parent::addAttribute('idpessoa');
        parent::addAttribute('idtipo_telefone');
        parent::addAttribute('idendereco');
        parent::addAttribute('sit_fixo');
        parent::addAttribute('whastapp');
        parent::addAttribute('telegram');
        parent::addAttribute('dat_inclusao');
        parent::addAttribute('dat_alteracao');
        parent::addAttribute('dat_exclusao');
    }
```
## Explicando as contantes
[Adianti Framework 7.6 traz atributos automáticos que registram o usuário por trás de cada criação, alteração e exclusão de dados.](https://www.instagram.com/reel/C4eG16qrXgk/)

* TABLENAME define o nome da tabela que a classe de modelo irá manipular.
* PRIMARYKEY define o campo de chave primária. O framework não manipula chaves compostas.
* IDPOLICY define a estratégia para geração de novos ID's. max+1 ou serial (deixa o campo de chave primária vazio e o banco de dados decide seu novo valor).
* CREATEDAT informe o campo que será preenchido com data e hora no momento do insert
* UPDATEDAT informe o campo que será preenchido com data e hora no momento do update
* DELETEDAT informe o campo que será preenchido com data e hora no momento do delete. Se esse campo estiver com valor null é um registro válido. Se tiver com preenchido, foi deletado logicamente.


O método addAttribute() limita quais atributos deste objeto serão persistidos (gravados) na base de dados. Quaisquer atributos que não estejam no addAttribute() serão ignorados pelo mecanismo de persistência. Caso o addAttribute() não seja chamado nenhuma vez, todos atributos serão persistidos. 


Veja exemplos no Guia Rápido do Adianti
https://adiantiframework.com.br/guia-rapido



# Conexões

Nesse ponto você tem um arquivo config apontando o banco correto e em alguns casos terá uma classe model que representa uma tabela. A model não é obrigatorio pois vc pode fazer consultas diretamente usando Select do SQL.

No Adianti Tutor, verá vários exemplo parte conexões
https://framework.adianti.me//tutor/index.php?class=HomeView&method=onLoad&menu=Persistence&submenu=Connections

## Exemplo simples.
No exemplo abaixo é aberta um conexão com o arquivo de config de nome samples
```php
try { 
    TTransaction::open('samples'); // open transaction
    $conn = TTransaction::get(); // get PDO connection   
    // SEU CODIGO AQUI
    TTransaction::close(); // close transaction 
} 
catch (Exception $e){ 
    new TMessage('error', $e->getMessage()); 
}
```

# Objetos

Sobre objetos de banco
https://framework.adianti.me//tutor/index.php?class=HomeView&method=onLoad&menu=Persistence&submenu=Objects


[O Adianti Framework 7.6 agora conta com comandos de baixo nível para manipulação de dados, como insert's, update's, e delete's.](https://www.instagram.com/reel/C4MFTFbt-rh/)


# Navegação
* [Súmario](../README.md)
