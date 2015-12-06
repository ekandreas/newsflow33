<?php

// Symlink the .env file for Bedrock
set('env', 'prod');
set('keep_releases', 10);
set('shared_dirs', ['web/app/uploads']);
set('shared_files', ['.env', 'web/.htaccess', 'web/robots.txt']);
set('env_vars', '/usr/bin/env');

task('deploy:restart', function () {
    writeln('Purge cache...');
    //run("curl -s http://www.skolporten.se/wp/wp-admin/admin-ajax.php?action=purge");
})->desc('Restarting apache2 and varnish');

task( 'deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:shared',
    'deploy:symlink',
    'cleanup',
    'deploy:restart',
    'success'
] )->desc( 'Deploy your Bedrock project, eg dep deploy production' );
