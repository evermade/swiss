//require our modules
var gulp = require('gulp');
    sass = require('gulp-sass'),
    minifyCSS = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    autoprefixer = require('gulp-autoprefixer');

//global src, dist and watch paths
var paths = {
  css: {
    src: ['./assets/css/scss/**/*.scss', './assets/vendor/bootstrap-sass/assets/stylesheets/bootstrap/**/*.scss', './em/blocks/**/*.scss'],
    dist: './assets/dist/'
  },
  js: {
    src: ['./assets/js/*.js', './assets/js/components/**/*.js', './em/blocks/**/*.js'],
    dist: './assets/dist/'
  }
}

//lets handle the sexy ass stylesheets
gulp.task('sass', function () {
    gulp.src(paths.css.src)
        .pipe(sass({errLogToConsole: true}))
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(minifyCSS({keepBreaks:true}))
        .pipe(gulp.dest(paths.css.dist));
});

//lets handle our js scripts
gulp.task('js', function () {
   return gulp.src(paths.js.src)
      .pipe(jshint())
      .pipe(jshint.reporter('jshint-stylish'))
      .pipe(uglify())
      .pipe(concat('main.all.js'))
      .pipe(gulp.dest(paths.js.dist));
});

//default task for dev
gulp.task('default', ['sass', 'js', 'watch'], function() {});

//setup watch tasks
gulp.task('watch', function () {
  gulp.watch(paths.css.src, ['sass']);
  gulp.watch(paths.js.src, ['js']);
});