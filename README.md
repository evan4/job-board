# Laravel project

This is a Laravel project for educational purpose.

## Project deployment

Run command in shell

```
composer install
```

## DB

To configure the database, copy the file from .env.example to .env and edit this file.

To create db, run the command:

```
php artisan migrate
```

Optional. You can fill project dummy data. For this run the command in shell:

```
php artisan db:seed
```

## Project development

To run project locally you can run commands in shell:

```
php artisan serve
```

Open another tab in your terminal and run for build css & js files:

```
npm run dev
```
