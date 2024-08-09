const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js');


mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
