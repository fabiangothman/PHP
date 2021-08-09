# Laravel8
Hello, Welcome to this project dedicated to the framework Laravel update to version 8.

## First steps
We need to setup a local environment with:
- Composer
- Apache server (XAMPP)
- MySQL (XAMPP)

## Initialization
- composer global require laravel/installer
- laravel new laravel8_sample1
- Configure a virtualhost/hosts pointing to laravel's "public" directory created
- Ex. in my case http://laravel8.test
- Fill the .env proper data

## Terminal snippets
- Crear controlador: php artisan make:controller NameController