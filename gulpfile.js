var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var notify = require('gulp-notify');
var rename = require('gulp-rename');

gulp.task('field_css', function() {
	return gulp.src(['fields/reveal/assets/scss/style.scss'])
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(gulp.dest('fields/reveal/assets/css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(cssmin())
		.pipe(gulp.dest('fields/reveal/assets/css'))
		.pipe(notify("CSS generated!"))
	;
});

// JS
gulp.task('field_js', function() {
	gulp.src('fields/reveal/assets/js/src/**/*.js')
		.pipe(concat('script.js'))
		.pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('fields/reveal/assets/js/dist'))
		.pipe(notify("JS generated!"))
	;
});

// Default
gulp.task('default',function() {
	gulp.watch('fields/reveal/assets/scss/**/*.scss',['field_css']);
	gulp.watch('fields/reveal/assets/js/src/**/*.js',['field_js']);
});