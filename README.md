# APIproject

API на основе laravel

## Требования

1. [composer](https://getcomposer.org/download/)

## Установка

Разверните проект на open server либо запустите локальный сервер laravel. Как это сделать описано в 7 пункте

1. Клонируйте репозиторий
2. Перейдите в директорию проекта: `cd ваш-репозиторий`
3. Установите зависимости: `composer install`
4. Создайте файл `.env` на основе `.env.example` и настройте его параметры.
5. Сгенерируйте ключ приложения: `php artisan key:generate`
6. Запустите миграции: `php artisan migrate`
7. Если вы не используете open server, запустите локальный laravel сервер: `php artisan serve`
