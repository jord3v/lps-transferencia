# Instruções para a instalação.

Clone a aplicação para o servidor, em seguida acesse a pasta

    $ git clone https://github.com/imoveis/lps-transferencia.git
    $ cd lps-transferencia

Crie um arquivo `.env` baseado no `.env.example` e configure as variáveis de ambiente. 

    $ cp .env.example .env

Faça o download das dependências do Laravel

    $ composer install

Caso dê o erro de versão do PHP, lamentamos, deverá utilizar a versão mínima que está sendo sugerido para o Laravel 7 e suas dependencias ou ignorar rodando o seguite código abaixo. 
Pode ser que futuramente dê problema ao tentar rodar o composer dump-autoload

    $ composer install --ignore-platform-reqs

Gere a key da aplicação

    $ php artisan key:generate

Rode as migrations e os seeders

    $ php artisan migrate:fresh --seed

Crie o link simbólico com o código 

    $ php artisan storage:link

# Instruções para acesso

Acesse o link que foi inserido no arquivo de configuração do ambiente `.env`na tag **APP_URL=**

|E-mail|Senha  |
|--|--|
| admin@admin.com |change123|


## Criando landing pages 

No menu esquerdo
 - Landing pages > Cadastrar nova#

Para subir o arquivo, será necessário que esteja zipado, e contenha a página principal renomeada como `index.php`

![enter image description here](https://i.ibb.co/3s35Ltz/zip.png)

## Sobre a configuração do servidor

Ao criar a landing page, existe as instruções, entretanto dependerá do tipo de sistema operacional e tipo de servidor que irá rodar.

