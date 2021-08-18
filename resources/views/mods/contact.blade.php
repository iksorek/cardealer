@extends("index")
@section("content")
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="listing-header margin-40">
                    <h2>{{__('messages.leave_a_message')}}</h2>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <i class="fa fa-home"></i><br>
                        {!! nl2br(e(Controll::findSetting('address')))!!}<br>
                        <i class="fa fa-phone"></i> <b>{{Controll::findSetting('telephone')}}</b><br>
                        {{--                        <i class="fa fa-fax"></i> <b>1800-989-991</b><br>--}}
                        <i class="fa fa-envelope"></i> <a
                            href="mailto:{{Controll::findSetting('email')}}">{{Controll::findSetting('email')}}</a><br><br>
                        <i class="fa fa-home"></i>
                        <p>{!! nl2br(e(Controll::findSetting('opentimes')))!!}</p>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" id="contactform2" name="contactform2" class="contact-for2 clearfix2"
                              action="{{route("sendMessage")}}">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name"></label><input type="text" id="name" name="name"
                                                                         class="form-control input-lg"
                                                                         placeholder="{{__('messages.your_name')}}*">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"></label><input type="email" id="email" name="email"
                                                                          class="form-control input-lg"
                                                                          placeholder="{{__('messages.email')}}*">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"></label><input type="text" id="phone" name="phone"
                                                                          class="form-control input-lg"
                                                                          placeholder="{{__('messages.telephone')}}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="content"></label><textarea cols="6" rows="20" id="content"
                                                                               name="content"

                                                                               class="form-control input-lg"
                                                                               placeholder="{{__('messages.your_message')}}"></textarea>
                                    </div>

                                    <input id="submit" name="submit" type="submit"
                                           class="btn btn-primary btn-lg pull-right"
                                           value="{{__('messages.send_message')}}">
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
