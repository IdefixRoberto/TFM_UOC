# Imatge base de PHP amb Apache
FROM php:8.1-apache

# Copiem tots els fitxers al directori del servidor
COPY . /var/www/html/

# Activem el mòdul de reescriptura d'Apache
RUN a2enmod rewrite

# Exposem el port 80 per a la connexió HTTP
EXPOSE 80

# Especificar la comanda d'inici per arrencar el servidor PHP
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
