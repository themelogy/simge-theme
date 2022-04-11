@extends('layouts.master')

@section('content')
    @component('partials.components.title', ['breadcrumbs'=>'contact'])
        {{ trans('themes::contact.title') }}
    @endcomponent
    <!-- xs offer car tabs Start -->
    <div class="x_contact_title_main_wrapper float_left padding_tb_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper x_offer_car_heading_wrapper_contact float_left">
                        <h4>get in touch</h4>
                        <h3>@lang('themes::contact.contact us')</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                    <div class="x_contact_title_icon_cont_main_box">
                        <div class="x_contact_title_icon">	<i class="fa fa-map-marker"></i>
                        </div>
                        <div class="x_contact_title_icon_cont">
                            <h3><a href="#">Adres</a></h3>
                            <p>@setting('theme::address')</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                    <div class="x_contact_title_icon_cont_main_box">
                        <div class="x_contact_title_icon">	<i class="flaticon-phone-call"></i>
                        </div>
                        <div class="x_contact_title_icon_cont">
                            <h3>Telefon</h3>
                            <p><a href="tel:@setting('theme::phone')">@setting('theme::phone')</a>
                            <br><a href="tel:@setting('theme::mobile')">@setting('theme::mobile')</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                    <div class="x_contact_title_icon_cont_main_box">
                        <div class="x_contact_title_icon">	<i class="flaticon-mail-send"></i>
                        </div>
                        <div class="x_contact_title_icon_cont">
                            <h3><a href="#">E-posta</a></h3>
                            <p><a href="mailto:{!! Html::email(setting('theme::email')) !!}">{!! Html::email(setting('theme::email')) !!}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map section start -->
    @include('contact::map')
    <!-- map section End -->
    @includeIf('contact::form')
@endsection