@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'carrental.reservation'])
        {{ trans('themes::carrental.titles.reservation car', ['car'=>$car->fullname]) }}
    @endcomponent
    <div class="x_car_book_sider_main_Wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="x_car_checkout_right_main_box_wrapper float_left">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                @include('carrental::partials.reservation-detail')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="x_carbooking_right_section_wrapper float_left">
                        <div class="row">
                            <div class="col-md-12">
                                @include('carrental::partials.reservation-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-inline')
    {!! Captcha::script() !!}
@endpush