const { src, dest, watch, series, parallel } = require('gulp'); // Importación de módulos de Gulp
const sass = require('gulp-sass')(require('sass')); // Compilar Sass a CSS
const autoprefixer = require('autoprefixer'); // Agregar prefijos de navegadores al CSS
const postcss = require('gulp-postcss'); // Procesamiento de CSS
const sourcemaps = require('gulp-sourcemaps'); // Generación de mapas de origen
const cssnano = require('cssnano'); // Minificación de CSS
const concat = require('gulp-concat'); // Concatenación de archivos
const terser = require('gulp-terser-js'); // Minificación de JavaScript
const rename = require('gulp-rename'); // Renombrar archivos
const imagemin = require('gulp-imagemin'); // Optimización de imágenes
const notify = require('gulp-notify'); // Notificaciones de Gulp
const cache = require('gulp-cache'); // Caché de Gulp
const clean = require('gulp-clean'); // Limpieza de directorios
const webp = require('gulp-webp'); // Conversión de imágenes a formato WebP

const paths = {
    scss: 'src/scss/**/*.scss', // Ruta de archivos Sass
    js: 'src/js/**/*.js', // Ruta de archivos JavaScript
    imagenes: 'src/img/**/*' // Ruta de archivos de imagen
};

function css() {
    return src(paths.scss) // Obtener archivos Sass
        .pipe(sourcemaps.init()) // Iniciar generación de mapas de origen
        .pipe(sass()) // Compilar Sass a CSS
        .pipe(postcss([autoprefixer(), cssnano()])) // Aplicar prefijos de navegadores y minificar CSS
        .pipe(sourcemaps.write('.')) // Escribir mapas de origen
        .pipe(dest('./public/build/css')); // Guardar archivos CSS resultantes en el directorio de destino
}

function javascript() {
    return src(paths.js) // Obtener archivos JavaScript
        .pipe(sourcemaps.init()) // Iniciar generación de mapas de origen
        .pipe(concat('bundle.js')) // Concatenar archivos JavaScript en un solo archivo llamado 'bundle.js'
        .pipe(terser()) // Minificar JavaScript
        .pipe(sourcemaps.write('.')) // Escribir mapas de origen
        .pipe(rename({ suffix: '.min' })) // Renombrar archivo agregando el sufijo '.min'
        .pipe(dest('./public/build/js')); // Guardar archivo JavaScript resultante en el directorio de destino
}

function imagenes() {
    return src(paths.imagenes) // Obtener archivos de imagen
        .pipe(cache(imagemin({ optimizationLevel: 3 }))) // Optimizar imágenes utilizando caché
        .pipe(dest('./public/build/img')) // Guardar imágenes optimizadas en el directorio de destino
        .pipe(notify({ message: 'Imagen Completada' })); // Mostrar notificación de finalización de tarea
}

function versionWebp() {
    return src(paths.imagenes) // Obtener archivos de imagen
        .pipe(webp()) // Convertir imágenes a formato WebP
        .pipe(dest('./public/build/img')) // Guardar imágenes en formato WebP en el directorio de destino
        .pipe(notify({ message: 'Imagen Completada' }));
} // Mostrar notificación de finalización de tarea

function watchArchivos() {
    watch(paths.scss, css); // Observar cambios en archivos Sass y ejecutar la tarea "css"
    watch(paths.js, javascript); // Observar cambios en archivos JavaScript y ejecutar la tarea "javascript"
    watch(paths.imagenes, imagenes); // Observar cambios en archivos de imagen y ejecutar la tarea "imagenes"
    watch(paths.imagenes, versionWebp); // Observar cambios en archivos de imagen y ejecutar la tarea "versionWebp"
}

exports.css = css; // Exportar la tarea "css" para ser utilizada desde la línea de comandos
exports.watchArchivos = watchArchivos; // Exportar la tarea "watchArchivos" para ser utilizada desde la línea de comandos
exports.default = parallel(css, javascript, imagenes, versionWebp, watchArchivos);
exports.build = parallel(css, javascript, imagenes, versionWebp);
// Exportar una tarea predeterminada que ejecuta en paralelo las tareas "css", "javascript", "imagenes", "versionWebp" y "watchArchivos"