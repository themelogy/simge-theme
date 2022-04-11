<div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
    <div class="jp_rightside_job_categories_heading">
        <h4>KATEGORİ</h4>
    </div>
    <div class="jp_rightside_job_categories_content">
    <ul>
        @foreach($classes as $class)
        <li>
            {!! link_to_route('carrental.index', $class->name, ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>$class->id, 'brand'=>request()->get('brand')]) !!}
            @if(request()->get('category') == $class->id)
                {!! link_to_route('carrental.index', '[x]', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'brand'=>request()->get('brand')]) !!}
            @endif
        </li>
        @endforeach
    </ul>
    </div>
</div>