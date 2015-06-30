var gulp = require('gulp');
var webpack = require('webpack-stream');
var webpackConfig = require('./webpack.config.js');

gulp.task('webpack', function() {
    gulp.src('')
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest(''))
});

gulp.task('build', ['webpack']);

gulp.task('watch', function() {
    gulp.watch('./assets/**/*', ['build']);
});

gulp.task('default', ['build', 'watch']);

