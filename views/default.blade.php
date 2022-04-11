@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs' => 'page'])
        {{ $page->title }}
    @endcomponent

    <div class="x_about_seg_main_wrapper float_left padding_tb_50">
        <div class="container">
            @if(isset($page->parent) && ($page->parent->settings->show_menu ?? false) && !($page->settings->full_page ?? false))
                @include('page::partials.menu')
            @elseif($page && ($page->settings->list_page ?? false))
                @include('page::partials.list')
            @elseif($page && !($page->settings->list_page ?? false) && !($page->parent->settings->show_menu ?? false))
                @if(@$page->settings->show_slide)
                    @include('page::partials.slide-image')
                @else
                    @include('page::partials.image')
                @endif
            @endif

            @pageTags($page, 10)
        </div>
    </div>
@stop
