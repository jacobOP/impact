'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');


gulp.task('styles', function() {
    gulp.src('styles/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCSS({compatibility: 'ie8'}))
        .pipe(rename('impact.min.css'))
        .pipe(gulp.dest('styles/'));
});

gulp.task('scripts', function() {
    gulp.src('js/*.js')
        .pipe(uglify())
        .pipe(rename('theme.min.js'))
        .pipe(gulp.dest('js/min/'))
});

//Watch task
gulp.task('default',function() {
    gulp.watch('styles/scss/*.scss',['styles']);
    gulp.watch('js/*.js', ['scripts']);
});

