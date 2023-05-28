# filament-peek-demo

![Screenshots of the edit page and preview modal](./screenshot.jpg)

This is a demo project showcasing the [Peek](https://github.com/pboivin/filament-peek/) plugin for [Filament](https://filamentphp.com/).

## Initial setup

```sh
composer install

cp .env.example .env

touch database/database.sqlite

php artisan migrate:fresh --seed

php artisan storage:link

php artisan serve
```

The site should be available locally on [localhost:8000](http://localhost:8000)

You can log into the admin at [localhost:8000/admin](http://localhost:8000/admin) with the following credentials:

- Email: admin@test.test
- Password: admin@test.test
