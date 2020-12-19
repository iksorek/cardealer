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
                            <h2>{{__('messages.cars_list')}}</h2>
                            @if($cars->count() == 0)
                                <p class="text text-align-center">{{__('messages.no_cars')}}</p>
                            @else
                                <div class="dashboard-block">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-bordered table-responsive dashboard-tables saved-cars-table table-striped">
                                            <thead>
                                            <tr>

                                                <td>{{__('messages.car')}}</td>
                                                <td>{{__('messages.price')}}</td>
                                                <td>{{__('messages.dates')}}</td>
                                                <td>{{__('messages.status')}}</td>
                                                <td>{{__('messages.actions')}}</td>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($cars as $oneCar)
                                                <tr>

                                                    <td>
                                                        <!-- Result -->
                                                        <a href="{{route("samochod", ['id'=>$oneCar->id])}}"
                                                           class="car-image">
                                                            <img
                                                                src="{{asset($oneCar->photo->first()->path) ?? asset('images/no-foto.jpg')}}"
                                                                alt=""></a>

                                                        <div class="search-find-results">
                                                            <h5>
                                                                <a href="{{route("samochod", ['id'=>$oneCar->id])}}">{{$oneCar->make}} {{$oneCar->model}}</a>
                                                            </h5>
                                                            <ul class="inline">
                                                                <li>{{$oneCar->year}}</li>
                                                                <li>{{$oneCar->engine}}</li>
                                                                <li>{{$oneCar->gearbox}}</li>
                                                                <li>{{$oneCar->mileage}}</li>
                                                                <li>{{$oneCar->color}}</li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td><span class="price">£{{$oneCar->price}}</span></td>
                                                    <td>
                                                        <span
                                                            class="text-success"></span>{{$oneCar->created_at}}
                                                        <br>
                                                        @if($oneCar->updated_at =='' || empty($oneCar->updated_at))
                                                            <br>---
                                                        @else
                                                            <br>  {{$oneCar->updated_at}}
                                                        @endif
                                                    </td>
                                                    <td class="text-align-center">
                                                    <span
                                                        class="label {{$oneCar->label($oneCar->status)}}">{{$oneCar->status}}</span>
                                                        <br>
                                                        {{__('messages.change')}}:<br>
                                                        <a href="{{route('statusCar', ['id'=>$oneCar->id, 'status'=>'Available'])}}"><span
                                                                class="label label-info">A</span></a>
                                                        <a href="{{route('statusCar', ['id'=>$oneCar->id, 'status'=>'Reserved'])}}"><span
                                                                class="label label-warning">R</span></a>
                                                        <a href="{{route('statusCar', ['id'=>$oneCar->id, 'status'=>'Sold'])}}"><span
                                                                class="label label-danger">S</span></a>
                                                    </td>
                                                    <td align="center">
                                                        <a href="{{route("editCar", ['id'=>$oneCar->id])}}"
                                                           class="text-default btn-default" title="Edycja"><i
                                                                class="fa fa-edit"></i></a>
                                                        <a href="{{route("deleteCar", ['id'=>$oneCar->id])}}"
                                                           class="text-danger btn-danger" title="Usun"><i
                                                                class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>

                                    </div>
                                    {{$cars->links()}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
