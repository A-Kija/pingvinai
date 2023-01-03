// webpack.mix.js

let mix = require('laravel-mix');

mix.js('src/app.js', 'public')
    .sass('src/app.scss', 'public');