# APIproject

API на основе laravel

## Требования

1. [Docker](https://www.docker.com/)

## Установка

Разверните проект на open server либо запустите локальный сервер laravel. Как это сделать описано в 7 пункте

1. Клонируйте репозиторий
2. Перейдите в директорию с окружением: `cd APIproject/app`
3. Создайте файл `.env` на основе `.env.example` и настройте его параметры.
4. Запустите Docker контейнер `docker-compose up -d`
5. Откройте терминал контейнера `docker exec -it api_nginx /bin/bash`. Затем перейдите в нужную дирректорию `cd var/www/app` и установите зависимости: `composer install`
6. Сгенерируйте ключ приложения: `php artisan key:generate`
7. Запустите миграции: `php artisan migrate`

Сервис будет доступен по ссылке [http://localhost:8876/](http://localhost:8876/)
