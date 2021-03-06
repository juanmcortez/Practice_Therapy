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

mix.js('resources/assets/js/practice_therapy.js', 'public/js')
    .extract(
        [
            'axios',
            'bootstrap',
            'jquery',
            'lodash',
            'popper.js'
        ]
    )
    .sass('resources/assets/sass/practice_therapy.scss', 'public/css');
