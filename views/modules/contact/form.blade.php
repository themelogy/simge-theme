<div class="x_contact_title_main_wrapper float_left padding_tb_50">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper x_offer_car_heading_wrapper_contact float_left">
                    <h4>@lang('themes::contact.contact us')</h4>
                    <h3>@lang('themes::contact.form.title')</h3>
                </div>
            </div>

            <div id="contact_form" class="mt-sm-30" style="width: 80%; margin: auto;">

                <div class="alert alert-success" role="alert" v-show="success">
                    @{{ successMessage }}
                </div>

                {!! Form::open(['v-on:submit'=>'submitForm', 'class' => 'contact-form', 'method'=>'post', 'v-show'=>'!success']) !!}
                {!! Form::hidden('from', Request::path()) !!}

                <div class="form-row row mb-3">
                    <div class="col contect_form1" :class="{'has-error':errors.first_name}">
                        <input type="text" name="first_name" value="" placeholder="{{ trans('contact::contacts.form.first_name') }}" class="form-control form-control-sm" v-model="input.first_name" :class="{ 'is-invalid' : hasError('first_name') }" />
                        <small v-for="error in errors.first_name" class="form-text text-danger">@{{ error }}</small>
                    </div>
                    <div class="col contect_form2" :class="{'has-error':errors.last_name}">
                        <input type="text" name="last_name" value="" placeholder="{{ trans('contact::contacts.form.last_name') }}" class="form-control form-control-sm" v-model="input.last_name" :class="{ 'is-invalid' : hasError('last_name') }"/>
                        <small v-for="error in errors.last_name" class="form-text text-danger">@{{ error }}</small>
                    </div>
                </div>

                <div class="form-row row mb-3">
                    <div class="col contect_form2" :class="{'has-error':errors.phone}">
                        <input type="text" name="phone" value="" placeholder="{{ trans('contact::contacts.form.phone') }}" class="form-control form-control-sm" v-model="input.phone" :class="{ 'is-invalid' : hasError('phone') }"/>
                        <small v-for="error in errors.phone" class="form-text text-danger">@{{ error }}</small>
                    </div>
                    <div class="col contect_form2" :class="{'has-error':errors.email}">
                        <input type="text" name="email" value="" placeholder="{{ trans('contact::contacts.form.email') }}" class="form-control form-control-sm" v-model="input.email" :class="{ 'is-invalid' : hasError('email') }"/>
                        <small v-for="error in errors.email" class="form-text text-danger">@{{ error }}</small>
                    </div>
                </div>

                <div class="form-row row mb-3">
                    <div class="col contect_form4" :class="{'has-error':errors.enquiry}">
                        <textarea name="enquiry" class="form-control form-control-sm" placeholder="{{ trans('contact::contacts.form.enquiry') }}" rows="3" v-model="input.enquiry" :class="{ 'is-invalid' : hasError('enquiry') }"></textarea>
                        <small v-for="error in errors.enquiry" class="form-text text-danger">@{{ error }}</small>
                    </div>
                </div>

                <div class="form-row row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-rounded btn-4 font-weight-semibold text-0">{{ trans('global.buttons.send') }}</button>
                    </div>
                    <div class="col" :class="{'has-error':errors.captcha_contact}">
                        <div class="pull-right">{!! Captcha::image('captcha_contact') !!}</div>
                        <small v-for="error in errors.captcha_contact" class="form-text text-danger">@{{ error }}</small>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@push('js-stack')
    <script src="{{ Module::asset('contact:js/vue/vue.min.js') }}"></script>
    <script src="{{ Module::asset('contact:js/vue/axios.min.js') }}"></script>
    <script src="{{ Module::asset('contact:js/vue/loadingoverlay.min.js') }}"></script>
@endpush

@push('js-inline')
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            @if(App::environment()=='local')
                Vue.config.devtools = true;
            @endif
                window.axios.defaults.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
            window.axios.defaults.headers.common['Cache-Control'] = 'no-cache';
            new Vue({
                el: '#contact_form',
                data: {
                    input: {
                        first_name: '',
                        last_name: '',
                        phone: '',
                        email: '',
                        enquiry: '',
                        captcha_contact: ''
                    },
                    errors: {},
                    success: false,
                    successMessage: ''
                },
                methods: {
                    submitForm: function (e) {
                        e.preventDefault();
                        this.success = false;
                        this.input.captcha_contact = grecaptcha.getResponse(captcha_contact);
                        this.ajaxStart(true);
                        axios.post('{{ route('api.contact.send') }}', this.$data.input)
                            .then(response => {
                                this.successMessage = response.data.message;
                                this.success = true;
                                this.resetForm();
                                this.ajaxStart(false);
                                fbq('track', 'Contact');
                            })
                            .catch(error => {
                                this.errors = error.response.data;
                                this.success = false;
                                this.ajaxStart(false);
                                grecaptcha.reset(captcha_contact);
                            });
                    },
                    getError: function (field) {
                        if (this.errors[field]) {
                            return this.errors[field][0];
                        }
                    },
                    hasError: function (field) {
                        if (this.errors[field]) {
                            return true;
                        }
                        return false;
                    },
                    resetForm: function () {
                        var self = this;
                        Object.keys(this.$data.input).forEach(function (key, index) {
                            self.$data.input[key] = '';
                        });
                    },
                    ajaxStart: function (loading) {
                        if (loading) {
                            $('form', this.$el).LoadingOverlay("show", {
                                zIndex: 10
                            });
                        } else {
                            $('form', this.$el).LoadingOverlay("hide", {
                                zIndex: 10
                            });
                        }
                    }
                }
            });
        });
    </script>
    {!! Captcha::setLang(locale())->scriptWithCallback(['captcha_contact']) !!}
@endpush
