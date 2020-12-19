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
                            <h2>{{__('messages.my_account')}}</h2>
                            <div class="dashboard-block">
                                <div class="table-responsive">
                                    @if ($errors->any())
                                        <div class="alert alert-danger text-align-center">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" id="settings" name="settings" class="contact-form clearfix"
                                          action="{{route("saveMyAccount")}}">
                                        @method('PUT')
                                        @csrf

                                        <label for="email">{{__('messages.settings_email')}}</label>
                                        <input type="text" id="email" name="email" class="form-control input-lg"
                                               value="{{$me->email}}">
                                        <label for="pass1">{{__('messages.pass1')}}</label>
                                        <input type="password" id="pass1" name="pass1" class="form-control input-lg"
                                               placeholder="********">

                                        <label for="pass2">{{__('messages.pass2')}}</label>
                                        <input type="password" id="pass2" name="pass2" class="form-control input-lg"
                                               placeholder="********">

                                        <input type="submit" value="{{__('messages.save_changes')}}"
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
