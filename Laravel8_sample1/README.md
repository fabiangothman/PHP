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


## Artisan snippets
Check the terminal snippets list
### Terminal general snippets
- Crear controlador:
    - php artisan make:controller NameController
### Terminal migrations snippets
- Crear migracion:
    - php artisan make:migration create_name_table
- Actualizar migraciones existentes (No usar en prod, drop all):
    - php artisan migrate:fresh
- Actualizar migraciones existentes usando "down" (No usar en prod, drop each):
    - php artisan migrate:refresh
- Actualizar solo campo en tabla:
    - php artisan make:migration add_name_to_users_table
- Ejecutar las migraciones exitentes (up):
    - php artisan migrate
- Eliminar la ultima migracion (lote/batch) ejecutada (down):
    - php artisan migrate:rollback
- Modify table structure (Needs doctrine/dbal library):
    - php artisan make:migration change_to_name_table
- Delete all tables (only keep migrations table):
    - php artisan migrate:reset
### Terminal Models/ORM snippets
- Create new model (Singular, automatically undestands the plural, only works automatically on English)
    - php artisan make:model Name
### Terminal routes
- List of current routes:
    - php artisan r:l
### terminal cache
- Clear cache:
    - php artisan cache:clear
### terminal componets (Tailwind)
- Create new component (creates two files for component: controller&view):
    - php artisan make:component Name
    - p.e. <x-alert />
### Terminal middleware
- Create new middleware:
    - php artisan make:middleware Name
- Register middleware into Kernel.php

## ORM Eloquent
Eloquent manages all database injection/consulting by using objects.
### Tinker
To "emulate" via terminal the ORM Eloquent objects, methods, etc
- php artisan tinker
Select the Model you're going to work
- use App\Models\Name;
Initialize new object and fill it:
- $name = new Name;
- $name->name="Laravel";
- $name->description="Best FW ever!";
Show current object state:
- $name;
Save new register:
- $name->save();
Show object already saved:
- $name;
### General samples query
Returns a "Collection", "Builder" or "Object":
- $cursos = Curso::all();
- $cursosFiltered = Curso::where('categoria', 'Desarrollo web')->get();
- $cursosFilteredOrdered = Curso::where('categoria', 'Desarrollo web')->orderBy('name', 'desc')->get();
- $cursoObj = Curso::where('categoria', 'Desarrollo web')->orderBy('name', 'desc')->first();
- $cursoObjCustom = Curso::select('name AS title', 'description AS desc')->get();
- $cursoObjCustomObj = Curso::select('name', 'description')->where('categoria', 'Desarrollo web')->orderBy('name', 'desc')->first();
- $cursosThree = Curso::select('name', 'description')->where('categoria', 'Desarrollo web')->orderBy('name', 'desc')->take(2)->get();
- $cursosEqualTo = Curso::where('name', 'Magnam eum consequatur ratione earum error.')->get();
- $cursoEqualTo = Curso::where('id', 5)->first();
- $cursoFindById = Curso::find(5);
- $cursosMajor = Curso::where('id', '>=', 5)->get();
- $cursosDiff = Curso::where('id', '<>', 2)->get();
- $cursosLike = Curso::where('name', 'like', '% odit %')->get();
### Seeders
Fill the database with demo data
- General Seeder:
    - seeders/DatabaseSeeder.php
- Execute general seeder (Try to run before the command "fresh"):
    - php artisan db:seed
    - php artisan migrate:fresh --seed
- Create custom Seeders:
    - php artisan make:seeder NameSeeder
- Execute custom seeders (Try to run before the command "fresh"):
    - Call them into the DatabaseSeeder.php file
    - php artisan migrate:fresh --seed
### Factory
Fill the database with demo data
- Create custom Factory:
    - php artisan make:factory NameFactory
    - php artisan make:factory NameFactory --model=Curso
- Execute general seeder (Try to run before the command "fresh"):
    - php artisan migrate:fresh --seed

## Form request (For validate forms)
Create file to validate a form:
- php artisan make:request Action&Name
- php artisan make:request StoreCurso

## Email
Create a file to control email requests:
- php artisan make:mail NameMailable
