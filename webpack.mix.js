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

	.sass('app/Modules/Auth/Presentation/Assets/sass/admin.scss', 'public/css/admin.css')
	.sass('app/Modules/Auth/Presentation/Assets/sass/auth.scss', 'public/css/auth.css')
	.copy('app/Modules/Auth/Presentation/Assets/css/app.css', 'public/css/backend-app.css')

	.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
