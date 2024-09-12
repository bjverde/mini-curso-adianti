# Arquivo Application

No arquivo `<RAIZ_SISTEMA>/app/config/application.ini` tem as configurações do sistema. Esse arquivo pode ser muito diferente se está usando diferentes versões do Adianti:
* Framework
* Template
* Template gerado pelo MadBuider
* Fork Framework
* Fork Template

Usar arquivo INI para configurar sistemas em PHP traz diversas vantagens:
* Simplicidade: Arquivos INI possuem uma estrutura simples, com seções e pares chave-valor, o que facilita a leitura e edição.
* Legibilidade: Eles são fáceis de entender, até para usuários não técnicos.
* Configuração Externa: Permitem separar as configurações do código, tornando o sistema mais modular e facilitando mudanças de ambiente (produção, desenvolvimento).
* Suporte Nativo em PHP: O PHP oferece a função parse_ini_file() para carregar e interpretar arquivos INI de forma simples:
* Portabilidade: INI é um formato de configuração comum, amplamente suportado em diferentes plataformas e ferramentas.

## Adianti Framework

```ini
[general]
timezone = America/Sao_Paulo
language = pt
application = appexemplo1 ; id da aplicação
title = "appexemplo1" ; Nome que irá aparece no tema
theme = theme3_v5 ; nome do tema que será usado
seed = 
debug = 1

;request_log_service = SystemRequestLogService ; nome da classe que vai gravar o log
;request_log = 1  ; 1 = gravar o log
;request_log_types = cli,web,rest ; o vai para o log


;Essa seção so existe o Fork Adianti e vai mostrar os valores
;no templates modificados
[system]
system_version = 1.0.0
head_title = "APP Exemplo"
logo-lg = AF
logo-link-class = 'SystemAboutView'
login-link = http://wwww.meusite.com.br
```

Veja o a versão completa
https://github.com/bjverde/minicurso-adianti/blob/main/appexemplo/app/config/application.ini


# Navegação
* [Súmario](../README.md)
    * [Apresentação e Visão geral](apresentacao.md)
    * [Conhecimentos requeridos](conhecimento_requerido.md)
    * [Criando Sistema](criando_sistema.md)
    * [Instalação](instalacao.md)
    * [Introdução](introducao.md)
        * [Estrutura de diretórios](estrutra_dir.md)
    * [Banco de dados](banco_model.md)
    * [Componentes](componentes.md)
    * [Vídeos complementares sobre Adianti no YouTube](videos_youtube.md)