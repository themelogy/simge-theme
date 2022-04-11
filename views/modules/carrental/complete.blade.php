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
                                <div class="x_car_checkout_right_main_box_wrapper float_left">
                                    <div class="order-done">
                                        <i class="icon-checked"><img src="{{ Theme::url('images/icon-checked.png') }}" alt=""></i>
                                        @if(Session::has('success'))
                                            <h4>{{ Session::get('success') }}</h4>
                                        @endif
                                        <hr>
                                        <h4>Rezervasyon Bilgileri</h4>
                                        <ul class="row list-unstyled">
                                            <li class="col-md-6">
                                                <h6>Rezervasyon Tarihleri</h6>
                                                <p>Alış Tarihi <span>{{ $reservation->pick_at->formatLocalized('%d %B %Y') }} {{ $reservation->pick_at->format('H:i') }}</span>
                                                </p>
                                                <p>Dönüş Tarihi <span>{{ $reservation->drop_at->formatLocalized('%d %B %Y') }} {{ $reservation->drop_at->format('H:i') }}</span>
                                                </p>
                                                <p>Toplam <span>{{ $reservation->total_day }} gün</span>
                                                </p>
                                            </li>
                                            <li class="col-md-6">
                                                <h6>Alış/Dönüş Lokasyonu</h6>
                                                <p>Alış Lokasyonu <span>{{ $reservation->present()->start_location }}</span>
                                                </p>
                                                <p>Dönüş Lokasyonu <span>{{ $reservation->present()->return_location }}</span>
                                                </p>
                                            </li>
                                            <li class="col-md-6">
                                                <h6>Araç</h6>
                                                <p>{!! $car->brand->present()->logo(40).' '.$car->fullname !!} <span>{{ $car->present()->price }} TL</span>
                                                </p>
                                                <p>{{ $car->carclass->name }}</p>
                                            </li>
                                            <li class="col-md-6">
                                                <h6>Toplam (KDV Hariç)</h6>
                                                <p><span>{{ $car->present()->total_price }}</span>
                                                </p>
                                            </li>
                                            <li class="col-md-12">
                                                <h6>Kimlik Bilgileri</h6>
                                                <p>{{ $reservation->fullname }}
                                                    <br>{{ $reservation->tc_no }}
                                                    <br>{{ $reservation->phone }}
                                                    <br>{{ $reservation->mobile_phone }}
                                                    <br>{{ $reservation->email }}
                                                    <br>{{ $reservation->requests }}
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-body-inline')
    @if(Setting::has('carrental::conversion-code'))
    {!! setting('carrental::conversion-code') !!}
    @endif
@endpush

@push('js-inline')
    {!! Captcha::script() !!}
@endpush