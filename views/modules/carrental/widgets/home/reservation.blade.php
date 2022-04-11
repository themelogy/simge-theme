<div class="x_slider_form_main_wrapper float_left"
     data-animation="animated fadeIn">
    <div class="x_slider_form_heading_wrapper float_left">
        <h3>Size en uygun aracı kiralayın</h3>
    </div>
    {!! Form::open(['route' => 'carrental.index', 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="x_slider_form_input_wrapper float_left">
                <h3>@lang('themes::carrental.reservation.start location')</h3>
                {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="x_slider_form_input_wrapper float_left">
                <h3>@lang('themes::carrental.reservation.return location')</h3>
                {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-sec-header">
                <h3>@lang('themes::carrental.reservation.pickup date')</h3>
                <label class="cal-icon">@lang('themes::carrental.reservation.pickup date')
                    {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-sec-header">
                <h3>@lang('themes::carrental.reservation.drop date')</h3>
                <label class="cal-icon">@lang('themes::carrental.reservation.drop date')
                    {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-sec-header">
                <label class="hour-icon">
            {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-sec-header">
                <label class="hour-icon">
            {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                </label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="x_slider_checkbox_bottom float_left">
                <div class="x_slider_checout_right">
                    <button class="btn btn-primary" type="submit">ARAÇ BUL</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@push('js-stack')
    {!! Theme::script('vendor/datetime.min.js') !!}
@endpush

@push('js-inline')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $('.date-pick').datepicker({
                todayHighlight: true,
                language: "tr",
                format: 'dd.mm.yyyy',
                startDate: new Date()
            });

            var pick_at = $('input[name="pick_at"]');
            var drop_at = $('input[name="drop_at"]');

            function dropMinDate() {
                var start_at = new Date(pick_at.datepicker('getDate'));
                start_at.setDate(start_at.getDate()+1);
                drop_at.datepicker('setStartDate', start_at);
                drop_at.datepicker('setDate', start_at);
            }

            pick_at.datepicker().on('changeDate', function () {
                dropMinDate();
                $(this).datepicker('hide');
            });

            drop_at.datepicker('setDate', '+2d').on('changeDate', function () {
                $(this).datepicker('hide');
            });

            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false,
                showMeridian: false
            });
        });
    </script>
@endpush