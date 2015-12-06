<?php
date_default_timezone_set('Europe/Stockholm');

include_once 'vendor/deployer/deployer/recipe/common.php';
include_once 'pull.php';
include_once 'deploy.php';

server( 'development', 'newsflow.dev', 22 )
    ->env('deploy_path','/var/www')
    ->env('branch', 'master')
    ->stage('development')
    ->user( 'vagrant','vagrant' );

server( 'production', 'andreasek.se', 22 )
    ->env('deploy_path','/mnt/persist/www/newsflow33')
    ->user( 'root' )
    ->env('branch', 'master')
    ->stage('production')
    ->identityFile();

set('repository', 'git@github.com:ekandreas/newsflow33.git');

