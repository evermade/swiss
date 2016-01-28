//require our modules
var gulp = require('gulp');
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    plumber = require('gulp-plumber'),
    autoprefixer = require('gulp-autoprefixer');

//global src, dist and watch paths
var paths = {
  css: {
    src: ['assets/css/scss/**/*.scss', 'assets/vendor/bootstrap-sass/assets/stylesheets/**/*.scss'],
    dist: 'assets/dist/css/'
  },
  js: {
    src: ['assets/js/*.js', 'assets/js/components/**/*.js'],
    dist: 'assets/dist/js/'
  }
}

//lets handle the sexy ass stylesheets
gulp.task('sass', function () {
  setTimeout(function(){
    gulp.src(paths.css.src)
        .pipe(sass({errLogToConsole: true}))
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(cssnano())
        .pipe(gulp.dest(paths.css.dist));
  }, 500);
});

//lets handle our js scripts
gulp.task('js', function () {
  setTimeout(function(){
   gulp.src(paths.js.src)
      .pipe(plumber())
      .pipe(jshint())
      .pipe(jshint.reporter('jshint-stylish'))
      .pipe(uglify())
      .pipe(concat('myquery.js'))
      .pipe(gulp.dest(paths.js.dist));
   }, 500);
});

//default task for dev
gulp.task('default', ['sass', 'js', 'watch'], function() {});

//setup watch tasks
gulp.task('watch', function () {
  gulp.watch(paths.css.src, ['sass']);
  gulp.watch(paths.js.src, ['js']);
});