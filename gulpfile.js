'use strict';

var gulp = require('gulp');
var del = require('del');
var run = require('run-sequence');
var $ = require('gulp-load-plugins')();

var manifest = {
    path: 'manifest.json'
};

gulp.task('styles', function () {
  return gulp.src('dev/styles/main.scss')
    .pipe($.plumber())
    .pipe($.sass({errLogToConsole: true}))
    .pipe($.autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
    .pipe(gulp.dest('dev/dist/css'));
});

gulp.task('scripts', function () {
      return gulp.src('dev/js/theme.js')
        .pipe($.jshint())
        .pipe($.jshint.reporter('default'))
        .pipe($.concat('main.js', {
            newLine: ';'
        }))
        .pipe($.uglify())
        .pipe(gulp.dest('dev/dist/js'));
});

gulp.task('scripts-vendor', function () {
    return gulp.src([
                     'dev/bower_components/jquery/dist/jquery.js',
                     'dev/bower_components/fastclick/lib/fastclick.js',
                     'dev/bower_components/foundation/js/foundation/foundation.js',
                     'dev/bower_components/foundation/js/foundation/foundation.dropdown.js',
                     'dev/bower_components/foundation/js/foundation/foundation.topbar.js',
                     'dev/bower_components/headroom.js/dist/headroom.js',
                     'dev/bower_components/headroom.js/dist/jQuery.headroom.js',
                     '../../plugins/customizable-sharing-buttons/js/smpl-share.js',
                     '../../plugins/customizable-sharing-buttons/js/sharing-buttons.js'
                     ])
    .pipe($.concat('vendor.js', {newLine: ';'}))
    .pipe($.uglify())
    .pipe(gulp.dest('dev/dist/js'));
});

gulp.task('scss-lint', function() {
    return gulp.src("dev/style/**/*.scss")
        .pipe($.scssLint());
});

gulp.task('clean', function(cb) {
    del([
        "assets/css/main*.css",
        "assets/js/main*.js",
        "assets/js/vendor*.js"
    ], cb);
});

gulp.task('clean-original', function(cb) {
    del([
        "assets/css/main.css",
        "assets/js/main.js",
        "assets/js/vendor.js"
    ], cb);
});

gulp.task('version', function () {
    return gulp.src([
                    "dev/dist/css/main.css",
                    "dev/dist/js/vendor.js",
                    "dev/dist/js/main.js"
                    ], {base: "dev/dist"})
        .pipe(gulp.dest("assets"))
        .pipe($.rev())
        .pipe(gulp.dest("assets"))
        .pipe($.rev.manifest(manifest))
        .pipe(gulp.dest("assets"));
});

gulp.task('notify', function(){
    return gulp.src("./")
            .pipe($.notify("Build complete!"));
});

gulp.task('watch', function () {
  gulp.watch('dev/styles/**/*.scss', ['styles', 'version']);
});

gulp.task('build', ['clean'], function(callback) {
    run(['styles', 'scripts', 'scripts-vendor'],
        'version',
        'clean-original',
        'notify',
        callback);
});
