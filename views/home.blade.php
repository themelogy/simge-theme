@extends('layouts.master')

@section('content')
    @themeSlide('anasayfa', 'slider')
    @include('carrental::widgets.home.mobile-reservation')
    @pageFindByOptions('settings.show_page_home', 'home.boxes')
    @carClasses('home.cars')
{{--    @include('page::widgets.home.featured')--}}
    @include('page::widgets.home.how-it-works')
{{--    @include('page::widgets.home.banner')--}}
{{--    @include('page::widgets.home.reviews')--}}
    @findPageId(12, 'home.about-us')
    @blogLatestPosts(3, 'home.latest')
@endsection