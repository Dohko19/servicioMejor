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

// mix.js('resources/js/core/jquery.min.js', 'public/js/core/')
// 	.js('resources/js/plugins/moment.min.js', 'public/js/plugins')
// 	.js('resources/js/plugins/bootstrap-datetimepicker.js', 'public/js/plugins')
// 	.js('resources/js/core/popper.min.js', 'public/js/core/')
// 	.js('resources/js/core/bootstrap-material-design.min.js', 'public/js/core/');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// mix.js('resources/js/material-kit.js', 'public/js')
//    .sass('resources/sass/material-kit.scss', 'public/css');


// mix.js('resources/js/plugins/nouislider.min.js', 'public/js/plugins')
// 	.js('resources/js/plugins/jquery.sharrre.js', 'public/js/plugins/');
	// .js('resources/js/plugins/bootstrap-datetimepicker.js', 'public/js/plugins/');
// mix.sass('resources/sass/material-kit/*', 'public/css/material-kit/');


mix.browserSync({
    proxy: 'http://mejorservicio.sw'
});

if(mix.inProduction())
{
	mix.version();
}