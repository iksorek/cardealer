<section class="listing-block recent-vehicles">
    <div class="listing-header">
        <h3>{{__('messages.lastest_cars')}}</h3>
    </div>
    <div class="listing-container">
        <div class="carousel-wrapper">
            <div class="row">
                <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4"
                    data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no"
                    data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2"
                    data-items-mobile="1">
                    @foreach($lastCars as $oneCar)

                        <li class="item">
                            <div class="vehicle-block format-standard">
                                <a href="{{route("samochod", ['id'=>$oneCar->id])}}" class="media-box"><img
                                        src="{{asset($oneCar->photo->first()->path) ?? asset('images/no-foto.jpg')}}"
                                        alt=""></a>
                                <div class="vehicle-block-content">
                                    <span class="label label-default vehicle-age">{{$oneCar->year}}</span>

                                    <span class="label label-success premium-listing">{{$oneCar->fuel}}</span>

                                    <h5 class="vehicle-title"><a
                                            href="vehicle-details.html">{{$oneCar->make}} {{$oneCar->model}}</a>
                                    </h5>
                                    <span
                                        class="vehicle-meta">{{__("messages.gearbox")}}: {{$oneCar->gearbox}}, {{__('messages.milage')}}: {{$oneCar->mileage}}</span>
                                    <span class="vehicle-cost">{{__('messages.price')}}: £{{$oneCar->price}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </div>
</section>
