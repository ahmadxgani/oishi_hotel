## Praktek Ujikom | Aplikasi Hotel berbasis web

### Tech stack:

-   laravel
-   bootstrap
-   vite
-   mysql

### Prosedur

open new terminal, and type:

```bash
git clone <repository URL>
composer install
php artisan ui bootstrap --auth # setup bootstrap for blade template
npm install && npm run build # install and build bootstrap for production-ready
... # setup database and additional configuration
php artisan storage:link --tag=laravel-assets --ansi --force # export asset
php artisan vendor:publish --tag=laravel-assets --ansi --force
php artisan key:generate --ansi # generate key
php artisan serve # run website
```
