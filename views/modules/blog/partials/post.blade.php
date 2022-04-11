<div class="col-md-12">
    <div class="lr_bc_first_box_main_wrapper">
        <div class="lr_bc_first_box_img_wrapper">
            <img src="{{ $post->present()->firstImage(800,300,'fit',80) }}" alt="{{ $post->title }}">
        </div>
        <div class="lr_bc_first_box_img_cont_wrapper">
            <h2>{{ $post->title }}</h2>
            <ul>
                <li><i class="fa fa-calendar"></i>&nbsp; <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a>
                </li>
                <li><i class="fa fa-user-o"></i>&nbsp; <a href="#">{{ $post->author->fullname }}</a>
                </li>
            </ul>
            <p>{{ strip_tags($post->intro) }}</p> <span><a href="{{ $post->url }}">{{ trans('global.buttons.read more') }} &nbsp;<i class="fa fa-angle-double-right"></i></a></span>
        </div>
    </div>
</div>