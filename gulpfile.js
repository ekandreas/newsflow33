var elixir = require('laravel-elixir');

require('laravel-elixir-bower');

var paths = {
	'jquery': './vendor/bower_components/jquery/',
	'material': './vendor/bower_components/bootstrap-material-design/sass/',
	'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
}

elixir(function(mix) {

    mix.sass("resources/assets/sass/app.scss", 'public/assets/css/app.css', { includePaths: [
    	paths.bootstrap + 'stylesheets/',
    	paths.material + 'css/'
    	]});

    mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/assets/fonts')

    mix.scripts([
    		'app.js',
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.material + "js/material.js",
            paths.material + "js/ripples.js"
        ], 'public/assets/js/all.js');

    mix.version( [
    	'public/assets/js/all.js',
    	'public/assets/css/app.css'
    ]);

    mix.copy('resources/assets/img', 'public/build/assets/img/');

    mix.browserSync({
        proxy: 'newsflow.dev'
    });

});
