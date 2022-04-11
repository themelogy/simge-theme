{!! seo_helper()->render() !!}
<meta name="MobileOptimized" content="320" />
<link rel="shortcut icon" type="image/png" href="{{ Theme::url('images/favicon.png') }}" />
<!--Template style -->
<script src="{{ mix('/themes/simge/vendor/jquery/js/jquery.min.js') }}"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/animate.css/animate.min.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/bootstrap/css/bootstrap.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/font-awesome/css/font-awesome.min.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/select2/css/select2.min.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/nice-select/css/nice-select.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/owl-carousel/css/owl.carousel.min.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/vendor/magnific-popup/css/magnific-popup.css') }}">
<link media="all" rel="stylesheet" type="text/css" href="{{ mix('/themes/simge/css/xpedia.css') }}">
@stack('js-head-inline')