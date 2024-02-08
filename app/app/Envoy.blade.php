GNU nano 6.2                                          Envoy.blade.php                                                    
@servers(['web-1' => 'lorenzo_bravard@13.39.150.46'])
 
@task('deploy', ['on' => ['web-1'])
    git pull origin {{ $branch }}
    php artisan migrate --force
@endtask