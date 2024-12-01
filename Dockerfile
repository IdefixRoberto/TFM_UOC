# Imatge base amb PHP i Apache
FROM php:8.1-apache

# Copiem el contingut del projecte al directori HTML del contenidor
COPY . /var/www/html/

# Activem el mòdul de reescriptura d'Apache per a rutes amigables
RUN a2enmod rewrite

# Exposem el port 80 per servir l'aplicació
EXPOSE 80