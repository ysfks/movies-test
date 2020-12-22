// webpack.mix.js

let mix = require('laravel-mix');
mix.setPublicPath('public');
mix.js([
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/app.js',
    ], 'js/app.js');