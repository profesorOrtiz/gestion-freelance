# Proyecto Gestión Freelance

## Descripción
El siguiente proyecto fue creado con fines educativos para ser utilizado por los alumnos de la materia Programación Orientada a Objetos del ISAM.

## Instalación del proyecto 💻

Para instalar el proyecto en un servidor local se deberán seguir los siguientes pasos

### Requisitos previos

* Tener un servidor web instalado en la máquina destino. El servidor utilizado durante el desarrollo fue **Apache**.
* Tener un servidor de base de datos instalado en la máquina destino. El servidor utilizado durante el desarrollo fue **MySQL**.
* Tener las credenciales de los distintos servidores a utilizar.
* Tener instalado **Laravel** (versión 11).
* Tener instaladas las siguientes herramientas de desarrollo:
    * Composer
    * NPM

### Pasos a seguir

1. Clonar el repositorio:

```sh
git clone https://github.com/profesorOrtiz/gestion-freelance.git
```

2. Instalar las dependencias de PHP necesarias:

```sh
composer install
```

Y las de NPM:

```sh
npm install
```

3. Crear una copia del archivo `.env.example`, renombrarlo como `.env` y modificar las credenciales necesarias:

```php
APP_NAME='Gestion Freelance'
APP_URL= // URL de la aplicación/servidor

DB_CONNECTION=mysql
DB_HOST= // servidor de la base de datos
DB_PORT= // puerto de la base de datos
DB_DATABASE= // nombre de la base de datos a utilizar
DB_USERNAME= // nombre del usuario usado para conectarse a la base de datos
DB_PASSWORD= // contraseña del usuario de base de datos
```

4. Generar la clave de Larvel para la aplicación

```sh
php artisan key:generate
```

5. En el caso de estar instalando en un servidor local, es necesario ejecutar el servidor

```sh
php artisan serve
```
