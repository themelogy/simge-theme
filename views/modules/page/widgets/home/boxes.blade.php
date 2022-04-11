<!-- xs Slider bottom title Start -->
<div class="x_slider_bottom_title_main_wrapper">
    @foreach($pages as $page)
        <div class="x_slider_bottom_box_wrapper">
            <i class="{{ $page->settings->icon }}"></i>
            <h3><a href="{{ $page->url }}">{{ $page->title }}</a></h3>
            <p>{{ $page->settings->slogan->{locale()} }}</p>
        </div>
    @endforeach
</div>
<div class="clearfix"></div>
<!-- xs Slider bottom title End -->