@extends('layouts.master')

@section('content')

    @component('partials.components.title', ['breadcrumbs'=>'carrental.car'])
        {{ $car->present()->fullname }}
    @endcomponent
    <div class="x_car_book_sider_main_Wrapper float_left">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="lr_bc_slider_first_wrapper">
                                    <div class="owl-carousel owl-theme">
                                        @foreach($car->present()->images(800,null,'resize',80) as $image)
                                        <div class="item">
                                            <div class="lr_bc_slider_img_wrapper">
                                                <img src="{{ $image }}" alt="fresh_food_img">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont float_left">
                                    <div class="x_car_detail_slider_bottom_cont_left">
                                        <h3>{{ $car->present()->fullname }}</h3>
                                        <p>{{ $car->carclass->name }}</p>
                                    </div>
                                    <div class="x_car_detail_slider_bottom_cont_right">
                                        <h3>{{ $car->prices->price6 }} TL</h3>
                                        <p><span>Başlayan</span><br>/ Gün</p>
                                    </div>
                                    <div class="x_car_detail_slider_bottom_cont_center float_left">
                                        <p class="align-justify">Şirketimiz filosuna katılmış olan 0 km {{ $car->present()->fullname }} araçlarımız hizmetinize hazır durumdadır. Yakıt konusunda oldukça tasarruf sağlayan Kiralık {{ $car->present()->fullname }} konforu ve yol tutuşu ilede siz değerli müşterilerimize rahat bir sürüş keyfi için bir telefon kadar uzakta! Ankara oto kiralama sektöründe bu aracı en uygun fiyata {{ setting('theme::company-name') }} güvencesi ile temin edebilirsiniz.</p>
                                    </div>
                                    <div class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2">
                                        <ul>
                                            <li><i class="fa fa-users"></i> {{ $car->series->person }}</li>
                                            <li><i class="fa fa-briefcase"></i> {{ $car->series->baggage }}</li>
                                            <li><i class="fa fa-gear"></i> {{ $car->present()->transmission }}</li>
                                            <li><i class="im im-electric"></i> {{ $car->present()->fuel_type }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="x_slider_form_main_wrapper float_left"
                         data-animation="animated fadeIn">
                        <div class="x_slider_form_heading_wrapper float_left">
                            <h3>Size en uygun tarihi seçin</h3>
                        </div>
                        {!! Form::open(['route'=>'carrental.reservation.update', 'method'=>'put', 'rel'=>'nofollow']) !!}
                        {!! Form::hidden('car_id', $car->id) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_slider_form_input_wrapper float_left">
                                    <h3>@lang('themes::carrental.reservation.start location')</h3>
                                    {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker form-control', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="x_slider_form_input_wrapper float_left">
                                    <h3>@lang('themes::carrental.reservation.return location')</h3>
                                    {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker form-control', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-sec-header">
                                    <h3>@lang('themes::carrental.reservation.pickup date')</h3>
                                    <label class="cal-icon">@lang('themes::carrental.reservation.pickup date')
                                        {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-sec-header">
                                    <h3>@lang('themes::carrental.reservation.drop date')</h3>
                                    <label class="cal-icon">@lang('themes::carrental.reservation.drop date')
                                        {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-sec-header">
                                    <label class="hour-icon">
                                        {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-sec-header">
                                    <label class="hour-icon">
                                        {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="x_slider_checkbox_bottom float_left">
                                    <div class="x_slider_checout_right">
                                        <button name="reservationUpdate" type="submit" class="btn btn-primary" value="1">KİRALA</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-stack')
    {!! Theme::script('vendor/datetime.min.js') !!}
@endpush

@push('js-inline')
    <script async>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('input.date-pick, .input-daterange, .date-pick-inline').datepicker({
                todayHighlight: true,
                language: "tr",
                format: 'dd.mm.yyyy',
                startDate: new Date()
            });

            $('input.date-pick, .input-daterange input[name="pick_at"]').datepicker().on('changeDate', function () {
                $(this).datepicker('hide');
                $('.input-daterange input[name="drop_at"]').datepicker("show");
            });

            $('.input-daterange input[name="drop_at"]').datepicker().on('changeDate',function () {
                $(this).datepicker('hide');
            });

            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false,
                showMeridian: false
            });

            $('select').select2();
        });
    </script>
@endpush