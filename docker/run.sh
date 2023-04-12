#!/bin/sh

cd /var/www

npm install
npm run build

echo "Running composer"
composer install --no-dev

php artisan migrate:fresh --seed --force
php artisan cache:clear
php artisan config:cache
php artisan route:cache

/usr/bin/supervisord -c /etc/supervisord.conf
