<!-- xs offer car tabs Start -->
<div class="x_ln_car_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_ln_car_heading_wrapper float_left">
                    <h3>Bizden Haberler</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="btc_ln_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        @foreach($posts as $post)
                        <div class="item">
                            <div class="btc_team_slider_cont_main_wrapper">
                                <div class="btc_ln_img_wrapper float_left">
                                    <img src="{{ $post->present()->firstImage(370,200,'fit',80) }}" alt="{{ $post->title }}">
                                </div>
                                <div class="btc_ln_img_cont_wrapper float_left">
                                    <h4><a href="{{ $post->url }}">{{ $post->title }}</a></h4>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> {{ $post->created_at->formatLocalized('%d %B %Y') }}</li>
                                        <li><i class="fa fa-user"></i> {{ $post->author->fullname }}</li>
                                    </ul>
                                    <p>{{ str_limit(strip_tags($post->intro), 150) }}</p>
                                    <span><a href="{{ $post->url }}">@lang('global.buttons.read more') <i class="fa fa-angle-double-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--js Start-->