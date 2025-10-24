#!/bin/sh
composer update
composer install --no-dev --optimize-autoloader

php spark serve --host 0.0.0.0 --port 8080