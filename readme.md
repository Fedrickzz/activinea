# Configurar entorn local
## Instal·lar dependències de Node
npm i

## Instal·lar dependències de PHP
composer install

# Crear fitxer de variables d'entorn a dins de carpeta includes
cd includes\
mkdir .env

## definir usuari, contrasenya, i db
DB_HOST=localhost\
DB_USER=\
DB_PASS=\
DB_NAME=

EMAIL_HOST=\
EMAIL_PORT=\
EMAIL_USER=\
EMAIL_PASS=

HOST=http://localhost:3000

# Desenvolupar el projecte en local
gulp dev

# Arrencar el projecte en local
cd public\
php -S localhost:3000