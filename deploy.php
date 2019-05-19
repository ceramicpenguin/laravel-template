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

task('chown-directories', function () {

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

localhost('dev')
    ->stage('dev')
    ->set('deploy_path', __DIR__)
;

task('deploy', [
    'docker:up',
    'chown-directories',
]);
