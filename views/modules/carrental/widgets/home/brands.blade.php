<!-- xs offer car tabs Start -->
<div class="x_partner_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-album-slider">
                    <ul class="album-slider">
                        @foreach($brands as $brand)
                        <li class="album-slider__item">
                            <figure class="album">
                                <img src="{{ $brand->present()->firstImage(null,50,'resize',80) }}" alt="{{ $brand->title }}">
                            </figure>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- btc team Wrapper Start -->