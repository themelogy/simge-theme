@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs' => 'faq.index'])
        @lang('themes::faq.title')
    @endcomponent
    <div class="x_about_seg_main_wrapper float_left padding_tb_50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="accordion">
                    @foreach($faqs->sortBy('ordering') as $faq)
                    <div class="card">
                        <div class="card-header" id="heading{{ $faq->slug }}">
                            <h5 class="mb-0">
                                <a class="btn btn-link {{ $loop->iteration == 1 ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $faq->slug }}" aria-expanded="{{ $loop->iteration == 1 ? 'true' : false }}" aria-controls="collapse{{ $faq->slug }}">
                                    {{ $faq->title }}
                                </a>
                            </h5>
                        </div>

                        <div id="collapse{{ $faq->slug }}" class="collapse {{ $loop->iteration == 1 ? 'show' : '' }}" aria-labelledby="heading{{ $faq->slug }}" data-parent="#accordion">
                            <div class="card-body">
                                {!! $faq->content !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection