const themename = 'dragonfly';

// You can declare multiple variables with one statement by starting with var and seperate the variables with a comma and span multiple lines.
// Below are all the Gulp Plugins we're using.
const gulp          = require('gulp'),
      autoprefixer  = require('gulp-autoprefixer'),
      browserSync   = require('browser-sync').create(),
      reload        = browserSync.reload,
      sass          = require('gulp-sass'),
      concat        = require('gulp-concat'),
      imagemin      = require('gulp-imagemin'),
      uglify        = require('gulp-uglify');

const root          = '../' + themename + '/',
      scss          = root + 'sass/',
      js            = root + 'src/js/',
      jsDist        = root + 'dist/js/';

const phpWatchFiles   = root + '**/*.php',
      styleWatchFiles = scss + '**/*.scss';

const jsSrc = [
      js + 'bootstrap.js',
      js + 'smooth-scroll.js',
      js + 'skip-link-focus-fix.js',
      js + 'customjs.js'
];

const imgSrc = root + 'src/images/*',
      imgDist = root + 'dist/images/';

function css() {
  return gulp.src(scss + 'style.scss', { sourcemaps: true })
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest(root, { sourcemaps: '.' }));
}

function javascript() {
  return gulp.src(jsSrc)
    .pipe(concat('dragonfly.js'))
    .pipe(uglify())
    .pipe(gulp.dest(jsDist));
}

function imgmin() {
  return gulp.src(imgSrc)
      .pipe( imagemin())
      .pipe( gulp.dest(imgDist));
}

function watch() {
    browserSync.init({
      open: 'external',
      proxy: 'https://portfolio.local/',
    });
    gulp.watch(styleWatchFiles, css);
    gulp.watch(jsSrc, javascript);
    gulp.watch(imgSrc, imgmin);
    gulp.watch([phpWatchFiles, jsDist + 'dragonfly.js', root + 'style.css']).on('change', reload);
}

exports.css = css;
exports.javascript = javascript;
exports.imgmin = imgmin;
exports.watch = watch;

const build = gulp.series(watch);
gulp.task('default', build);