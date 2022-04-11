@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'carrental.index'])
        {{ trans('themes::carrental.titles.rental cars') }}
    @endcomponent
    <div class="x_title_num_mian_Wrapper float_left">
        <div class="container">
            <div class="x_title_inner_num_wrapper float_left">
                <div class="booking-item-dates-change mb30">
                    {!! Form::open(['route' => 'carrental.index', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="x_slider_form_input_wrapper float_left">
                                        <p>@lang('themes::carrental.reservation.start location')</p>
                                        {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker form-control', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-sec-header">
                                                <p>@lang('themes::carrental.reservation.pickup date')</p>
                                                <label class="cal-icon">@lang('themes::carrental.reservation.pickup date')
                                                    {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding: 0 5px;">
                                            <p>@lang('themes::carrental.reservation.pickup hour')</p>
                                            <div class="form-sec-header">
                                                <label class="hour-icon">
                                                    {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="x_slider_form_input_wrapper float_left">
                                        <p>@lang('themes::carrental.reservation.return location')</p>
                                        {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker form-control', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-sec-header">
                                                <p>@lang('themes::carrental.reservation.drop date')</p>
                                                <label class="cal-icon">@lang('themes::carrental.reservation.drop date')
                                                    {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5" style="padding: 0 5px;">
                                            <p>@lang('themes::carrental.reservation.drop hour')</p>
                                            <div class="form-sec-header">
                                                <label class="hour-icon">
                                                    {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <p>&nbsp;</p>
                            <button name="reservationUpdate" type="submit" class="btn btn-primary btn-lg" value="1"><i
                                        class="fa fa-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="x_carbook_right_select_box_wrapper mb-30">
                            @php
                                $sortList = collect();
                                $sortList->put('price1', ['key'=>'price', 'name'=>'Fiyat (Azalan)', 'dir'=>'desc']);
                                $sortList->put('price2', ['key'=>'price', 'name'=>'Fiyat (Artan)', 'dir'=>'asc']);
                                $sortList->put('name1', ['key'=>'name', 'name'=>'Marka (A-Z)', 'dir'=>'desc']);
                                $sortList->put('name2', ['key'=>'name', 'name'=>'Marka (Z-A)', 'dir'=>'asc']);
                                $currentSort = request()->has('sort') && request()->has('dir') ? $sortList->where('key', request()->get('sort'))->where('dir', request()->get('dir'))->first() : $sortList->first();
                            @endphp
                            <select onChange="window.document.location.href=this.options[this.selectedIndex].value;"
                                    class="form-control">
                                @foreach($sortList->all() as $sort)
                                    <option value="{{ route('carrental.index', ['sort'=>$sort['key'], 'dir'=>$sort['dir'], 'category'=>request()->get('category'), 'brand'=>request()->get('brand')]) }}"> {{ $sort['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                        <div class="x_carbook_right_tabs_box_wrapper float_left">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home"> <i class="flaticon-menu"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1"><i class="flaticon-list"></i></a>
                                </li>
                            </ul>
                            <p><span>{{ $cars->total() }}</span> araç bulundu</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="x_car_book_tabs_content_main_wrapper">
                            <div class="tab-content">
                                <div id="home" class="tab-pane active">
                                    <div class="row">
                                        @foreach($cars as $car)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                @include('carrental::partials.car')
                                            </div>
                                        @endforeach
                                        <div class="col-md-12">
                                            {!! $cars->appends(request()->query())->links('partials.pagination') !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="row">
                                        @foreach($cars as $car)
                                            <div class="col-md-12">
                                                @include('carrental::partials.car-h')
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="x_car_book_left_siderbar_wrapper float_left mb-30 mt-30">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            @carClasses('sidebar.classes')
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            @carBrands('sidebar.brands')
                        </div>
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
    <script>
        (function () {
            $('.date-pick').datepicker({
                todayHighlight: true,
                language: "tr",
                format: 'dd.mm.yyyy',
                startDate: new Date()
            });

            var pick_at = $('input[name="pick_at"]');
            var drop_at = $('input[name="drop_at"]');

            function dropMinDate() {
                var start_at = new Date(pick_at.datepicker('getDate'));
                start_at.setDate(start_at.getDate() + 1);
                drop_at.datepicker('setStartDate', start_at);
                drop_at.datepicker('setDate', start_at);
            }

            pick_at.datepicker().on('changeDate', function () {
                dropMinDate();
                $(this).datepicker('hide');
            });

            drop_at.datepicker().on('changeDate', function () {
                $(this).datepicker('hide');
            });


            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false,
                showMeridian: false
            });

            $('select').select2();
        })(jQuery);
    </script>
@endpush