@extends("index")
@section("content")
    <!-- Start Body Content -->
    <div class="main" role="main">
        <div id="content" class="content full dashboard-pages">
            <div class="container">
                <div class="dashboard-wrapper">
                    <div class="row">
                        @include("mods.admin.bits.submenu")
                        <div class="col-md-9 col-sm-8">
                            <h2>{{__('messages.website_settings')}}</h2>
                            <div class="dashboard-block">
                                <div class="table-responsive">
                                    <form method="POST" id="settings" name="settings" class="contact-form clearfix"
                                          action="{{route("saveSettings")}}">
                                        @method('PUT')
                                        @csrf

                                        <label for="slogan">{{__('messages.company_slogan')}}</label>
                                        <input type="text" id="slogan" name="slogan" class="form-control input-lg"
                                               value="{{Controll::findSetting('slogan')}}">
                                        <label for="mainpagetext">{{__('messages.main_page_text')}}</label>
                                        <textarea id="mainpagetext" rows="5" name="mainpagetext"
                                                  class="form-control input-lg">{{Controll::findSetting('mainpagetext')}}</textarea>
                                        <label for="telephone">{{__('messages.telephone')}}</label>
                                        <input type="text" id="telephone" name="telephone" class="form-control input-lg"
                                               value="{{Controll::findSetting('telephone')}}">
                                        <label for="email">{{__('messages.email')}}</label>
                                        <input type="text" id="email" name="email" class="form-control input-lg"
                                               value="{{Controll::findSetting('email')}}">
                                        <label for="address">{{__('messages.company_address')}}</label>
                                        <textarea id="address" rows="5" name="address"
                                                  class="form-control input-lg">{{Controll::findSetting('address')}}</textarea>
                                        <label for="opentimes">{{__('messages.opening_times')}}</label>
                                        <textarea id="opentimes" rows="5" name="opentimes"
                                                  class="form-control input-lg">{{Controll::findSetting('opentimes')}}</textarea>
                                        <input type="submit" value="{{__("messages.save_changes")}}"
                                               class="btn btn-default btn-block">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
