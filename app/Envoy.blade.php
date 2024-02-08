@servers(['web' => 'lorenzo-bravard@13.39.150.46'])

@story('deploy')
    update-depandencies
    update-db
    optimize
@endstory

@task('update-depandencies', ['on' => 'web'])
    composer install 
    npm install
    npm run build
@endtask

@task('update-db', ['on' => 'web'])
    php artisan migrate 
@endtask

@task('optimize', ['on' => 'web'])
    composer install --optimize-autoloader --no-dev
    php artisan optimize
@endtask