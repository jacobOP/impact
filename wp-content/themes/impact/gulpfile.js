'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var ugilfy = require('gulp-uglify');
var minify = require('gulp-minify-css');
var rename = require('gulp-rename');


gulp.task('styles', function() {
    gulp.src('styles/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('styles/'));
});

//Watch task
gulp.task('default',function() {
    gulp.watch('styles/scss/*.scss',['styles']);
});