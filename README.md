## Sobre

Desafio técnico de PHP e Laravel proposto pela empresa :upd8

## Setup do projeto

- Laravel 10.00
- PHP 8.2
- MySQL 5.7
- Tailwind


## Iniciando o projeto

Para iniciar a projeto, execute os comandos na sequência abaixo

```
git clone https://github.com/omateusventura/desafio-php-upd8.git
```

```
composer install
```

```
Configure o banco de dados no arquivo .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=upd8
DB_USERNAME=root
DB_PASSWORD=
```

```
php artisan migrate
```

```
php artisan db:seed --class=CustomerSeeder
```

```
php artisan serve
```

```
O projeto irá abrir no link http://localhost:8000
```

## Rotas do Front-End

```
  http://localhost:8000/clientes
  http://localhost:8000/clientes/cadastro
  http://localhost:8000/clientes/editar/{id}
```

## Rotas da API RESTful

```
  GET http://localhost:8000/api/clientes
  GET http://localhost:8000/api/clientes/{id}
  POST http://localhost:8000/api/clientes
  PUT http://localhost:8000/api/clientes/{id}
  DELETE http://localhost:8000/api/clientes/{id}
```

## Estrutura do banco de dados

```
  Schema::create('customers', function (Blueprint $table) {
    $table->id();
    $table->string('cpf', 11)->unique();
    $table->string('name');
    $table->enum('genere', ['male', 'female']);
    $table->date('dateofbirth');
    $table->string('postalcode', 10);
    $table->string('street');
    $table->string('number');
    $table->string('neighborhood');
    $table->string('city');
    $table->string('state', 2);
    $table->timestamps();
    $table->datetime('deleted_at')->nullable();
  });
```
