const mix = require('laravel-mix');
const SbAdminResAsset = 'resources/assets/admin/';
const SbAdminPublicAsset = 'public/admins/';




//sb admin mix
mix.copy(SbAdminResAsset+'vendor/fontawesome-free/webfonts', SbAdminPublicAsset+'webfonts');
mix.copy(SbAdminResAsset+'img', SbAdminPublicAsset+'img');
mix.copy(SbAdminResAsset+'vendor/bootstrap/js/bootstrap.bundle.min.js.map', SbAdminPublicAsset+'js');
mix.copy(SbAdminResAsset+'vendor/chartjs', SbAdminPublicAsset+'js/chartjs');

mix.copy(SbAdminResAsset+'js/demo', SbAdminPublicAsset+'js/demo');




mix.copy(SbAdminResAsset+'vendor/datatables', SbAdminPublicAsset+'js/datatables');


mix.copy(SbAdminResAsset+'js/demo', SbAdminPublicAsset+'js/demo');





mix.js('resources/js/app.js', 'public/js')
    .combine([
        SbAdminResAsset+'vendor/jquery/jquery.min.js',
        SbAdminResAsset+'vendor/bootstrap/js/bootstrap.bundle.min.js',
        SbAdminResAsset+'vendor/jquery-easing/jquery.easing.min.js',
        SbAdminResAsset+'js/sb-admin-2.min.js',
    ], SbAdminPublicAsset+'js/sb-admin.js')
    .styles([
        SbAdminResAsset+'vendor/fontawesome-free/css/all.min.css',
        SbAdminResAsset+'css/sb-admin-2.min.css',
    ], SbAdminPublicAsset+'css/sb-admin.css').sourceMaps();
mix.version()

    //dingo mixing

    const DingoResourcesAsset = 'resources/assets/frontend/';
    const DingoPublicAsset = 'public/frontend/dingo';

    mix.copy(DingoResourcesAsset+'webfonts', DingoPublicAsset + 'webfonts');
    mix.copy(DingoResourcesAsset+'fonts', DingoPublicAsset + 'fonts');
    mix.copy(DingoResourcesAsset+'img', DingoPublicAsset + 'img');
    mix.copy(DingoResourcesAsset+'js/swiper.min.js.map', DingoPublicAsset+'js');
    mix.copy(DingoResourcesAsset+'css/style.css.map', DingoPublicAsset+'css');




mix.js('resources/js/app.js', 'public/frontend/dingo/js/')
        .combine([
            DingoResourcesAsset + 'js/jquery-1.12.1.min.js',
            DingoResourcesAsset + 'js/popper.min.js',
            DingoResourcesAsset + 'js/bootstrap.min.js',
            DingoResourcesAsset + 'js/jquery.magnific-popup.js',
            DingoResourcesAsset + 'js/swiper.min.js',
            DingoResourcesAsset + 'js/masonry.pkgd.js',
            DingoResourcesAsset + 'js/owl.carousel.min.js',
            DingoResourcesAsset + 'js/slick.min.js',
            DingoResourcesAsset + 'js/gijgo.min.js',
            DingoResourcesAsset + 'js/jquery.nice-select.min.js',
            DingoResourcesAsset + 'js/custom.js',
        ], DingoPublicAsset + 'js/dingo.js')
        .styles([
            DingoResourcesAsset + 'css/bootstrap.min.css',
            DingoResourcesAsset + 'css/animate.css',
            DingoResourcesAsset + 'css/owl.carousel.min.css',
            DingoResourcesAsset + 'css/themify-icons.css',
            DingoResourcesAsset + 'css/flaticon.css',
            DingoResourcesAsset + 'css/magnific-popup.css',
            DingoResourcesAsset + 'css/slick.css',
            DingoResourcesAsset + 'css/gijgo.min.css',
            DingoResourcesAsset + 'css/nice-select.css',
            DingoResourcesAsset + 'css/all.css',
            DingoResourcesAsset + 'css/style.css',
        ], DingoPublicAsset + 'css/dingo.css')
        .sourceMaps()

        mix.version()


    .browserSync('127.0.0.1:8000');
