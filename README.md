Instalacion

Acontinuacion se presenta la guia de instalacion del proyecto.

En la terminal dirigite a la carpeta de tu servidor de preferencia y alli ejecuta el siguiente comando:

 git clone https://github.com/Camilosh24/reto.git


cuando importes el directorio abrelo en visual studio code y ejecuta los siguientes comandos:

composer install 

asi instalaras todas las dependencias de composer en tu repositorio.

luego buscaras en la raiz de proyecto el archivo .env_example y lo renombras .env, luego acomodaras el archivo para conectarse a tu base de datos

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reto
DB_USERNAME=root
DB_PASSWORD=

al tener todo listo ejecutas los siguientes comandos

php artisan migrate 
se encargara de migrar tu base de datos y despues ejecuta

php artisan serve

este comando te dara el link del servidor para ver el proyecto

recuarda tener tu servidor inicializado.



comandos para factorys

php artisan db:seed --class=CategoriaSeeder
php artisan db:seed --class=PostSeeder