//our basic dependencies
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var watch = require('gulp-watch');
var plumber = require('gulp-plumber');
var jshint = require('gulp-jshint');
var stylish = require('jshint-stylish');

//some utils
var wait = require('gulp-wait');
var debug = require('gulp-debug');

//as we sometimes work on droplets, file saving may have latency so this is used as a delay to accomodate such behaviour
var gulpTaskTimeout = 100;

/**
 * global build paths
 * under the custom index is where you want to any WP plugins, or any additional watch files, this way
 * stream is smaller and task is quicker
 */
var paths = {
    sass: {
        src: ['assets/css/scss/**/*.scss'],
        dist: 'assets/dist/css/'
    },
    js: {
        src: ['assets/js/*.js', 'assets/js/components/**/*.js'],
        dist: 'assets/dist/js/'
    }
};

/**
 * compile, prefix and minify our sass
 */
gulp.task('sass', [], function() {
    return gulp.src(paths.sass.src)
        .pipe(wait(gulpTaskTimeout))
        //.pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({ compatibility: 'ie9' }))
        //.pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest(paths.sass.dist));
});

/**
 * compile, uglify and concat our js
 */
gulp.task('js', [], function() {
    return gulp.src(paths.js.src)
        .pipe(wait(gulpTaskTimeout))
        //.pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter(stylish))
        .pipe(concat('myquery.js'))
        .pipe(uglify())
        //.pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest(paths.js.dist));
});

/**
 * our watch tasks
 */
gulp.task('watch', ['sass', 'js'], function() {
    gulp.watch(paths.js.src, ['js']);
    gulp.watch(paths.sass.src, ['sass']);
});

/**
 * the default gulp task used for development
 */
gulp.task('default', ['watch'], function() {});

/**
 * the build task triggered when deploying
 */
gulp.task('build', ['sass', 'js'], function() {});