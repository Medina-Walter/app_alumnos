Requisitos Previos
Antes de comenzar, asegúrate de tener instalado:

PHP >= 8.1

Composer

MySQL/MariaDB u otro motor de base de datos

Node.js y NPM (para manejar assets con Vite)

Git (opcional, pero útil)

Un servidor web (Apache, Nginx)

git clone https://github.com/Medina-Walter/app_alumnos.git
cd app_alumnos
composer install

Configurar archivo .env

Duplica el archivo .env.example y nómbralo .env:

cp .env.example .env


Luego edita el .env para configurar tu base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_db
DB_USERNAME=usuario
DB_PASSWORD=clave

Generar la clave de la app
php artisan key:generate

Migrar base de datos (si aplica)
php artisan migrate

Si hay seeders para poblar la base de datos:

php artisan db:seed

Iniciar el servidor de desarrollo
php artisan serve

Abre en tu navegador: http://127.0.0.1:8000

