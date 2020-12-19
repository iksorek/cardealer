<!DOCTYPE HTML>
<html class="no-js" lang="pl">
@include("bits.head")
<body class="home">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
experience this site.</p>
<![endif]-->
<div class="body" id="iamtop">
    <!-- Start Site Header -->
    <div class="site-header-wrapper">
        <header class="site-header">
            <div class="container sp-cont">
                <div class="site-logo">
                    <h1><a href="{{route("home")}}">{{ __('messages.sitename') }}</a></h1>
                    <span class="site-tagline">{!! nl2br(e(Controll::findSetting('slogan'))) !!}</span>
                </div>
                <div class="header-right">
                    <div class="user-login-panel">
                        @auth()
                            <a href="{{route("logout")}}"><i
                                    class="icon-profile">{{ __('messages.logout') }}</i></a><br>
                            <a href="{{route("adminHome")}}">{{ __('messages.administration') }}</a>
                        @endauth
                        @unless (Auth::check())
                            <a href="{{route("login")}}" class="user-login-btn"><i
                                    class="icon-profile"></i></a>
                        @endunless
                    </div>
                </div>
            </div>
        </header>
        <!-- End Site Header -->
        <div class="navbar">
            <div class="container sp-cont">
                <div class="search-function">
                    <a href="#" class="search-trigger"><i class="fa fa-search"></i></a>
                    <span><i
                            class="fa fa-phone"></i> {{ __('messages.call_us') }} <strong>{{Controll::findSetting('telephone')}}</strong> <em>{{ __('messages.or') }} </em> {{ __('messages.search') }}</span>
                </div>
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <!-- Main Navigation -->
                <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                    <ul class="sf-menu">
                        <li>
                            <a href="{{route("home")}}">{{ __('messages.main_page') }}</a>
                        </li>
                        <li>
                            <a href="{{route("lista")}}">{{ __('messages.available_cars') }}</a>
                        </li>
                        <li>
                            <a href="{{route("contact")}}">{{ __('messages.contact') }}</a>
                        </li>
                    </ul>
                </nav>
                <!-- Search Form -->
                <div class="search-form">
                    <div class="search-form-inner">
                        <form>
                            <h3>{{ __('messages.find_your_car') }}</h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{__('messages.make')}}</label>
                                            <select name="Make" class="form-control selectpicker">
                                                <option selected>{{__('messages.select')}}</option>
                                                <option>Jaguar</option>
                                                <option>BMW</option>
                                                <option>Mercedes</option>
                                                <option>Porsche</option>
                                                <option>Nissan</option>
                                                <option>Mazda</option>
                                                <option>Acura</option>
                                                <option>Audi</option>
                                                <option>Bugatti</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Model</label>
                                            <select name="Model" class="form-control selectpicker">
                                                <option selected>{{__('messages.any')}}</option>
                                                <option>GTX</option>
                                                <option>GTR</option>
                                                <option>GTS</option>
                                                <option>RLX</option>
                                                <option>M6</option>
                                                <option>S Class</option>
                                                <option>C Class</option>
                                                <option>B Class</option>
                                                <option>A Class</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{__('messages.max_age')}}</label>
                                            <select name="maxage" class="form-control selectpicker">
                                                <option selected>{{__('messages.any')}}</option>
                                                <option>5</option>
                                                <option>7</option>
                                                <option>10</option>
                                                <option>15</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <input type="submit" class="btn btn-block btn-info btn-lg"
                                                   value="{{__('messages.find_your_car')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(isset($hero))
    @include("bits.hero-replace")
@else
    @include("bits.hero")
@endif
<!-- Start Body Content -->
    @if(Session::has('msg'))
        <br>
        <div
            class="alert {{ Session::get('alert-class', 'alert-info') }} w-75 alert-dismissible text-align-center  show"
            role="alert">
            {{ Session::get('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="text-danger">&times;</span>
            </button>
        </div>

@endif
@yield("content")
<!-- End Body Content -->
    <!-- Start site footer -->
@include("bits.footer")
<!-- End site footer -->
    <a href="#iamtop" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
@include("bits.jsbottom")

</body>
</html>
