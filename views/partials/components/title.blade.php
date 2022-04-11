<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>{{ $slot ?? 'Başlık' }}</h1>
                </div>
            </div>
            @isset($breadcrumbs)
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_right_heading">
                    <div class="btc_tittle_right_cont_wrapper">
                        {!! Breadcrumbs::renderIfExists($breadcrumbs) !!}
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
</div>