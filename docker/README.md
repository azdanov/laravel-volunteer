# Docker

Ensure the webserver config on `nginx/default.conf` is correct for your project. The `php` name in line `fastcgi_pass php:9000;` will correspond to `php` name in `docker-compose.yml`. Inside `.env` the line `DB_HOST=postgres` will correspond to name used in `docker-compose.yml`. Same for `MAIL_HOST=mailhog`.

You may place the files elsewhere in your project. Make sure you modify the locations for the php-fpm, and nginx config in `docker-compose.yml` if you do so.

## How to run

Dependencies:

* Docker. See [https://docs.docker.com/engine/installation](https://docs.docker.com/engine/installation)

Once you're done, simply `cd` to your project and run `docker-compose up -d`. This will initialise and start all the containers, then leave them running in the background.

## Services exposed outside your environment

You can access your application via **`localhost`**.

| Service           | Address outside containers              |
| ----------------- | --------------------------------------- |
| Webserver (Nginx) | [localhost:8080](http://localhost:8080) |
| Mailhog (WebUI)   | [localhost:8025](http://localhost:8025) |
| PostgreSQL (DB)   | [localhost:5432](http://localhost:5432) |

## Hosts within your environment

You'll need to configure your application to use any services you enabled:

| Service        | Hostname | Port number | Description                          |
| -------------- | -------- | ----------- | ------------------------------------ |
| PHP-fpm        | php      | 9000        | Used for nginx, composer and artisan |
| SMTP (Mailhog) | mailhog  | 1025        | Catch outbound mail                  |
| HTTP (Mailhog) | mailhog  | 8025        | Access a WebUI to view caught email  |
| Node           | node     | 8081        | Build assets for frontend            |
| PostgreSQL     | postgres | 5432        | Application database                 |

## Docker compose cheatsheet

**Note:** you need to cd first to where your docker-compose.yml file lives.

* Start containers in the background: `docker-compose up -d`
* Start containers on the foreground: `docker-compose up`. You will see a stream of logs for every container running.
* Stop containers: `docker-compose stop`
* Kill containers: `docker-compose kill`
* View container logs: `docker-compose logs`
* Execute command inside of container: `docker-compose exec SERVICE_NAME COMMAND` where `COMMAND` is whatever you want to run. Examples:
  * Shell into the PHP container, `docker-compose exec php-fpm bash`
  * Run symfony console, `docker-compose exec php-fpm bin/console`
  * Open a mysql shell, `docker-compose exec mysql mysql -uroot -pCHOSEN_ROOT_PASSWORD`

## Recommendations

Follow a couple of simple rules and save yourself a world of hurt.

* Run composer outside of the php container, as doing so would install all your dependencies owned by `root` within your vendor folder.
* Run commands (ie Symfony's console, or Laravel artisan) straight inside of your container. You can easily open a shell as described above and do your thing from there.
* On MacOS Docker is slow. This guide on [laradock](https://laradock.io/#improve-speed-on-macos) might help.
