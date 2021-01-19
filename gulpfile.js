var gulp = require("gulp"),
    sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano"),
    sourcemaps = require("gulp-sourcemaps");

var paths = {
    styles: {
        src: "wp-content/themes/softech_theme/assets/sass/**/*.sass",
        dest: "wp-content/themes/softech_theme/"
    }
};


    
function style() {
    
    return (
        gulp
            .src(paths.styles.src)
            // Initialize sourcemaps before compilation starts
            .pipe(sourcemaps.init())
            .pipe(sass())
            .on("error", sass.logError)
            .pipe(postcss([autoprefixer(), cssnano()]))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(paths.styles.dest))
    );
    
}

    
function watch() {
    style();

    gulp.watch(paths.styles.src, style);
}

    
exports.watch = watch

