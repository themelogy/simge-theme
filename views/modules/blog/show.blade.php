@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'blog.show'])
        {{ $post->title }}
    @endcomponent
    <div class="x_blog_sidebar_main_wrapper float_left padding_tb_50">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="x_blog_left_side_wrapper float_left">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="lr_bc_first_box_main_wrapper">
                                    <div class="lr_bc_first_box_img_wrapper">
                                        <img src="{{ $post->present()->firstImage(800,300,'fit',80) }}" alt="{{ $post->title }}">
                                    </div>
                                    <div class="lr_bc_first_box_img_cont_wrapper">
                                        <h2>{{ $post->title }}</h2>
                                        <ul>
                                            <li><i class="fa fa-calendar"></i>&nbsp; <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a>
                                            </li>
                                            <li><i class="fa fa-user-o"></i>&nbsp; <a href="#">{{ $post->author->fullname }}</a>
                                            </li>
                                        </ul>
                                        {!! $post->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    @include('blog::partials.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection