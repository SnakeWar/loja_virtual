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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/admin/js/sb-admin.js', 'public/js')
    .js('resources/admin/vendor/bootstrap/js/bootstrap.bundle.min.js', 'public/js')
    .js('resources/admin/vendor/bootstrap/js/bootstrap.js', 'public/js')
    .js('resources/admin/vendor/jquery/jquery.js', 'public/js')
    .js('resources/admin/vendor/jquery-easing/jquery.easing.min.js', 'public/js')
    .js('resources/admin/js/sb-admin-datatables.js', 'public/js')
    .css('resources/admin/css/sb-admin.css', 'public/css')
    .css('resources/admin/vendor/bootstrap/css/bootstrap.css', 'public/css')
    .css('resources/admin/vendor/bootstrap/css/bootstrap-grid.css', 'public/css')
    .css('resources/admin/vendor/bootstrap/css/bootstrap-reboot.css', 'public/css')
    .css('resources/admin/vendor/font-awesome/css/font-awesome.min.css', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
