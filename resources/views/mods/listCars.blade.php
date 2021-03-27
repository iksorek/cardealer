@extends("index")
@section("content")

    <!-- Start Body Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <!-- Search Filters -->
                @include('bits.searchFilter')

                <!-- Listing Results -->
                    <div class="col-md-9 results-container">
                        <div class="results-container-in">
                            <div class="waiting" style="display:none;">
                                <div class="spinner">
                                    <div class="rect1"></div>
                                    <div class="rect2"></div>
                                    <div class="rect3"></div>
                                    <div class="rect4"></div>
                                    <div class="rect5"></div>
                                </div>
                            </div>
                            <div id="results-holder" class="results-list-view">
                                <!-- Result Item -->
                                @foreach($cars as $oneCar)
                                    <div class="result-item format-standard">

                                        <div class="result-item-image">
                                            <a href="{{route("car", ['id'=>$oneCar->id])}}" class="media-box"><img
                                                    {{--														src="{{asset($oneCar->photo->first()->path ?? 'images/no-foto.jpg')}}"--}}
                                                    src="{{asset($oneCar->getChachedPhoto($oneCar->id))}}"
                                                    alt="{{$oneCar->make}} {{$oneCar->model}} photo"></a>
                                            <span class="label label-default vehicle-age">{{$oneCar->year}}</span>
                                            <span
                                                class="label  premium-listing {{$oneCar->label($oneCar->status)}}">{{$oneCar->status}}</span>
                                            <div class="result-item-view-buttons">
                                                <a href="{{route("car", ['id'=>$oneCar->id])}}"><i
                                                        class="fa fa-plus"></i>{{__('messages.more')}}</a>
                                            </div>
                                        </div>

                                        <div class="result-item-in">
                                            <h4 class="result-item-title"><a
                                                    href="{{route("car", ['id'=>$oneCar->id])}}">{{$oneCar->make}} {{$oneCar->model}}</a>
                                            </h4>
                                            <div class="result-item-cont">
                                                <div class="result-item-block col1">
                                                    <p>{!! Str::words($oneCar->description, 10, '(...)') !!}</p>
                                                </div>
                                                <div class="result-item-block col2">
                                                    <div class="result-item-pricing">
                                                        <div class="price">£{{$oneCar->price}}</div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="result-item-features">
                                                <ul class="inline">
                                                    @foreach($oneCar->options($oneCar) as $oneOption)
                                                        <li>{{$oneOption}}</li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            {{$cars->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
