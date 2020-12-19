<section class="listing-block recent-vehicles">
    <div class="listing-header">
        <h3>{{__('messages.similar_cars')}}</h3>
    </div>
    <div class="listing-container">
        <div class="carousel-wrapper">
            <div class="row">
                <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="3"
                    data-autoplay="" data-pagination="yes" data-arrows="no"
                    data-single-item="no" data-items-desktop="3"
                    data-items-desktop-small="3" data-items-tablet="2"
                    data-items-mobile="1">
                    @if(count($similar) >0)
                        @foreach($similar as $oneSimilar)
                            <li class="item">
                                <div class="vehicle-block format-standard">
                                    <a href="{{route("samochod", ['id'=>$oneSimilar->id])}}" class="media-box"><img
                                            src="{{asset($oneSimilar->getChachedPhoto($oneSimilar->id))}}"
                                            alt=""></a>
                                    <span class="label label-default vehicle-age">{{$oneSimilar->year}}</span>
                                    <span
                                        class="label {{$oneSimilar->label($oneSimilar->status)}} premium-listing">{{$oneSimilar->status}}</span>
                                    <h5 class="vehicle-title"><a
                                            href="{{route("samochod", ['id'=>$oneSimilar->id])}}">{{$oneSimilar->make}} {{$oneSimilar->model}}</a>
                                    </h5>
                                    <span
                                        class="vehicle-meta">{!! Str::words($oneSimilar->description, 7, '(...)') !!}</span>

                                    <span class="vehicle-cost">£{{$oneSimilar->price}}</span>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
