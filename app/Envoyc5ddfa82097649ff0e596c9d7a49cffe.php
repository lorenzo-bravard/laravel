GNU nano 6.2                                          Envoy.blade.php                                                    
<?php $__container->servers(['web-1' => 'lorenzo_bravard@13.39.150.46']); ?>
 
<?php $__container->startTask('deploy', ['on' => ['web-1']); ?>
    php artisan config:cache
    php artisan event:cache
    php artisan route:cache
    php artisan view:cache
    php artisan migrate --force
<?php $__container->endTask(); ?>