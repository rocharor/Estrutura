var gulp = require('gulp');
var stylus = require('gulp-stylus');
var notify = require("gulp-notify");
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
/*
var minifyCss = require('gulp-minify-css');
var pngquant = require('imagemin-pngquant');
*/

/*
//cria o css minificado
gulp.task('minify-css', function() {
    return gulp.src('./../assets/css/*.css') //Arquivos Originais
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('./../assets/css'))
    //.pipe( notify( 'CSS OK!' ));
});


//Otimza JS CSS IMG
gulp.task( 'otimizar-site', function() {
    gulp.run('scripts', 'minify-css', 'imagemin');
});
*/

//Unifica bibliotes JS e CSS
gulp.task('unificalibs', function() {
    gulp.src([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/bootstrap-notify/bootstrap-notify.min.js',
        'node_modules/jquery.maskedinput/src/jquery.maskedinput.js',
        'node_modules/vue/dist/vue.min.js'
    ])
    .pipe(concat('libs.min.js'))
    .pipe(gulp.dest('libs/'))
    .pipe( notify( 'Bibliotecas JS unificadas com sucesso!' ))

    return gulp.src([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/animate.css/animate.min.css'
    ])
    .pipe(concat('libs.min.css'))
    .pipe(gulp.dest('libs/'))
    .pipe( notify( 'Bibliotecas CSS unificadas com sucesso!' ));
});

//Otimizar imagens JPG
gulp.task('imagemin', function () {
    /*return gulp.src(['images/*.jpg','.images/*.png'])*/
    return gulp.src(['images/*.jpg'])
    .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}]
        /*,
        use: [pngquant()]*/
    }))
    .pipe(gulp.dest('images'));
});

//Observa todos .styl e gera css no formato compress (compress: true/false)
gulp.task('stylus', function () {
  gulp.src('stylus/*.styl')
    .pipe(stylus({
      compress: true
    }))
    .pipe(gulp.dest('css'))
    .pipe( notify( 'CSS Atualizado com sucesso!' ));
});

//Roda watch no stylus
gulp.task( 'default', function() {
    gulp.watch('css/stylus/*.styl', ['stylus']);
});
