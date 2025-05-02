### How to Run this Website/Page?

1. Using git clone this repository by running:

```bash
    git clone
```

2. Run The following commands:

```bash
    npm install # to install frontend dependencies 
    npm run build # to build css and js assets

    composer install # to install backend dependencies (laravel)
    php artisan serve # to run laravel server

```

3. To migrate data and add data:

```bash
    php artisan migrate
    php artisan db:seed
```

1. For environment variables, just rename '.env.main' to '.env'