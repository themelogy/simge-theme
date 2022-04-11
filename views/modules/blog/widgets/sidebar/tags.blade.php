@isset($tags)
    @if($tags->count()>0)
<div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
    <div class="jp_rightside_job_categories_heading">
        <h4>Etiketler</h4>
    </div>
    <div class="blog_category_side_menu">
        <ul class="list-inline">
            @foreach($tags as $tag)
            <li class="list-inline-item"><a class="badge badge-sm" href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
    @endif
@endisset