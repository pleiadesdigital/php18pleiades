"use strict";

var gulp = require('gulp');
var gutil = require('gulp-util');
var browserify = require('gulp-browserify');
var compass = require('gulp-compass');
var connect = require('gulp-connect');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');
// var minifyHTML = require('gulp-minify-html');
var concat = require('gulp-concat');
var maps = require('gulp-sourcemaps');
var gpath = require('path');
var livereload = require('gulp-livereload');

var sassSources;
var sassStyle;

sassSources = ['sass/style.scss'];

// COMPASS
gulp.task('compass', function(){
	gulp.src(sassSources)
		.pipe(compass({
			sourcemap: true,
			sass: 'sass',
			css: 'public/css',
			image: 'images',
			style: 'expanded',
			comments: true,
			require: ['susy', 'breakpoint']
		})
		.on('error', gutil.log))
		.pipe(gulp.dest(''))
		.pipe(livereload())
}); //compass task

// WATCH
gulp.task('watch', function(){
	livereload.listen();
	gulp.watch(['sass/*.scss', 'sass/*/*.scss'], ['compass']);
});

//DEFAULT
gulp.task('default', ['watch', 'compass']);
