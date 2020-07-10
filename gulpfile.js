var gulp = require("gulp"),
    sass = require("gulp-sass"),
    browserSync = require("browser-sync");
const sourcemaps = require('gulp-sourcemaps');

gulp.task("sass", function () {
    return gulp.src("sass/main.sass").pipe(sass()).pipe(gulp.dest("css"));
});

gulp.task("scss", function () {
    return gulp
        .src("scss/styles.scss")
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest("css"));
});

gulp.task("watch", function () {
    gulp.watch("scss/styles.scss", gulp.parallel("scss"));
});

gulp.task("browser-sync", function () {
    browserSync({
        server: {
            baseDir: "app",
        },
    });
});

