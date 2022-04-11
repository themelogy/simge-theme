@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'carrental.prices'])
        {{ trans('themes::carrental.titles.prices') }}
    @endcomponent
    <div class="x_title_num_mian_Wrapper float_left">
        <div class="container">
            <div class="row">
                @foreach($cars as $car)
                    <div class="col-md-4">
                        <div class="x_car_offer_main_boxes_wrapper float_left">
                            <div class="x_car_offer_img ">
                                <a href="{{ $car->url }}" style="min-height: 100px;">
                                    <img src="{{ $car->present()->firstImage(null,100,'resize',50) }}" alt="{{ $car->fullname }}" title="{{ $car->fullname }}" />
                                </a>
                            </div>
                            <div class="x_car_offer_heading float_left">
                                <h2><a href="{{ $car->url }}">{{ $car->present()->fullname }}</a></h2>
                                <p>{{ $car->carclass->name }}</p>
                            </div>
                            <table class="table table-fluid table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price1') }}</th>
                                    <td>{{ $car->prices->price1 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price2') }}</th>
                                    <td>{{ $car->prices->price2 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price3') }}</th>
                                    <td>{{ $car->prices->price3 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price4') }}</th>
                                    <td>{{ $car->prices->price4 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price5') }}</th>
                                    <td>{{ $car->prices->price5 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price6') }}</th>
                                    <td>{{ $car->prices->price6 }} TL</td>
                                </tr>
                            </table>
                            <div class="x_car_offer_heading float_left">
                                <ul>
                                    <li><i class="fa fa-users"></i> {{ $car->series->person }}</li>
                                    <li><i class="fa fa-briefcase"></i> {{ $car->series->baggage }}</li>
                                    <li><i class="fa fa-gear"></i> {{ $car->present()->transmission }}</li>
                                    <li><i class="im im-electric"></i> {{ $car->present()->fuel_type }}</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

