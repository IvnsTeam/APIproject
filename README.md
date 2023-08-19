# APIproject

API на основе laravel

## Требования

1. [Docker](https://www.docker.com/)

## Установка

Разверните проект на open server либо запустите локальный сервер laravel. Как это сделать описано в 7 пункте

1. Клонируйте репозиторий
2. Перейдите в директорию проекта: `cd APIproject/app`
3. Установите зависимости: `composer install`
4. Создайте файл `.env` на основе `.env.example` и настройте его параметры.
5. Сгенерируйте ключ приложения: `php artisan key:generate`
6. Запустите Docker контейнер `docker-compose up -d`
7. Запустите миграции: `php artisan migrate`
