var gulp       = require('gulp');
var concat     = require('gulp-concat');
var stylus     = require('gulp-stylus');
var plumber    = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
var source     = require('vinyl-source-stream');
var buffer     = require('vinyl-buffer');

var path = {
    styles: {
        watch: './css/**/*.styl',
        src: [
            './node_modules/normalize.css/normalize.css',
            './css/src/main.styl'
        ],
        dest: {
            folder: './css/',
            filename: 'build'
        }
    },
    scripts: {
        watch: ['./js/src/**/*.js', './js/main.js'],
        src: [
            './js/main.js'
        ],
        dest: {
            folder: './js/',
            filename: 'build'
        }
    }
}

gulp.task('styles', function() {
    gulp.src(path.styles.src)
        .pipe(concat(path.styles.dest.filename + '.styl'))
        .pipe(plumber())
        .pipe(stylus())
        .pipe(gulp.dest(path.styles.dest.folder));
});

gulp.task('scripts', function() {
    var bundle = browserify(path.scripts.src)
        .bundle()
        .on('error', function (err) {
            console.log(err.toString());
            this.emit("end");
        })
        .pipe(source(path.scripts.dest.filename + '.js'))
        .pipe(gulp.dest(path.scripts.dest.folder));
});

gulp.task('watch', function() {
    gulp.watch(path.styles.watch, ['styles']);
    gulp.watch(path.scripts.watch, ['scripts']);
});