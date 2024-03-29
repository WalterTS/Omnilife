
# Evaluación OMNILIFE - Berly Walter Torres Salas

- Laravel Framework 10.48.4
- PHP 8.1.2

## Usuario demo

Es necesario ejecutar las migraciones, después crear un usuario demo para poder ingresar en el login, este usuario tiene por default la contraseña "password".

```bash
  php artisan tinker
  User::factory()->create(['email' => 'admin@test.com','name' => 'Omnilife'])
```
    
## Configuración de Virtual Host (Local)

```javascript
<VirtualHost *:80>
ServerName empleados.test
DocumentRoot /var/www/html/Berly-Walter-Torres-Salas/public

<Directory /var/www/html/Berly-Walter-Torres-Salas>
   Options Indexes FollowSymLinks
   AllowOverride All
   Require all granted
</Directory>

  ErrorLog ${APACHE_LOG_DIR}/error.log
  CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```