// Load gulp plugins with 'require' function of nodejs
var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    gutil = require('gulp-util'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    cleanCSS = require('gulp-clean-css'),
    less = require('gulp-less'),
    path = require('path');

// Handle less error
var onError = function (err) {
    gutil.beep();
    console.log(err);
};

// Path configs
var css_files = 'assets/css/*.css', // .css files
    css_path = 'assets/css', // .css path
    js_files = 'assets/js/*.js', // .js files
    less_file = 'assets/less/style.less', // .less files
    less_path = 'assets/less/*.less',
    dist_path = 'assets/dist';

//Extension config
var extension = 'html';


/***** Functions for tasks *****/
function js() {
    return gulp.src(js_files)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(concat('dist'))
        .pipe(rename('script.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dist_path));
}

function css() {
    return gulp.src(css_files)
        .pipe(concat('dist'))
        .pipe(rename('style.min.css'))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(gulp.dest(dist_path));
}

function lessTask(err) {
    return gulp.src(less_file)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(less({ paths: [path.join(__dirname, 'less', 'includes')] }))
        .pipe(gulp.dest(css_path));
}

// The 'js' task
gulp.task('js', function () {
    return js();
});

// The 'css' task
gulp.task('css', function () {
    return css();
});

// The 'less' task
gulp.task('less', function () {
    return lessTask();
});


// The 'default' task.
gulp.task('default', function () {
    gulp.watch(less_path, function () {
        return lessTask();
    });

    gulp.watch(css_files, function () {
        console.log('The CSS task is completed!');
        return css();
    });

    gulp.watch(js_files, function () {
        console.log('The JS task is completed!');
        return js();
    });
});