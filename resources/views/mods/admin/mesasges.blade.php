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
                            <h2>{{__('messages.messages')}}</h2>
                            <div class="dashboard-block">
                                <div class="table-responsive">
                                    @if(count($msgs) == 0)
                                        <p class="text-center">{{__('messages.no_messages')}}</p>
                                    @else
                                        <table
                                            class="table table-bordered table-responsive dashboard-tables saved-cars-table table-striped">
                                            <thead>
                                            <tr>

                                                <td>{{__('messages.message')}}</td>
                                                <td>{{__('messages.contact')}}</td>
                                                <td>{{__('messages.recived')}}</td>

                                                <td>{{__('messages.actions')}}</td>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($msgs as $oneMsg)
                                                <tr>

                                                    <td>
                                                        <!-- Result -->

                                                        <div id="msg-{{$oneMsg->id}}">
                                                            @if($oneMsg->isnew == 1)
                                                                <span class="label label-warning"
                                                                      id="newLabel{{$oneMsg->id}}">{{__('messages.new')}}</span>
                                                            @else
                                                                <span
                                                                    class="label label-info">{{__('messages.old')}}</span>
                                                            @endif
                                                            <p>

                                                                {!! Str::words($oneMsg->content, 10, '  ('.__('messages.more').')') !!}</p>
                                                            <button class="btn btn-primary btn-sm"
                                                                    onclick="readMsg({{$oneMsg->id}})"
                                                                    data-toggle="modal" data-target="#myModal">
                                                                {{__('messages.read_message')}}
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td><p>
                                                            {{$oneMsg->name}}<br>
                                                            {{$oneMsg->telephone}}<br>
                                                            {{$oneMsg->email}}
                                                        </p></td>
                                                    <td>
                                                        <p>
                                                            {{$oneMsg->created_at}}
                                                        </p>


                                                    </td>

                                                    <td align="center">

                                                        <button id="delBtn{{$oneMsg->id}}"
                                                                onclick="delMsg({{$oneMsg->id}})" class="btn-danger"
                                                                title="Delete">
                                                            {{__('messages.delete')}}
                                                        </button>


                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
