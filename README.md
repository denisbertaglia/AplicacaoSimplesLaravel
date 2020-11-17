

# Aplicacao Demonstracao Laravel

Aplicação de Demonstracao  Laravel(PHP), MySQL, HTML, CSS e JavaScript.

Desenvolvido com PHP 7.4.6 e MariaDB 10.1.28.


## Como Testar o Projeto
Cria um arquivo .env minímo:
```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simple_app
DB_USERNAME=root
DB_PASSWORD=
```
Instalar as dependêncais do composer na pasta raiz:
```sh
$ composer install
```
Criar um banco de dados segundo o doc/setUp.sql.
Realizar a migração da tabelas:
```sh
$ php artisan migrate
```
Preencher as tabelas:
```sh
$ php artisan db:seed
```

## Testes

```sh
$ php artisan test
```

## Diagrama de ER

![](https://raw.githubusercontent.com/denishbert/AplicacaoSimplesLaravel/documentacao/docs/schema.svg)

## Licença

Sob a [MIT license](https://opensource.org/licenses/MIT).
