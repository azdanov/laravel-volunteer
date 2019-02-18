# Laravel Volunteer Website &middot; [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/azdanov/laravel-volunteer-website/blob/master/LICENSE)

Exploring Laravel by building a simple [BREAD](http://paul-m-jones.com/archives/291) website. [Live](https://laravel-volunteer.herokuapp.com/).

![Laravel Volunteer Screenshot](https://user-images.githubusercontent.com/6123841/48793924-25d0ef00-ed01-11e8-8cb9-53f0b2f0aa43.png "Laravel Volunteer Screenshot")

## Getting started

Read how to setup [Docker](./docker/README.md) / [Homestead](https://laravel.com/docs/5.7/homestead).

Or use [Valet](https://github.com/laravel/valet) and locally installed dependencies.

### Dependencies

-   [PHP >= 7.1.3](https://laravel.com/docs/5.7#server-requirements)
-   [Sqlite](https://www.sqlite.org/index.html)
-   [PostgreSQL](https://www.postgresql.org/)
-   [Redis](https://redis.io/)
-   [Node LTS](https://nodejs.org/en/)

### Services

These services are required for using the searching and payment functionality in this demo.

-   [Algolia](https://www.algolia.com/) - [Free plan](https://www.algolia.com/users/sign_up/hacker)
-   [Braintree](https://www.braintreepayments.com/) - [Sandbox version](https://www.braintreepayments.com/sandbox)

### Installing

[Composer](https://getcomposer.org/) and [Yarn](https://yarnpkg.com/en/) are required to install and bundle the dependencies.

By default `sqlite` is enabled in the `.env` for a faster start in development.
Similarly `redis` is disabled for queues, session, etc.

```sh
composer install

cp .env.example .env
touch database/db.sqlite

php artisan key:generate
php artisan migrate
php artisan db:seed

yarn
yarn dev
```

## Deployment on Heroku

The demo can be hosted on Heroku in such a way.

For this example the demo is named: `my_demo_name`.

1. Install [Heroku-CLI](https://devcenter.heroku.com/articles/heroku-cli)
2. Provision Heroku add-ons and build-packs:
    ```sh
    heroku apps:create my_demo_name
    heroku addons:create heroku-postgresql:hobby-dev --app my_demo_name
    heroku addons:create heroku-redis:hobby-dev --app my_demo_name
    heroku buildpacks:add heroku/php --app my_demo_name
    heroku buildpacks:add heroku/nodejs --app my_demo_name
    ```
3. Add Heroku to git remote:
    ```sh
    heroku git:remote --app $app_name
    ```
4. Set environmental variables on Heroku:
    ```sh
    heroku config:set --app my_demo_name APP_KEY=$(php artisan --no-ansi key:generate --show)
    heroku config:set --app my_demo_name QUEUE_CONNECTION=redis SESSION_DRIVER=redis CACHE_DRIVER=redis SCOUT_QUEUE=true

    heroku config:set --app my_demo_name BRAINTREE_ENVIRONMENT=sandbox
    heroku config:set --app my_demo_name BRAINTREE_MERCHANT_ID=<id>
    heroku config:set --app my_demo_name BRAINTREE_PUBLIC_KEY=<key>
    heroku config:set --app my_demo_name BRAINTREE_PRIVATE_KEY=<key>
    
    heroku config:set --app my_demo_name ALGOLIA_APP_ID=<id>
    heroku config:set --app my_demo_name ALGOLIA_SECRET=<secret>
    heroku config:set --app my_demo_name MIX_ALGOLIA_CLIENT_ID=<id>
    heroku config:set --app my_demo_name MIX_ALGOLIA_CLIENT_KEY=<key>
    heroku config:set --app my_demo_name MIX_ALGOLIA_CLIENT_INDEX=<index>
    ```
5. Deploy to Heroku
    ```sh
    git push heroku master
    ```
6. Run demo migrations
    ```sh
    heroku run -a my_demo_name php artisan migrate
    heroku run -a my_demo_name php artisan db:seed
    ```
7. Enable debugging (Optional, be sure not to run this on production, and prune telescope entries regularly)
    ```sh
    heroku config:set --app my_demo_name APP_ENV=development APP_DEBUG=true APP_LOG_LEVEL=debug TELESCOPE_ENABLED=true
    ```

## License

[MIT](./LICENSE)
