# APIproject

API на основе laravel

## Требования

## Установка на docker — Рекомендуется

<b>Требования:</b>

1. WSL - Ubuntu 20.04.6 LTS (Описано ниже).
2. [Docker](https://www.docker.com/)
3. [Composer](https://getcomposer.org/)
4. Для удобства работы с БД [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)

<b>Установка и настройка</b>

1. Скачиваем WSL с Microsoft store. После скачивания запускаем, вводим имя пользователя, пароль, подтверждаем пароль. после этого Ubuntu доступна в проводнике по пути `\\wsl$\`
2. Необходимо сменить версию wsl на 2. Для этого:

<div style="padding-left: 52px;">

Получить список wsl:
```bash
wsl --list --verbose
```

Установить версию wsl 2 по умолчанию:

```bash
wsl.exe --set-default-version 2
```

Изменить версию конкретной wsl на 2:
```bash
wsl --set-version <название wsl> 2
```
</div>

3. В Docker перейти в `настройки => Resources => wsl integration` и выбрать нужную Ubuntu.
4. Развернуть проект в Ubuntu `/home/<пользователь ununtu>/projects/`
5. Запустить docker-контейнер из под ubuntu `docker-compose up -d`
6. Перейти в дирректорию `/app/` и выполнить установку зависимостей `composer install`
7. Создать файл `.env` на основе `.env.example`
8. Изменить доступ к файлам командой `sudo chmod 777 -R ./`
9. Открыть консоль контейнера `docker exec -u 0 -it api_app /bin/bash`
10. Сгенерируйте ключ приложения: `php artisan key:generate`
11. Запустите миграции: `php artisan migrate`

Сервис будет доступен по URL [http://localhost:8876/](http://localhost:8876/)

## Установка на open server

1. Клонируйте репозиторий в проекты openserver
2. Перейдите в директорию с окружением: `cd APIproject/app`
3. Создайте файл `.env` на основе `.env.example` и настройте его параметры.
4. Установите зависимости командами `composer upgrade`, `composer install`
5. Запустите Docker контейнер `docker-compose up -d`
6. Открыть консоль контейнера `docker exec -u 0 -it api_app /bin/bash`
7. Сгенерируйте ключ приложения: `php artisan key:generate`
8. Запустите миграции: `php artisan migrate`

Сервис будет доступен по URL [http://localhost:8876/](http://localhost:8876/)

## Работа с БД

Для удобства можно использовать MySQL Workbench <br>
<br>
Доступы к тестовой базе:<br>
host: `127.0.0.1:8101` <br>
login: `root` <br>
password: `test_password` <br>