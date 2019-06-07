const gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    babel = require('gulp-babel'),
    concat = require('gulp-concat'),
    log = require('./logger'),
    rename = require('gulp-rename'),
    stylus = require('gulp-stylus'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify');

////////////////
// Config Vars//
////////////////
const $vendors = './node_modules',
    // Variables de los VENDORS en CSS
    $cssVendorsFolder = './assets/css/vendors',
    $bootstrap = `${$vendors}/bootstrap/dist/css/bootstrap.css`,
    $dashboard = `${$vendors}/startbootstrap-sb-admin/css/sb-admin.css`,
    $notyfCSS = `${$vendors}/notyf/notyf.min.css`,
    $cssVendors = [$bootstrap, $dashboard, $notyfCSS],
    // Variables de los VENDORS en JS
    $jsVendorsFolder = './assets/js/vendors',
    $notyf = `${$vendors}/notyf/notyf.min.js`,
    $jsVendors = [$notyf];

////////////////////
// Error FUNCTION //
////////////////////
function displayError(error) {
    log(error.toString(), 'red');
    this.emit('end');
}
////////////
// Stylus //
////////////
gulp.task('stylus', () => {
    return gulp
        .src('./stylus/main.styl')
        .pipe(sourcemaps.init())
        .pipe(
            stylus({
                compress: true
            })
        )
        .on('error', displayError)
        .pipe(
            autoprefixer({
                browsers: ['last 2 versions'],
                cascade: true
            })
        )
        .pipe(rename('main.min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/css'))
        .on('end', () => {
            log('Stylus Compilado', 'green');
        });
});
////////////
// DEV JS //
////////////
gulp.task('js', function() {
    return gulp
        .src('./dev-js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(babel())
        .on('error', displayError)
        .pipe(concat('main.min.js'))
        .pipe(
            uglify({
                mangle: {
                    eval: true
                }
            })
        )
        .on('error', displayError)
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/js'))
        .on('end', () => {
            log('JS Compilado', 'yellow');
        });
});
//////////////////////////////////////
// Css Vendors                      //
// Concatenates and minifies vendors //
//////////////////////////////////////
gulp.task('css-vendors', () => {
    return gulp
        .src($cssVendors, { base: $vendors })
        .pipe(concat('cssVendors.css'))
        .pipe(minify())
        .pipe(rename('vendors.min.css'))
        .pipe(gulp.dest($cssVendorsFolder))
        .on('end', () => {
            log('Vendors (CSS) Concatenados y minificados', 'blue');
        });
});
//////////////////////////////////////
// JS Vendors                       //
// Concatenates and minifies vendors//
//////////////////////////////////////
gulp.task('js-vendors', () => {
    return gulp
        .src($jsVendors, { base: $vendors })
        .pipe(concat('jsVendors.js'))
        .pipe(rename('vendors.min.js'))
        .on('error', displayError)
        .pipe(gulp.dest('./public/js/vendors'))
        .on('end', () => {
            log('Js Vendors Compilados', 'yellow');
        });
});
//////////////
// WATCHERS //
//////////////
gulp.task('watchers', done => {
    log('Watchers Corriendo', 'yellow');
    gulp.watch('./stylus/**/*.styl', gulp.series('stylus'));
    gulp.watch('./dev-js/**/*.js', gulp.series('js'));
    done();
});

gulp.task(
    'dev',
    gulp.series(
        'stylus',
        'css-vendors',
        'js',
        'js-vendors',
        gulp.parallel('watchers')
    )
);