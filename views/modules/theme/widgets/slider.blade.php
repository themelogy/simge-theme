<div class="slider-area float_left">
    <div id="carousel-example-generic" class="carousel slide">
        <div class="carousel-inner" role="listbox">
            @foreach($slides as $slide)
            <div class="carousel-item active" style="background: url({{ $slide->present()->firstImage(1280,600,'fit',80) }}) no-repeat; background-size: cover;">
                <div class="carousel-captions">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="content">
                                    <h2 data-animation="animated fadeInLeft">{{ $slide->title }}</h2>
                                    <h3 data-animation="animated fadeInRight">{{ $slide->sub_title }}</h3>
                                    <p data-animation="animated bounceInUp">
                                        {!! $slide->content !!}
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block">
                                <div class="content_tabs">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            @include('carrental::widgets.home.reservation')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- hs Slider End -->