<?php

namespace Deployer;

set('default_stage', 'dev');
set('directories_to_chown', [
    'storage'         => 'www-data',
    'bootstrap/cache' => 'www-data',
]);

task('docker:up', function () {
    run(sprintf('cd %s && docker-compose up -d', get('deploy_path')));
});

task('files:chown-directories', function () {

    $directories = get('directories_to_chown');

    foreach ($directories as $directory => $user) {
        run(
            sprintf(
                'cd %s && docker-compose exec -T php chown -R %s:%s %s',
                get('deploy_path'),
                $user,
                $user,
                $directory
            )
        );
        writeln(
            sprintf(
                '<info>Directory "%s" chowned to %s</info>',
                $directory,
                $user
            )
        );
    }

});

task('composer:install', function () {

        run(
            sprintf(
                'cd %s && docker-compose exec -T php composer install',
                get('deploy_path')
            )
        );

});

task('artisan:ide-helper:generate', function () {

        run(
            sprintf(
                'cd %s && bin/artisan ide-helper:generate',
                get('deploy_path')
            )
        );
        writeln('<info>IDE helper file generated</info>');

});

task('artisan:key:generate', function () {

        run(
            sprintf(
                'cd %s && bin/artisan key:generate',
                get('deploy_path')
            )
        );
        writeln('<info>Application key generated</info>');

});

task('artisan:migrate', function () {

        run(
            sprintf(
                'cd %s && bin/artisan migrate',
                get('deploy_path')
            )
        );
        writeln('<info>DB Migrated</info>');

});

task('artisan:migrate:fresh', function () {

        run(
            sprintf(
                'cd %s && bin/artisan migrate:fresh',
                get('deploy_path')
            )
        );
        writeln('<info>DB Migrated</info>');

})->onStage('dev');

localhost('dev')
    ->stage('dev')
    ->set('deploy_path', __DIR__)
;

task('deploy', [
    'docker:up',
    'composer:install',
    'files:chown-directories',
    'artisan:migrate',
    'artisan:ide-helper:generate'
]);
