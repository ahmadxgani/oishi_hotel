## Praktek Ujikom | Aplikasi Hotel berbasis web

### Tech stack:

-   laravel
-   bootstrap
-   vite
-   mysql

### The bootstrap resource provided by

```
php artisan ui bootstrap --auth # setup bootstrap for blade template
```

### Prosedur

open new terminal, and type:

```bash
git clone <repository URL>
composer install
npm install && npm run build # install and build bootstrap for production-ready
... # setup database and additional configuration
php artisan storage:link # export asset
php artisan key:generate --ansi # generate key
php artisan serve # run website
```
