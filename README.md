## My Laravel - liverwire Starterkit with Jetstream

This is my Laravel-LivewireKit with Jetstream

- Laravel Installer 5.8.5
- laravel framework": ^11.9
- laravel/jetstream": ^5.2,
- laravel pint (https://laravel.com/docs/11.x/pint)
- flowbite (https://flowbite.com)
- heriocons for blade (https://github.com/blade-ui-kit/blade-heroicons & https://heroicons.com)
- remixicons (https://remixicon.com)

## PhpStorm

- Add filewatcher
- Add autostart run dev

## authorization

Instead of email you need to log in with username

- Changed database migration user, add softdelets
- Changed UserFactory
- Changed model User
- Changed fortify
- Changed jetstream
-

## Change files:

- CreateNewUser
- UpdateUserProfileInformation
- Login.blade.php
- Register.blade.php
- update-profile-information-form.blade.php
- navigation-menu.blade.php

## Not changed:

- all view files and components

## After clone:

- composer install
- composer update
- cp .env.example .env
- npm install
- php artisan key:generate
- php artisan migrate.
- php artisan db:seed.

## License

The Laravel framework & this StarterKit is open-sourced software licensed under
the [MIT license](https://opensource.org/licenses/MIT).
# TBV_TripleB
