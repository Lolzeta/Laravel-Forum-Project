# Laravel Forum Project

__Laravel Forum Project__ es una web creada para el proyecto de fin de grado de el curso de Aplicaciones WEb

## Requisitos

Para este proyecto se necesitará Laravel Valet.

## Instalación del proyecto

Lo primero a hacer es clonar el repositorio donde se desea con __'git clone https://github.com/Lolzeta/Laravel-Forum-Project'__

Tras esto, instalaremos todas las dependencias con __composer install__

Crear en el servidor __MySql__ una base de datos llamada __'testforumsdb'__ . Se deberá de configurar un usuario con suficientes permisos de acceso.

Renombrar el archivo __.env.example__ a __.env__ y añadir tu usuario y contraseña del mismo en este

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=testforumsdb
DB_USERNAME=usuario_mysql
DB_PASSWORD=password_mysql

Tras esto, deberemos de generar la clave de cifrado con: __php artisan key:generate__

Si queremos que las migraciones se carguen, usaremos: __php artisan migrate__  , en caso de quererlo con datos, usaremos __php artisan migrate --seed__

Configurar en el __.env__ los datos de acceso a un servicio de envio de email:

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

Finalmente aconsejamos el uso de __npm install__ y __npm run dev__

Tras esto, la aplicación debería de funcionar en [http://testforums.test]

## Admin

La cuenta de administrador esta creada, las credenciales pueden ser encontradas en la base de datos.

## Apartado de cliente

CRUD realizado sobre los mensajes de una sala. La validación esta realizada sobre el registrar, y la paginación sobre los mensajes de la sala.

## Apartado de interface

Se ha generado un scss llamado style.scss que contiene un partial, una herencia, el uso de variables y mixings.

Los elementos de bootstrap están: 
- Utilidad de borde: En rooms y communities
- Utilidades de texto: En casi toda la aplicación, sobretodo en rooms, communities y en los mensajes de las rooms
- Utilidad de visibilidad: En los mensajes de las rooms, en el spinner.
- Tablas: En el apartado Contact
- Iconos: Se ha utilizado la librería __fontawesome__ cual Bootstrap soporta
- Collapse: Se ha utilizado en el apartado About
- Botones: Casi por toda la aplicación
- Grupo de botones: Esta aplicado sobre los votos
- Dropdown: Utilizado en casi en el navbar
- Nav: Utilizado en el show de las communidades
- Navbar: En toda la aplicación
- Badges: Para las notificaciones del usuario
- ALertas: Al no haber mas mensajes que mostrar en la paginación de los mensajes, se muestra una alerta
- Carrousel: Realizado en el index de la pagina
- Jumbotron: Realizado en el index de la pagina
- Form: En cualquier create
- Validación de Form: En cualquier create
- Input group: Realizado en los create
- Modal: Utilizados en varios lugares, por ejemplo, en Login
- Listgroup: Utilizado en About
- Pagination: Utilizado en rooms, communities...
- Card: Son el elemento principal de la página
