#!/bin/bash

composer install && php artisan migrate --seed && php artisan passport:install && php artisan serv --port 8089