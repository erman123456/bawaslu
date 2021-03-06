## Prerequisite

- Follow [Laravel Requirement](https://laravel.com/docs/7.x#server-requirements)
- [Composer](https://getcomposer.org/)
- Postgres >= 12.0 (https://www.enterprisedb.com/download-postgresql-binaries)
- PHP >= 7.2

## Installation

```shell script
git clone <bitbucketUrl>
composer install
cp .env.example .env
php artisan key:generate
git flow init
```

- change `APP_URL` to laragon url (ex: http://pos-demo.medandev)
- download html template for see all component (https://drive.google.com/open?id=18Ndu8hs4sOZX9lcQIhqITOqupSJkg4H7)


## About Laravel

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
