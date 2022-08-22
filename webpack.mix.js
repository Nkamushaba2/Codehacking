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
       .styles([
        'themess/styles/blog-post.css',
        'themess/styles/bootstrap.css',
        'themess/styles/bootstrap.min.css',
        'themess/styles/font-awesome.css',
        'themess/styles/metisMenu.css',
        'themess/styles/sb-admin-2.css',
        'themess/styles/styles.css'

       ],'./public/css/libs.css')

           .scripts([
            'themess/scripts/bootstrap.min.js',
            'themess/scripts/bootstrap.js',
            'themess/scripts/jquery.js',
            'themess/scripts/metisMenu.js',
            'themess/scripts/sb-admin-2.js',
            'themess/scripts/scripts.js'
           ],'./public/js/libs.js')

           ;
