Laravel ApiRestFull de Proyectos y tareas

## Clonar Repositorio

git clone https://github.com/JDanielOtero/laravel-mid-level-project-task-api-Daniel-Otero.git
cd laravel-mid-level-project-task-api-Daniel-Otero

## Instalar Dependencias
composer install

## Confgurar entorno
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task-api
DB_USERNAME=root
DB_PASSWORD=

## Configurar base de datos

## Migrar la base de datos
php artisan migrate

## Levantar el servidor
php artisan Serve
