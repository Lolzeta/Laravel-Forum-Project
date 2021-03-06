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
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/style.scss', 'public/css')
   .js('resources/js/validations/registerValidation.js', 'public/js/validations')
   .js('resources/js/modernizr/videoCheck.js','public/js/modernizr')
    .babel([
      'resources/js/messages/create.js',
      'resources/js/messages/paginate.js',
      'resources/js/messages/delete.js',
      'resources/js/messages/edit.js',
      'resources/js/messages/show.js',
      'resources/js/messages/quill.js',
    ],'public/js/messages/crudMessages.js')
   ;
