<div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
    <div class="jp_rightside_job_categories_heading">
        <h4>Son Yazılar</h4>
    </div>
    <div class="jp_rightside_career_main_content">
        @foreach($posts as $post)
        <div class="jp_rightside_career_content_wrapper">
            <div class="jp_rightside_career_img">
                <img src="{{ $post->present()->firstImage(50,50,'fit',80) }}" alt="{{ $post->title }}" />
            </div>
            <div class="jp_rightside_career_img_cont">
                <h4><a href="{{ $post->url }}">{{ $post->title }}</a></h4>
                <p><i class="fa fa-calendar-o"></i> &nbsp;{{ $post->created_at->formatLocalized('%d %b %Y') }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>