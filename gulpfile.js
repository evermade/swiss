var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');

//lets handle the stylesheets
gulp.task('sass', function () {
    gulp.src(['./assets/css/scss/**/*.scss', './assets/vendor/bootstrap-sass/assets/stylesheets/bootstrap/**/*.scss'])
        .pipe(sass({errLogToConsole: true}))
        .pipe(minifyCSS({keepBreaks:true}))
        .pipe(gulp.dest('./assets/dist/'));
});

gulp.task('js', function () {
   return gulp.src(['./assets/js/*.js', './assets/js/components/**/*.js'])
      .pipe(jshint())
      .pipe(jshint.reporter('jshint-stylish'))
      .pipe(uglify())
      .pipe(concat('main.all.js'))
      .pipe(gulp.dest('./assets/dist/'));
});

//default task for dev
gulp.task('default', ['sass', 'js', 'watch'], function() {});

gulp.task('watch', function () {
  gulp.watch(['./assets/css/scss/**/*.scss', './assets/vendor/bootstrap-sass/assets/stylesheets/bootstrap/**/*.scss'], ['sass']);
  gulp.watch(['./assets/js/*.js', './assets/js/components/**/*.js'], ['js']);
});