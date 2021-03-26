<div class="col-md-3 col-sm-4">
    <!-- SIDEBAR -->
    <div class="users-sidebar tbssticky">
        <a href="{{route("addCar")}}" class="btn btn-block btn-primary add-listing-btn">{{__('messages.add_car')}}</a>
        <ul class="list-group">

            <li class="list-group-item {{Controll::activeRoute('adminHome')}}"><span
                    class="badge">{{ App\Http\Controllers\Controller::CountThem('Car') }}</span> <a
                    href="{{route("adminHome")}}"><i class="fa fa-home"></i> {{__('messages.cars_list')}}</a></li>
            <li class="list-group-item {{Controll::activeRoute('messages')}}"><span
                    class="badge">{{ App\Http\Controllers\Controller::CountThem('msg') }}</span> <a
                    href="{{route("messages")}}"><i class="fa fa-edit"></i> {{__('messages.messages')}}</a></li>
            <li class="list-group-item {{Controll::activeRoute('myAccount')}}">
                <a href="{{route("myAccount")}}"><i class="fa fa-user"></i> {{__('messages.my_account')}}</a></li>
            <li class="list-group-item {{Controll::activeRoute('settings')}}">
                <a href="{{route("settings")}}"><i
                        class="fa fa-cog"></i> {{__('messages.website_settings')}}</a></li>
            <li class="list-group-item"><a href="{{route('logout')}}"><i
                        class="fa fa-sign-out"></i>{{__('messages.logout')}}</a></li>
        </ul>
    </div>
</div>
