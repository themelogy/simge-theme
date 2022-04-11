let mix = require('laravel-mix');

let dist = 'public/themes/simge';
let node_modules = `${__dirname}/node_modules`;
let vendor = `${dist}/vendor`;
let resources = `${__dirname}/resources`;
let resourceAssets = `${resources}/assets`;

var LiveReloadPlugin = require('webpack-livereload-plugin');

mix.webpackConfig({
    plugins: [new LiveReloadPlugin()]
});

if(!isProduction) {
    mix
        .sourceMaps(true, 'source-map')
        .webpackConfig({devtool: 'source-map'});
}

mix
    //Vendors
    .copy(`${resourceAssets}/vendor/modernizr.js`, `${vendor}`)
    .copy(`${resourceAssets}/vendor/jquery.menu-aim.js`, `${vendor}`)
    .copy(`${resourceAssets}/vendor/jquery-ui.js`, `${vendor}`)
    .copy(`${resourceAssets}/vendor/own-menu.js`, `${vendor}`)
    //Jquery
    .copy(`${node_modules}/jquery/dist/jquery.min.js`, `${vendor}/jquery/js`)
    //Animate.css
    .copy(`${node_modules}/animate.css/animate.min.css`, `${vendor}/animate.css/animate.min.css`)
    //Font-awesome
    .copy(`${node_modules}/font-awesome/fonts`, `${vendor}/font-awesome/fonts`)
    .copy(`${node_modules}/font-awesome/css/font-awesome.min.css`, `${vendor}/font-awesome/css`)
    //Select2
    .copy(`${node_modules}/select2/dist/css/select2.min.css`, `${vendor}/select2/css`)
    .copy(`${node_modules}/select2/dist/js/select2.min.js`, `${vendor}/select2/js`)
    //Bootstrap
    .copy(`${node_modules}/bootstrap/dist/js/bootstrap.min.js`, `${vendor}/bootstrap/js`)
    .sass(`${node_modules}/bootstrap/scss/bootstrap.scss`, `${vendor}/bootstrap/css`)
    //Nice Select
    .copy(`${node_modules}/jquery-nice-select/js/jquery.nice-select.min.js`, `${vendor}/nice-select/js`)
    .copy(`${node_modules}/jquery-nice-select/css/nice-select.css`, `${vendor}/nice-select/css`)
    //Owl
    .copy(`${node_modules}/owl.carousel/dist/assets/owl.carousel.min.css`, `${vendor}/owl-carousel/css`)
    .copy(`${node_modules}/owl.carousel/dist/assets/owl.theme.default.min.css`, `${vendor}/owl-carousel/css`)
    .copy(`${node_modules}/owl.carousel/dist/owl.carousel.min.js`, `${vendor}/owl-carousel/js`)
    //BxSlider
    .copy(`${node_modules}/@tehnoskarb/jquery-bxslider/jquery.bxslider.js`, `${vendor}/jquery-bxslider`)
    //Magnific Popup
    .copy(`${node_modules}/magnific-popup/dist/jquery.magnific-popup.min.js`, `${vendor}/magnific-popup/js`)
    .copy(`${node_modules}/magnific-popup/dist/magnific-popup.css`, `${vendor}/magnific-popup/css`)
    .sass(`${__dirname}/resources/assets/sass/xpedia.scss`, `${dist}/css`);

mix.copy(`${__dirname}/resources/assets`, `${__dirname}/assets`);

mix.combine([`${resourceAssets}/js/xpedia.js`], `${dist}/js/xpedia.min.js`);

