const mix = require('laravel-mix');

mix.setPublicPath('resources/dist')

mix.js('resources/js/app.js', 'resources/dist/js')
    .postCss('resources/css/app.css', 'resources/dist/css', [require('tailwindcss')])
    .version();
