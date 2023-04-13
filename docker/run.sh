#!/bin/sh

cd /var/www

php artisan migrate:fresh --seed --force
#pho artisan migrate
php artisan cache:clear
php artisan config:cache
php artisan route:cache

/usr/bin/supervisord -c /etc/supervisord.conf
