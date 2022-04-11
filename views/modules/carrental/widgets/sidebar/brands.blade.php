<div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
    <div class="jp_rightside_job_categories_heading">
        <h4>MARKA</h4>
    </div>
    <div class="jp_rightside_job_categories_content">
        <ul class="list booking-filters-list">
            @foreach($brands as $brand)
            <li>
                {!! link_to_route('carrental.index', $brand->name, ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category'), 'brand'=>$brand->id]) !!}
                @if(request()->get('brand') == $brand->id)
                    {!! link_to_route('carrental.index', '[x]', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category')], ['style'=>'color:gray;']) !!}
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>