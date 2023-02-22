


Sistema de videollamadas para clases online para raspberry pi


Este proyecto ha sido realizado con el fin educativo con el fin de avanzar en mi carrera profesional.

## Tecnologías utilizadas

<figure>
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
         alt="Laravel" width="300" height="100">
    <figcaption>Laravel 8.0</figcaption>
</figure>

<figure>
    <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png"
         alt="Boostrap 5.3" width="200" height="150">
    <figcaption>Boostrap 5.3</figcaption>
</figure>

## Instalación

### 1. Clonar repositorio de GITHUB

`git glone https://github.com/david9801/streamingraspberry.git`

### 2. Ejecutar migraciones del proyecto

En tu motor de base de datos requerido (en mi caso MySQL) debes crear una base de datos nueva e indicar los datos de acceso en el fichero .env:
- Equipo/host
- Nombre 
- Usuario 
- Contraseña 

En este proyecto ha sido empleado

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=raspberry
DB_USERNAME=root
DB_PASSWORD=*******
```
Además, se usa mailtrap como mail-testing con los datos que se muestran en .env
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=1557d5fd7da5a0
MAIL_PASSWORD=30404a3a16bfab
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=padelreserves@padelenergy.es
```

En el caso de emplear Laravel con MySQL, asegúrate de lo siguiente:
Debes ir a /config/database.php y buscar 'engine':

'engine' => null,

se cambia por:

'engine' => 'InnoDB',

Una vez se ha realizado el paso anterior:

`php artisan migrate`
También ejecutar el siguiente comando desde la consola de comandos para no tener problemas al mostrar la foto de perfil del usuario:
`php artisan storage:link`

### 3. Rellenar los datos en las tablas de las bbdd



## Componentes del proyecto
### 1. Desde la navbar sin estar logueado
Opciones->


### 2. Desde la navbar si se está logueado
Opciones-> 

## Consideraciones

### Relaciones
Aún no terminado las relaciones, mira los modelos para resolver tus dudas! :)
