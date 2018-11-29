var gulp = require("gulp");
var watch = require("gulp-watch");
var browserSync = require("browser-sync").create();
var urlToPreview =
  "http://localhost/~ronyortiz/training2017/php2018/pleiadesmoon/app/public/";

// WATCH Task
gulp.task("watch", function() {
  browserSync.init({
    notify: false,
    proxy: urlToPreview,
    ghostMode: false
  });
  watch("./app/public/index.php", function() {
    browserSync.reload();
  });

  watch("./app/assets/styles/**/*.css", function() {
    gulp.start("cssInject");
  });
});

/* BrowserSync's CSS Inject */
gulp.task("cssInject", ["styles"], function() {
  return gulp.src("./app/public/styles/style.css").pipe(browserSync.stream());
});
