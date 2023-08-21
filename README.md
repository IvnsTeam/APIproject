# APIproject

API на основе laravel

## Требования

1. [Docker](https://www.docker.com/)
2. [Composer](https://getcomposer.org/)
3. Для удобства работы с БД [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)

## Установка

Разверните проект на open server либо запустите локальный сервер laravel. Как это сделать описано в 7 пункте

1. Клонируйте репозиторий
2. Перейдите в директорию с окружением: `cd APIproject/app`
3. Создайте файл `.env` на основе `.env.example` и настройте его параметры.
4. Установите зависимости командой `composer install`
5. Запустите Docker контейнер `docker-compose up -d`
6. Открыть консоль контейнера `docker exec -u 0 -it api_app /bin/bash`
7. Сгенерируйте ключ приложения: `php artisan key:generate`
8. Запустите миграции: `php artisan migrate`

Сервис будет доступен по URL [http://localhost:8876/](http://localhost:8876/)

## Особенности установки на windows

Вместо 4 пункта выполнить:<br>

1. Необходимо установить [Chocolatey](https://chocolatey.org/) Для этого в PowerShell из под администратора выполнить:

```bash
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://chocolatey.org/install.ps1'))
```

2. `choco install php --version=8.1.0` или `choco install php` для последней версии.
3. Необходимо скачать Composer для windows
4. `сomposer upgrade`
5. `composer install --ignore-platform-reqs`

Затем продолжить установку с 5 пункта.

### Производительность контейнера

Для большей производительности контейнер нужно запускать из под окружения linux.
Для этого необходимо переместить проект в wsl.<br>
Получить список wsl:

```bash
wsl --list --verbose
```

Изменить версию wsl на 2 (необходимо для подключение в Docker):

```bash
wsl --set-version <название wsl> 2
```

Установить wsl 2 по умолчанию:

```bash
wsl.exe --set-default-version 2
```

<b style="font-size:20px;">\*</b> В рамках данного проекта для разработки я использую WSL Ununtu-20.04

## Работа с БД

Для удобства можно использовать MySQL Workbench <br>
<br>
Доступы к тестовой базе:<br>
host: `127.0.0.1:8101` <br>
login: `root` <br>
password: `test_password` <br>
