@servers(['workers' => ['nathan-dolard-villard@13.39.150.46']])

@task('put-into-prod', ['on' => 'workers'])
    cd nathan-dolard-villard.dhonnabhain.me
    git checkout production
    cd app
    composer update
    npm install
    npm run build
    php artisan migrate
    composer install --optimize-autoloader --no-dev
    php artisan optimize:clear
    php artisan optimize
@endtask

