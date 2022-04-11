<div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
    <div class="jp_rightside_job_categories_heading">
        <h4>KATEGORİ</h4>
    </div>
    <div class="jp_rightside_job_categories_content">
        <ul>
            @foreach($categories as $category)
            <li><i class="fa fa-long-arrow-right"></i> <a href="{{ $category->url }}">{{ $category->name }} ({{ $category->posts()->count() }}) </a></li>
            @endforeach
        </ul>
    </div>
</div>