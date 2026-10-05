
# MediCare — Ultra Premium Laravel Healthcare

A premium healthcare website built as a single Laravel application using Blade, Tailwind CSS, Alpine.js, Livewire-ready architecture and Filament.

## Stack

- Laravel 12
- PHP 8.2+
- Blade
- Tailwind CSS
- Alpine.js
- Filament
- MySQL
- Vite

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Configure your MySQL database in `.env`, then:

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

For local development:

```bash
npm run dev
php artisan serve
```

## Important

The project intentionally does not include `vendor` or `node_modules`.

## Main routes

- /
- /about
- /doctors
- /services
- /specialties
- /pricing
- /testimonials
- /faq
- /portfolio
- /blog
- /contact
- /appointments/create
- /dashboard
- /admin

## Design

The public UI has been rebuilt as an original premium healthcare experience inspired by the supplied reference. Proprietary template source code and copyrighted assets are not copied.
