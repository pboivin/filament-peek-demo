# filament-peek-demo

This is a demo project showcasing the [Peek](https://github.com/pboivin/filament-peek/) plugin for [Filament](https://filamentphp.com/).

**Full-page Preview Modal**

![Screenshots of the edit page and preview modal](./art/01-page-preview.jpg)

---

**Builder Field Preview and Editor**

![Screenshots of the edit page and builder field preview](./art/02-builder-preview.jpg)

---

**[Tiptap Editor](https://github.com/awcodes/filament-tiptap-editor) Integration**

![Screenshots of the edit page and the Tiptap Editor form field](./art/03-tiptap.jpg)

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

- Email: `admin@test.test`
- Password: `admin@test.test`
