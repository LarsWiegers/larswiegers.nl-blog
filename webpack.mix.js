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

mix.browserSync('localhost:8000')
	.copy('app/Modules/Home/Presentation/Assets/css/main.css', 'public/css/home-main.css')
	.copy('app/Modules/Home/Presentation/Assets/images', 'public/images/home-images')

	.copy('app/Modules/User/Presentation/Assets/images', 'public/images')

	.sass('app/Modules/Backend/Presentation/Assets/app.scss', 'public/css/backend.css')

	.js('app/Modules/Blog/Presentation/Assets/js/app.js', 'public/js/blog.js')
    .sass('resources/sass/app.scss', 'public/css');
