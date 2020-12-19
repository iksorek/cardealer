const mix = require('laravel-mix');

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

mix.js('resources/js/init.js', 'public/js');
mix.js('resources/js/ajax.js', 'public/js');
mix.js('resources/js/helper-plugins.js', 'public/js');


mix.styles([
    'resources/css/style.css',

], 'public/css/all-mixed.css');
