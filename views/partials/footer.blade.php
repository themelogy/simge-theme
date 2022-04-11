@carBrands('home.brands')
@include('page::widgets.home.newsletter')

@inject("menuService", "Modules\Menu\Services\MenuService")
<!-- x footer Wrapper Start -->
<div class="x_footer_bottom_main_wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="x_footer_bottom_box_wrapper float_left">
                    <img src="{{ Theme::url('images/logo/logo-light.svg') }}" alt="logo">
                    <p>{{ strip_tags(Block::get('footer-logo-info')) }}</p>
                    @include('partials.components.socials')
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="x_footer_bottom_box_wrapper_second float_left">
                    <h3>{{ $menuService->title('corporate') }}</h3>
                    {!! Menu::render('corporate', \Themes\Xpedia\Presenter\FooterMenuPresenter::class) !!}
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="x_footer_bottom_box_wrapper_second float_left">
                    <h3>{{ $menuService->title('services') }}</h3>
                    {!! Menu::render('services', \Themes\Xpedia\Presenter\FooterMenuPresenter::class) !!}
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="x_footer_bottom_box_wrapper_third float_left">
                    <h3>BİZE ULAŞIN</h3>
                    <div class="x_footer_bottom_icon_section float_left">
                        <div class="x_footer_bottom_icon"><i class="flaticon-phone-call"></i>
                        </div>
                        <div class="x_footer_bottom_icon_cont">
                            <p><a href="tel:@setting('theme::phone')">@setting('theme::phone')</a><br/><a href="tel:@setting('theme::mobile')">@setting('theme::mobile')</a></p>
                        </div>
                    </div>
                    <div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
                        <div class="x_footer_bottom_icon x_footer_bottom_icon2"><i class="flaticon-mail-send"></i>
                        </div>
                        <div class="x_footer_bottom_icon_cont">
                            <p><a href="tel:@setting('theme::email')">@setting('theme::email')</a></p>
                        </div>
                    </div>
                    <div class="x_footer_bottom_icon_section x_footer_bottom_icon_section2 float_left">
                        <div class="x_footer_bottom_icon x_footer_bottom_icon3"><i class="fa fa-map-marker"></i>
                        </div>
                        <div class="x_footer_bottom_icon_cont">
                            <p>@setting('theme::address')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="x_copyr_main_wrapper float_left">
    <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
    <div class="container">
        <p>@lang('themes::theme.footer.copyrights', ['date' => \Carbon\Carbon::now()->year, 'company'=>setting('theme::company-name')])</p>
    </div>
</div>