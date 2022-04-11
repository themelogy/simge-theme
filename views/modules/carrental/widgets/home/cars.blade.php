<!-- xs offer car tabs Start -->
<div class="x_offer_car_main_wrapper float_left padding_tb_50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper float_left">
                    <h4>En iyi fırsatlar</h4>
                    <h3>Sizin için seçtiklerimiz</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="x_offer_tabs_wrapper">
                    <ul class="nav nav-tabs">
                        @foreach($classes as $class)
                            <li class="nav-item"><a class="nav-link {{ $class->id == 1 ? 'active' : '' }}" data-toggle="tab" href="#{{ $class->slug }}{{ $class->id }}"> {{ $class->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content">
                    @foreach($classes as $class)
                    <div id="{{ $class->slug }}{{ $class->id }}" class="tab-pane {{ $class->id == 1 ? 'active' : 'fade' }}">
                        <div class="row">
                            @foreach($class->cars()->take(4)->get() as $car)
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                    @include('carrental::partials.car')
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
<!-- xs offer car tabs End -->