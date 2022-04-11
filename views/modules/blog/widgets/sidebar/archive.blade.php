<div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
    <div class="jp_rightside_job_categories_heading">
        <h4>Arşiv</h4>
    </div>
    <div class="jp_rightside_job_categories_content">
        <ul>
            @foreach($months as $month)
            <li><i class="fa fa-long-arrow-right"></i> &nbsp;&nbsp;<a href="{{ $month->archive_url }}">{{ \Carbon\Carbon::createFromDate(null,$month->month)->formatLocalized('%B') }} </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>