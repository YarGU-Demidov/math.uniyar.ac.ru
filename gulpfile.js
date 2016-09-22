var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	cleanCSS = require('gulp-clean-css'),
	rename = require('gulp-rename'),
	browserSync = require('browser-sync').create(),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

gulp.task('styles', function () {
	return gulp.src('themes/math/assets/sass/*.sass')
		.pipe(sass({
			includePaths: require('node-bourbon').includePaths
		}).on('error', sass.logError))
		.pipe(autoprefixer({browsers: ['last 15 versions'], cascade: false}))
		.pipe(gulp.dest('themes/math/assets/css'))
		.pipe(browserSync.stream());
});

gulp.task('min-styles', function () {
	return gulp.src('themes/math/assets/sass/*.sass')
		.pipe(sass({
			includePaths: require('node-bourbon').includePaths
		}).on('error', sass.logError))
		.pipe(autoprefixer({browsers: ['last 15 versions'], cascade: false}))
		.pipe(rename({suffix: '.min', prefix: ''}))
		.pipe(cleanCSS())
		.pipe(gulp.dest('themes/math/assets/css'))
		.pipe(browserSync.stream());
});

gulp.task('scripts', function () {
	return gulp.src([
		'./themes/math/assets/libs/modernizr/modernizr.js',
		'./themes/math/assets/libs/jquery/dist/jquery.min.js',
		'./themes/math/assets/libs/waypoints/waypoints.min.js',
		'./themes/math/assets/libs/animate/animate-css.js',
		'./themes/math/assets/libs/plugins-scroll/plugins-scroll.js'
	])
		.pipe(concat('libs.js'))
		// .pipe(uglify()) //Minify libs.js
		.pipe(gulp.dest('./themes/math/assets/js/'));
});

gulp.task('watch', function () {
	gulp.watch('themes/math/assets/sass/*.sass', ['styles']);
	gulp.watch('themes/math/assets/sass/*.sass', ['min-styles']);
	gulp.watch('themes/math/assets/libs/**/*.js', ['scripts']);
});

gulp.task('default', ['min-styles', 'styles', 'scripts', 'watch']);
