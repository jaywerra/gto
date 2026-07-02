// Gulp
import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import gulpif from 'gulp-if';
import del from 'del';
import rename from 'gulp-rename';

// CSS/SASS
import sass from 'gulp-sass';
import sassGlob from 'gulp-sass-glob';
import cleanCss from 'gulp-clean-css';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';

// Images
import imagemin from 'gulp-imagemin';

// Javascript
import webpack from 'webpack-stream';
import named from 'vinyl-named';

// BrowserSync
import browserSync from "browser-sync";



const PRODUCTION = yargs.argv.prod;
const srcDir = `assets/src/`;
const distDir = `assets/dist/`;



/* --------------------------------------------
 * --Specific Tasks
 * -------------------------------------------- */

/**
 * Compile SCSS
 */
export const styles = () => {
  return src(`${srcDir}css/*.scss`)
    .pipe( sassGlob() )
    .pipe( gulpif(!PRODUCTION, sourcemaps.init()) )
    .pipe( sass({ includePaths: ['node_modules'] }).on('error', sass.logError) )
    // .pipe( gulpif(PRODUCTION, postcss([ autoprefixer ])) )
    .pipe( postcss([ autoprefixer ]) )
    .pipe( gulpif(PRODUCTION, cleanCss()) )
    .pipe( rename({ suffix: '.min' }) )
    .pipe( gulpif(!PRODUCTION, sourcemaps.write('.')) )
    .pipe( dest(`${distDir}/css`) )
    .pipe( bs.stream() );
}

/**
 * Minify Images
 */
export const images = () => {
  return src(`assets/static/img/**/*.{jpg,jpeg,png,svg,gif}`)
    .pipe( imagemin([
      imagemin.svgo({
        plugins: [
          {removeViewBox: false},
          {convertShapeToPath: false}
        ]
      })
    ]) )
    .pipe( dest(`assets/static/img`) );
}

/**
 * Compile JS
 */
export const scripts = () => {
  return src(`${srcDir}js/*.js`)
  .pipe(named())
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: [["@babel/env", { modules: false }]],
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: '[name].min.js'
    },
  }))
  .pipe(dest(`${distDir}/js`));
}


/**
 * BrowserSync
 */
const bs = browserSync.create();
export const serve = done => {
  bs.init({
    proxy: "gto.local"
  });
  done();
};
export const reload = done => {
  bs.reload();
  done();
};

/**
 * Watch
 */
export const watchForChanges = () => {
  watch(`${srcDir}css/**/*.scss`, styles);
  watch(`${srcDir}js/**/*.js`, series(scripts, reload));
  watch(`**/*.php`, reload);
}

/**
 * Clean
 */
export const clean = () => del([`${distDir}`]);



/* --------------------------------------------
 * --Gulp Tasks
 * -------------------------------------------- */
export const dev = series(clean, parallel(styles, scripts), serve, watchForChanges)
export const build = series(clean, parallel(styles, scripts))
export default dev;