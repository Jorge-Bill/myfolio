var gulp = require ("gulp");
var sass = require ("gulp-sass");
var imagemin = require ("gulp-imagemin");
var concat = require ("gulp-concat");
var uglify = require ("gulp-uglify");
var rename = require ("gulp-rename");

gulp.task ('compilar-css', function () {
	return gulp.src ('./source/sass/style.scss')
		.pipe (sass({outputStyle:'compressed'}))
		.pipe (gulp.dest('./css'))
});

gulp.task ('watch', function () {
	gulp.watch('./source/sass/style.scss', ['compilar-css'])
});

gulp.task ('imagens', function () {
	return gulp.src ('./imagens/*')
		.pipe (imagemin ({ progressive: true }))
		.pipe (gulp.dest('./imagens'));
});

gulp.task ('scripts', function () {
	return gulp.src ('./js/*.js')
		.pipe (concat ('all.js'))
		.pipe (gulp.dest ('js'))
		.pipe (rename ('all.min.js'))
		.pipe (uglify ())
		.pipe (gulp.dest ('./js'));
});

//default task

gulp.task ('default', ['compilar-css', 'scripts', 'imagens', 'watch']);