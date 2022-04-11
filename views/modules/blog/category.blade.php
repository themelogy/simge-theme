@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'blog.category'])
        {{ $category->name }}
    @endcomponent
    <div class="x_blog_sidebar_main_wrapper float_left padding_tb_50">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="x_blog_left_side_wrapper float_left">
                        <div class="row">
                            @foreach($posts as $post)
                                @include('blog::partials.post')
                            @endforeach
                            @unset($post)
                            {!! $posts->links('partials.pagination') !!}
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