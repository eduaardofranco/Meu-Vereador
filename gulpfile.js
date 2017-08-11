"use strict";

var gulp = require('gulp'),
	sass = require('gulp-sass'),
	rename = require('gulp-rename'),
	minifyCSS = require('gulp-clean-css'),
	gutil = require('gulp-util'),
	notify = require('gulp-notify'),
	plumber = require('gulp-plumber'),
	wait = require('gulp-wait'),
	sassDir = './assets/css/**/*';

// compile sass to .css
gulp.task('sass', function() {

	//error
	 var onError = function(err) {
        notify.onError({
            title:    "Gulp",
            subtitle: "Failure!",
            message:  "Error: <%= error.message %>",
            sound:    "Beep"
        })(err);

        this.emit('end');
    };

	// return gulp.src('assets/css/*.scss')
	return gulp.src(sassDir)
	.pipe(wait(500))
	.pipe(plumber({errorHandler: onError}))
	.pipe(sass())
	.pipe(rename('style.css'))
	.pipe(gulp.dest('build/css'))

	//sucess
	.pipe(notify({
       title: 'Gulp',
       subtitle: 'success',
       message: 'Sass task',
       sound: "Pop"
   }));
});


// minify css, rename and put in build/css
gulp.task('minify', function() {
	gulp.src('build/css/style.css')
	.pipe(minifyCSS())
	.pipe(rename('style.min.css'))
	.pipe(gulp.dest('build/css'));
});

//watching changes
gulp.task('watch', function () {
	gulp.watch(sassDir, ['sass']);
});

// run default function of gulp
gulp.task('default', ['watch']);