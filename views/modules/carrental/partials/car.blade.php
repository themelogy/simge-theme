<div class="x_car_offer_main_boxes_wrapper float_left">
        <div class="x_car_offer_img ">
            <a href="{{ $car->url }}" style="min-height: 100px;">
                <img src="{{ $car->present()->firstImage(null,100,'resize',50) }}" alt="{{ $car->fullname }}" title="{{ $car->fullname }}" />
            </a>
        </div>
        <div class="x_car_offer_price float_left">
            <div class="x_car_offer_price_inner">
                <h3>{{ $car->prices->price6 }}</h3>
                <p><span>Başlayan</span>
                    <br>/ Gün</p>
            </div>
        </div>
        <div class="x_car_offer_heading float_left">
            <h2><a href="{{ $car->url }}">{{ $car->present()->fullname }}</a></h2>
            <p>{{ $car->carclass->name }}</p>
        </div>
        <div class="x_car_offer_heading float_left">
            <ul>
                <li><i class="fa fa-users"></i> {{ $car->series->person }}</li>
                <li><i class="fa fa-briefcase"></i> {{ $car->series->baggage }}</li>
                <li><i class="fa fa-gear"></i> {{ $car->present()->transmission }}</li>
                <li><i class="im im-electric"></i> {{ $car->present()->fuel_type }}</li>
            </ul>
        </div>
    </div>
