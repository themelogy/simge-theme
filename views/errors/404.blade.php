@extends('layouts.master')

@section('content')
    @component('partials.components.title')
        404 - Sayfa Bulanamadı.
    @endcomponent

    <div class="x_about_seg_main_wrapper float_left padding_tb_50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>404 - Sayfa Bulanamadı.</h3>
                    <p>Aradığınız sayfa bulunamadı</p>
                </div>
            </div>
        </div>
    </div>
@stop
