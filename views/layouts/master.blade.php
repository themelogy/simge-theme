<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ LaravelLocalization::getCurrentLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ LaravelLocalization::getCurrentLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<!--[endif]-->
<head>
    @include('partials.metadata')
    @if(Setting::has('core::analytics-script'))
        {!! setting('core::analytics-script') !!}
    @endif
</head>
<body>
@stack('js-body-inline')
@include('partials.header')
@yield('content')
@include('partials.footer')
@env('local')
    <script src="http://localhost:35729/livereload.js"></script>
@endenv
</body>
@include('partials.scripts')
</html>
