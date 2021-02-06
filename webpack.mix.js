const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/client/app.js', 'public/js/client').version(); 
mix.sass('resources/sass/client/app.scss', 'public/css/client').version();

mix.js('resources/js/dashboard/app.js', 'public/js/dashboard').version(); 
mix.sass('resources/sass/dashboard/app.scss', 'public/css/dashboard').version();
