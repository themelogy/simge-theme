<div class="x_car_offer_main_boxes_wrapper float_left">
    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">
        <div class="x_car_offer_img x_car_offer_img_list float_left">
            <a href="{{ $car->url }}">
                <img src="{{ $car->present()->firstImage(null,100,'resize',50) }}" alt="{{ $car->fullname }}" title="{{ $car->fullname }}" />
            </a>
        </div>
        <div class="x_car_offer_price x_car_offer_price_list float_left">
            <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                <h3>{{ $car->prices->price6 }}</h3>
                <p><span>Başlayan</span> <br>/ Gün</p>
            </div>
        </div>
    </div>
    <div class="x_car_offer_starts_list_img_cont">
        <div class="x_car_offer_heading x_car_offer_heading_list">
            <h2><a href="{{ $car->url }}">{{ $car->present()->fullname }}</a></h2>
            <p>{{ $car->carclass->name }}</p>
            <br/>
            <a href="{{ $car->url }}" class="btn btn-primary btn-sm">Rezervasyon</a>
        </div>
        <div class="x_car_offer_heading x_car_offer_heading_listing">
            <ul>
                <li><i class="fa fa-users"></i> {{ $car->series->person }}</li>
                <li><i class="fa fa-briefcase"></i> {{ $car->series->baggage }}</li>
                <li><i class="fa fa-gear"></i> {{ $car->present()->transmission }}</li>
                <li><i class="im im-electric"></i> {{ $car->present()->fuel_type }}</li>
            </ul>
        </div>

    </div>
</div>