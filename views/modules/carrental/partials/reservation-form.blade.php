<div class="x_car_checkout_right_main_box_wrapper float_left">
    <div class="car-filter order-billing margin-top-0">
        <div class="heading-block text-left margin-bottom-0">
            <h4>Rezervasyon Bilgileri</h4>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('errors'))
            <div class="alert alert-danger" role="alert">
                <ul style="font-size: 12px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['route'=>'carrental.reservation.create', 'method'=>'post', 'rel'=>'nofollow', 'class'=>'billing-form']) !!}
        {!! Form::hidden('car_id', Request::get('car_id')) !!}
        <ul class="list-unstyled row">
            <li class="col-md-6">
                <div class="form-group{{ $errors->has("tc_no") ? ' has-error' : '' }}">
                    {!! Form::text('tc_no', old('tc_no'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.tc_no')]) !!}
                    {!! $errors->first("tc_no", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-6">
                <div class="form-group{{ $errors->has("email") ? ' has-error' : '' }}">
                    {!! Form::text('email', old('email'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.email')]) !!}
                    {!! $errors->first("email", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-6">
                <div class="form-group{{ $errors->has("first_name") ? ' has-error' : '' }}">
                    {!! Form::text('first_name', old('first_name'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.first_name')]) !!}
                    {!! $errors->first("first_name", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-6">
                <div class="form-group{{ $errors->has("last_name") ? ' has-error' : '' }}">
                    {!! Form::text('last_name', old('last_name'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.last_name')]) !!}
                    {!! $errors->first("last_name", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-6">
                <div class="form-group{{ $errors->has("phone") ? ' has-error' : '' }}">
                    {!! Form::text('phone', old('phone'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.phone')]) !!}
                    {!! $errors->first("phone", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-6">
                <div class="form-group{{ $errors->has("mobile_phone") ? ' has-error' : '' }}">
                    {!! Form::text('mobile_phone', old('mobile_phone'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.mobile_phone')]) !!}
                    {!! $errors->first("mobile_phone", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-12">
                <div class="form-group{{ $errors->has("requests") ? ' has-error' : '' }}">
                    {!! Form::textarea('requests', old('requests'), ['class'=>'form-control', 'data-toggle'=>'tooltip', 'placeholder'=>'İstekleriniz']) !!}
                    {!! $errors->first("requests", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-7">
                <div class="form-group mt10{{ $errors->has("g-recaptcha-response") ? ' has-error' : '' }}">
                    {!! Captcha::display() !!}
                    {!! $errors->first("g-recaptcha-response", '<small class="form-text text-danger">:message</small>') !!}
                </div>
            </li>
            <li class="col-md-5">
                {!! Form::submit('REZERVASYON YAP', ['class'=>'btn btn-primary']) !!}
                <a class="btn btn-danger" href="{{ route('carrental.index') }}">İPTAL</a>
            </li>
        </ul>
        {!! Form::close() !!}
    </div>
</div>