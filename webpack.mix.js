const mix = require('laravel-mix');
const glob = require('glob');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


glob.sync('resources/sass/web/*.scss').map(function(file) {
    mix.sass(file, 'public/css/web');
});


glob.sync('resources/sass/sample/*.scss').map(function(file) {
    mix.sass(file, 'public/css/sample');
 });



glob.sync('resources/js/web/*.js').map(function(file) {
    mix.js(file, 'public/js/web');
});

glob.sync('resources/js/sample/*.js').map(function(file) {
    mix.js(file, 'public/js/sample');
});