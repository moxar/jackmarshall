var gulp = require('gulp');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var minify = require('gulp-minify-css');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');

gulp.task('styles', function() {
	gulp.src('resources/assets/less/app.less')
		.pipe(plumber())
	    .pipe(concat('app.less'))
	    .pipe(less())
		.pipe(rename({extname: '.css'}))
		.pipe(autoprefixer())
		.pipe(minify())
		.pipe(gulp.dest('public/'));
});

gulp.task('fonts', function() {
	gulp.src([
		'bower_components/bootstrap/fonts/*',
		'bower_components/fontawesome/fonts/*',
	])
		.pipe(gulp.dest('public/fonts/'));
});

gulp.task('scripts', function () {
	gulp.src([
		'resources/assets/js/**/*.js',
	])
	.pipe(plumber())
	.pipe(concat('app.js'))
	.pipe(uglify())
	.pipe(rename({extname: '.js'}))
	.pipe(gulp.dest('public'));
});

gulp.task('vendors', function () {
	gulp.src([
		'bower_components/jquery/dist/jquery.js',
                'bower_components/jqueryui/jquery-ui.min.js',
		'bower_components/bootstrap/dist/js/bootstrap.js',
                'bower_components/moment/min/moment.min.js',
                'bower_components/moment/locale/fr.js',
                'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
	])
	.pipe(plumber())
	.pipe(concat('vendors.js'))
	.pipe(uglify())
	.pipe(rename({extname: '.js'}))
	.pipe(gulp.dest('public'));
});

gulp.task('watch', function () {
	gulp.watch('resources/assets/less/*.less', ['styles']);
	gulp.watch('resources/assets/js/*/*.js', ['scripts']);
	gulp.watch('resources/assets/js/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'fonts', 'scripts']);
