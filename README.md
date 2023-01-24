# UBa-Web

This repository contains code for the University of Bamenda website. It will be used to manage the main content for the university.

## Requirements

This project uses php8 and up and it runs with laravel 9+. Make sure to have the latest versions of php and composer installed on your machine.
You will also need to install at least node v16 to build the files for the frontend (which makes use of vite).

## Project setup

Follow the steps below to get up and running with the application on your local machine

1. Create a new env file from the `.env.exmaple` using the command

```bash
    cp .env.example .env
```

2. Update your env `APP_NAME` and database name
3. Run `php artisan key:generate` to generate appliction key
4. Install composer dependencies

```bash
    composer install
```

5. Install npm dependencies using and autmatically start the dev server

```bash
    npm install && npm run dev
```

6. Migrate and seed your database using:

```bash
    php artisan migrate --seed
```

7. Run the command below to setup users and choose the appropriate number id to be the admin of the app

```bash
    php artisan shield:install --fresh
```

## Features established at the moment

1. Post managment
2. Users management
3. Testimonial
4. Services
5. Updates
6. Projects
7. FAQs
8. Events
9. Contact messages (from contact form)
10. Partners

### Nice to have packages for filament

-   [ ] Icon picker package [Filament icon picker](https://filamentphp.com/plugins/icon-picker)
-   [ ] Import files into tables [Filament import](https://filamentphp.com/plugins/import)
-   [ ] Editor Js integration [Filament editor Js](https://filamentphp.com/plugins/editorjs)
-   [ ] Excel export integration [Filament export](https://filamentphp.com/plugins/pxlrbt-excel)

### Navigation structure

-   Admission (Static pages)
    -   Admission guide
    -   Check admission list
    -   Apply for admission
-   Add webmail link to footer
-   Research
    -   Research profiles
    -
