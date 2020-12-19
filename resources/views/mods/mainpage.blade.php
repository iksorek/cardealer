@extends("index")
@section("content")
    <div class="main" role="main">
        <div id="content" class="content full padding-b0">
            <div class="container">
                <!-- Welcome Content and Services overview -->
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="uppercase strong">{{__('messages.welcome_in')}} {{__('messages.sitename')}}</h1>
                        <p class="lead">{!! nl2br(e(Controll::findSetting('slogan'))) !!}</p>
                    </div>
                    <div class="col-md-6">
                        <p>{!! nl2br(e(Controll::findSetting('mainpagetext'))) !!}</p>
                    </div>
                </div>
                <div class="spacer-75"></div>
                <!-- Recently Listed Vehicles -->
                @include("bits.lastCars")
                <div class="spacer-60"></div>

            </div>

        </div>
    </div>
@endsection
